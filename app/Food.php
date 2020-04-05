<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable = [
        'name',
        'cost',
        'restaurant_id'
    ];

//    TODO check restaurant id exist or not
    public static function createRecord($name, $cost, $restaurant)
    {
        Food::create([
            'name' => $name,
            'cost' => $cost,
            'restaurant_id' => $restaurant,
        ]);
    }

    public static function readOneRecord($id)
    {

        return Food::with('restaurant')->findOrFail($id)->toArray();
    }

    public static function readAllRecord()
    {

        return Food::with('restaurant')->get()->toArray();
    }

//    TODO check which one is not null and set then update record
    public static function updateRecord($id, $name, $cost, $restaurant)
    {
        Food::findOrFail($id)->update([
            'name' => $name,
            'cost' => $cost,
            'restaurant_id' => $restaurant,
        ]);
    }

    public static function deleteRecord($id)
    {
        Food::findOrFail($id)->delete();
    }

    public static function readByRestaurant($id)
    {
        return Food::with('restaurant')->where('restaurant_id', $id)->get()->toArray();
    }

    public static function getCostRecord($id, $restaurant_id)
    {
        $food = Food::where('id', $id)->where('restaurant_id', $restaurant_id)->first();
        if ($food) {
            return $food->toArray()['cost'];
        }

    }

    public function restaurant()
    {
        return $this->belongsTo('App\Restaurant');
    }
}
