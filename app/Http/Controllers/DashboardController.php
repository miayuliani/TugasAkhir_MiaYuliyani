<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Wifi;
use App\Models\Lokasi;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $is_login = $request->session()->get('is_login');

        $data = Wifi::selectRaw('wifi.id_wifi, nama, alamat, type, geojson , ST_AsGeoJSON(geometry) as geometry, catatan, password')->join('lokasi', 'lokasi.id_wifi', '=', 'wifi.id_wifi')
        ->get();
        foreach ($data as $item) {
            $item['geojson'] = Wifi::convertGeomToGeoJson($item->geometry);
        }

        if($is_login){
            return view('dashboard_admin')->with('data', $data);
        }else{
            return view('dashboard')->with('data', $data);
        }
    }

    public function admin_get_data_all()
    {
        $data = Wifi::selectRaw('wifi.id_wifi, nama, alamat, type, geojson , ST_AsGeoJSON(geometry) as geometry, catatan, password')->join('lokasi', 'lokasi.id_wifi', '=', 'wifi.id_wifi')
        ->get();
        return $data;
    }

    public function admin_add_data(Request $request)
    {
        $response = '';

        if(!$request->id_wifi){
            $wifi = Wifi::create([
                'nama' => $request->nama,
                'type' => $request->type,
                'catatan' => $request->catatan,
                'password' => $request->password,
            ]);
            Lokasi::create([
                'id_wifi' => $wifi->id_wifi,
                'alamat' => $request->alamat,
                'geojson' => $request->geojson,
                'geometry' => Wifi::raw("ST_GeomFromGeoJSON('" . $request->geojson . "')"),
            ]);
            $response = 'Data Berhasil Ditambahkan';
        }else{
            Wifi::where('id_wifi', $request->id_wifi)
            ->update([
                'nama' => $request->nama,
                'type' => $request->type,
                'catatan' => $request->catatan,
                'password' => $request->password,
            ]);
            Lokasi::where('id_wifi', $request->id_wifi)
            ->update([
                'alamat' => $request->alamat,
            ]);
            $response = 'Data Berhasil Diubah';
        }
        return $response;
    }

    public function admin_delete_data(Request $request)
    {
        $response = '';
        
        Lokasi::where('id_wifi', $request->id)->delete();
        Wifi::where('id_wifi', $request->id)->delete();

        $response = 'Berhasil';
        return $response;
    }

    public function admin_view_data(Request $request)
    {
        $data = Wifi::selectRaw('wifi.id_wifi, nama, alamat, type, geojson , ST_AsGeoJSON(geometry) as geometry, catatan, password')->join('lokasi', 'lokasi.id_wifi', '=', 'wifi.id_wifi')
        ->where('wifi.id_wifi', $request->id)->get();
        return $data;
    }
}
