<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gis extends Model
{
    use HasFactory;

    protected $table = "public.maps_kotabdg";

    protected $fillable = [
    	'id','nama','alamat','type','geojson','geometry','catatan', 'password'
    ];

    public $timestamps = false;
    
    public static function convertGeomToGeoJson($geom) {
        $data = \DB::select("SELECT ST_AsGeoJSON('$geom') as geojson");
        return $data[0]->geojson;
    }
}
