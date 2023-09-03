<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;

    protected $table = "public.lokasi";

    protected $primaryKey = 'id_lokasi';

    protected $fillable = [
    	'id_lokasi','id_wifi','alamat', 'geojson','geometry'
    ];

    public $timestamps = false;
    
    public static function convertGeomToGeoJson($geom) {
        $data = \DB::select("SELECT ST_AsGeoJSON('$geom') as geojson");
        return $data[0]->geojson;
    }
}
