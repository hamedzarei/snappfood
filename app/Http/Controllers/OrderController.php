<?php

namespace App\Http\Controllers;

use App\Food;
use App\Order;
use App\OrderFood;
use App\Restaurant;
use Validator;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'owner_name' => 'required',
            'restaurant_id' => 'required',
            'food' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'result' => 'some fields do not satisfied!'
            ], 400);
        }
        $owner_name = $request->input('owner_name');
        $restaurant_id = $request->input('restaurant_id');

        $foods = $request->input('food');
        $foods_cost = [];
        $total_without_tax = 0;
        $index = 0;
        foreach ($foods as $food) {
            $cost = Food::getCostRecord($food, $restaurant_id);
            if ($cost) {
                $total_without_tax += $cost;
                $foods_cost[$index]['cost'] = $cost;
                $foods_cost[$index]['food_id'] = $food;
                $index++;
            }
        }
        $tax = $this->findTax($total_without_tax, $restaurant_id);

        $order_id = Order::createRecord($owner_name, $restaurant_id, $tax, $tax+$total_without_tax);
//        dd($foods_cost);
        foreach ($foods_cost as $food_cost) {
            OrderFood::createRecord($order_id, $food_cost['food_id']);
        }

        return response()->json([
            'result' => 'created successfully'
        ]);

    }

    private function findTax($total_without_tax, $restaurant_id)
    {
        $tax = Restaurant::findTax($restaurant_id);
        if ($tax) {
            return $total_without_tax*$tax;
        }
        return 0;
    }
}
