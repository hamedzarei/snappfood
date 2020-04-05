<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = [
        'name',
        'tax',
        'lat',
        'lon'
    ];

    public static function createRecord($name, $tax, $lat, $lon)
    {
        Restaurant::create([
            'name' => $name,
            'tax' => $tax,
            'lat' => $lat,
            'lon' => $lon,
        ]);
    }

    public static function readOneRecord($id)
    {

        return Restaurant::findOrFail($id)->toArray();
    }

    public static function readAllRecord()
    {

        return Restaurant::all()->toArray();
    }

//    TODO check which one is not null and set then update record
    public static function updateRecord($id, $name, $tax, $lat, $lon)
    {
        Restaurant::findOrFail($id)->update([
            'name' => $name,
            'tax' => $tax,
            'lat' => $lat,
            'lon' => $lon,
        ]);
    }

    public static function deleteRecord($id)
    {
        Restaurant::findOrFail($id)->delete();
    }

    public static function findTax($id)
    {
        $tax = Restaurant::find($id);
        if ($tax) {
            return $tax->toArray()['tax'];
        }
    }

    public static function findByName($phrase)
    {
        $result = Restaurant::where('name', 'like', '%'.$phrase.'%')->get();
        if ($result) {
            return $result->toArray();
        }
    }

    public function food()
    {
        return $this->hasMany('App\Food');
    }
}
