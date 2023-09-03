<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wifi extends Model
{
    use HasFactory;

    protected $table = "public.wifi";

    protected $primaryKey = 'id_wifi';

    protected $fillable = [
    	'id_wifi','nama', 'type','catatan','password'
    ];

    public $timestamps = false;
    
    public static function convertGeomToGeoJson($geom) {
        $data = \DB::select("SELECT ST_AsGeoJSON('$geom') as geojson");
        return $data[0]->geojson;
    }
}
