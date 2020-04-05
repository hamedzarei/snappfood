<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderFood extends Model
{

    protected $fillable = [
        'order_id',
        'food_id'
    ];
    public static function createRecord($order_id, $food_id)
    {
        OrderFood::create([
            'order_id' => $order_id,
            'food_id' => $food_id,
        ]);
    }

    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    public function food()
    {
        return $this->belongsTo('App\Food');
    }
}
