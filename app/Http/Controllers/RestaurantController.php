<?php
/**
 * Created by PhpStorm.
 * User: zrhm7232
 * Date: 9/5/17
 * Time: 2:19 PM
 */

namespace App\Http\Controllers;

use Validator;
use App\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'tax' => 'required',
            'lat' => 'required',
            'lon' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'result' => 'some fields do not satisfied!'
            ], 400);
        }

        Restaurant::createRecord($request->input('name'), $request->input('tax'), $request->input('lat'),
                $request->input('lon'));

        return response()->json([
            'result' => 'created successfully'
        ]);

    }

    public function read($id)
    {
        $record = Restaurant::readOneRecord($id);

        return response()->json([
            'result' => $record
        ]);
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'tax' => 'required',
            'lat' => 'required',
            'lon' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'result' => 'some fields do nmodelot satisfied!'
            ], 400);
        }

        Restaurant::updateRecord($id, $request->input('name'), $request->input('tax'), $request->input('lat'),
            $request->input('lon'));

        return response()->json([
            'result' => 'updated successfully'
        ]);

    }

    public function delete($id)
    {
        Restaurant::deleteRecord($id);

        return response()->json([
            'result' => 'delete successfully'
        ]);
    }

    public function search(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phrase' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'result' => 'some fields do not satisfied!'
            ], 400);
        }

        $phrase = $request->input('phrase');
        return view('search.read', [
            'result' => Restaurant::findByName($phrase)
        ]);
    }

    public function readOneView($id=null)
    {
        $result = [];
        if ($id) {
            $result[0] = Restaurant::readOneRecord($id);
        } else {
            $result = Restaurant::readAllRecord();
        }

        return view('restaurant.read', [
            'result' => $result
        ]);
    }
}