<?php

namespace App\Http\Controllers;

use App\Food;
use App\Restaurant;
use Validator;

use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'cost' => 'required',
            'restaurant' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'result' => 'some fields do not satisfied!'
            ], 400);
        }

        Food::createRecord($request->input('name'), $request->input('cost'), $request->input('restaurant'));

        return response()->json([
            'result' => 'created successfully'
        ]);

    }

    public function read($id)
    {

        $record = Food::readOneRecord($id);

        return response()->json([
            'result' => $record
        ]);
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'cost' => 'required',
            'restaurant' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'result' => 'some fields do nmodelot satisfied!'
            ], 400);
        }

        Food::updateRecord($id, $request->input('name'), $request->input('cost'), $request->input('restaurant'));

        return response()->json([
            'result' => 'updated successfully'
        ]);

    }

    public function delete($id)
    {
        Food::deleteRecord($id);

        return response()->json([
            'result' => 'delete successfully'
        ]);
    }

    public function readOneView($restaurant_id=null)
    {
        $result = [];
        if ($restaurant_id) {
            $result = Food::readByRestaurant($restaurant_id);
        } else {
            $result = Food::readAllRecord();
        }

        return view('food.read', [
            'result' => $result
        ]);
    }
}
