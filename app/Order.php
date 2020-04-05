<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'owner_name',
        'restaurant_id',
        'order_tax',
        'total',
    ];

//    TODO check restaurant id exist or not
    public static function createRecord($owner_name, $restaurant_id, $order_tax, $total)
    {
        $order =  Order::create([
            'owner_name' => $owner_name,
            'restaurant_id' => $restaurant_id,
            'order_tax' => $order_tax,
            'total' => $total,
        ]);

        return $order->id;
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
}
