@extends('layout.dashboard-layout')

@section('title', 'Fi-Maps Kota Bandung JUARA')

@section('styles')
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
  <link rel="stylesheet" href="css/headers.css">
  <link rel="stylesheet" href="css/leaflet/leaflet-search.css">
  <link rel="stylesheet" href="css/leaflet/leaflet.draw.css">
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
  <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="https://bootswatch.com/superhero/bootstrap.min.css"/>

  
	<style>
    #mapid {
      height: 100vh; 
    }
    .leaflet-popup-content-wrapper {
      background-color: rgb(253, 251, 251);
      color: rgb(20, 20, 20);
      border-radius: 16px;
    }
    .leaflet-popup-tip {
      background-color: rgb(255, 229, 80);
    }
  </style>

<style>
  .button {
    background-color: #ffffff;
    border: none;
    border-radius: 16px;
    box-shadow: 0 4px 4px 0 rgba(0,0,0,0.18), 0 4px 4px 0 rgba(0,0,0,0.18);
    color: rgb(0, 0, 0);
    text-align: center;
    text-decoration: none;
    font-size: 13px;
    width: 100px;
    height: 30px;
  }
  .button2 {
    background-color: #21cfdb;
    border: none;
    border-radius: 16px;
    box-shadow: 0 4px 4px 0 rgba(0,0,0,0.18), 0 4px 4px 0 rgba(0,0,0,0.18);
    color: black;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 13px;  
    width: 120px;
    height: 30px;
  }
  .button3 {
    background-color: #e9c214;
    border: none;
    border-radius: 16px;
    box-shadow: 0 4px 4px 0 rgba(0,0,0,0.18), 0 4px 4px 0 rgba(0,0,0,0.18);
    color: black;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 13px;  
    width: 100px;
    height: 30px;
  }
  .form {
    width: 200px;
    height: 30px;
    border-radius: 16px;
    border: 1px black;
    font-size: 13px;
    text-align: left;
    box-shadow: 0 4px 4px 0 rgba(0,0,0,0.18), 0 4px 4px 0 rgba(0,0,0,0.18);
  }

  .sidebar{
    width: 350px;
    background-color: #ededed;
    position: fixed!important;
    z-index: 10000;
    overflow: auto;
    right: 0;
    display: none;
  }
  </style>
@endsection

@section('script')
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" 
  integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
  <script src="js/leaflet/leaflet-search.js"></script>
	<script src="js/leaflet/Leaflet.draw.js"></script>
	<script src="js/leaflet/Leaflet.Draw.Event.js"></script>
	<script src="js/leaflet/Toolbar.js"></script>
	<script src="js/leaflet/Tooltip.js"></script>
	<script src="js/leaflet/GeometryUtil.js"></script>
	<script src="js/leaflet/LatLngUtil.js"></script>
	<script src="js/leaflet/LineUtil.Intersect.js"></script>
	<script src="js/leaflet/Polygon.Intersect.js"></script>
	<script src="js/leaflet/Polyline.Intersect.js"></script>
	<script src="js/leaflet/TouchEvents.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script src="js/rating.js"></script>

@endsection

@section('content')


<div id="sidebar" class="h-100 sidebar text-left p-3">
  <img src="close.png" width="15" height="15" id="closeSidebar"/> 
  {{-- <button class="btn btn-light" id="closeSidebar" style="background-color: transparent; border:none;">Tutup Daftar</button> --}}
  <div id="list-wifi">
  </div>
</div>

  <header class="p-3 text-black" style="background-color: #EDEDED">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <img src="fimaps.png" width="30" height="40"/><strong style= "margin-right: 10%;"> Fi-Maps BANDUNG JUARA</strong>
        <div class="text-end" >
          <button onclick="tutorial()" type="button" class="button3">Tutorial</button>
          <button onclick="showMarker()" type="button" class="button2" style="margin-right: 5px;">Wifi Terdekat</button>
          <button onclick="clearMap()" type="button" class="button" style="margin-right: 5px;">Bersihkan Peta</button>
        </div>
        <div class="text-end" style="margin-left: auto;">

          {{-- <a href="login"> --}}
          <button type="button" class="button" id="sidebarBtn" style="margin-right: 288px;">List Wifi</button>
          {{-- <a href="login">
            <button href="login" type="button" class="button">Login</button>
          </a>
          </a> --}}
        </div>
        <div>
          <img src="AMIK.png" width="40" height="40" style="margin-right: 20%;"/>
        </div>
      </div>
    </div>
  </header>

  <div id="mapid"></div>

  <div class="template-list d-none">
    <div class="nama d-flex align-items-center p-1">
      <img src="fimaps.png" width="20" height="25"><span class="nama_wifi"></span>
    </div>
    {{-- <div class="alamat d-flex align-items-center p-1">
      <img src="address.png" width="20" height="20"><span class="alamat_wifi"></span>
    </div> --}}
    <div class="jarak d-flex align-items-center p-1">
      <img src="distance.png" width="25" height="20"><span class="jarak_wifi"></span>
    </div>
    <hr class="featurette-divider">
  </div>
@endsection

@section('body-script')
  <script>
    window.onload = (event) => {
      $("#sidebarBtn").click(function () {
        $("#sidebar").show();
      });
      $("#closeSidebar").click(function () {
        $("#sidebar").hide();
      });
      getList();
      mymap.flyTo([-6.921377532857643, 107.61116941094397], 14);
      L.marker([-6.921377532857643, 107.61116941094397])
      .bindPopup('<center><img src="titik_0_bdg.jpg" width="250" height="200"></center>'+ 
      '<hr class="featurette-divider">' + "Ini merupakan titik pusat Kota Bandung Yaitu The Centre Of Bandung 0 Km Monument")
      .addTo(mymap)
    };
    const data = {!! $data !!}
    let currentCoordinate = {
      latitude: 0,
      longitude: 0
    }

    //layer group basemap
    var Esri_WorldTopoMap = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Topo_Map/MapServer/tile/{z}/{y}/{x}', {
      attribution: 'Tiles &copy; Esri &mdash; Esri, DeLorme, NAVTEQ, TomTom, Intermap, iPC, USGS, FAO, NPS, NRCAN, GeoBase, Kadaster NL, Ordnance Survey, Esri Japan, METI, Esri China (Hong Kong), and the GIS User Community'
    });
    var Esri_WorldImagery = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
      attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
    });
    var OpenStreetMap_BZH = L.tileLayer('https://tile.openstreetmap.bzh/br/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Tiles courtesy of <a href="http://www.openstreetmap.bzh/" target="_blank">Breton OpenStreetMap Team</a>'
    });
    var OpenStreetMap_HOT = L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
      maxZoom: 19,
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Tiles style by <a href="https://www.hotosm.org/" target="_blank">Humanitarian OpenStreetMap Team</a> hosted by <a href="https://openstreetmap.fr/" target="_blank">OpenStreetMap France</a>'
      });
    var layerGroup = {
      "Dark Map": Esri_WorldImagery,
      "Ori Map": OpenStreetMap_BZH,
      "World Topo Map": Esri_WorldTopoMap,
      "StreetMap": OpenStreetMap_HOT
    };

      //custom icon marker
    var customicon = new L.icon({
    iconUrl : 'icon/wifi.png',
    shadowUrl : 'icon/marker-shadow.png',
    iconSize : [45, 45],
    iconAnchor: [12,35],
    popupAnchor : [1, -35],
    shadowSize : [70, 35]
    });

    var customSearch = new L.Icon({
    iconUrl: 'icon/search.png',
    shadowUrl: 'icon/marker-shadow.png',
    iconSize: [35, 35],
    iconAnchor: [12, 35],
    popupAnchor: [1, -35],
    shadowSize: [35, 35]
    });

    
    //basemap
      var mymap = L.map('mapid', {
      center: [currentCoordinate.latitude, currentCoordinate.longitude],
      zoom : 6,
      maxZoom:20,
      minZoom: 6,
      zoomControl: false,
      layers:[OpenStreetMap_HOT]
		});

    // search box
		    var controlSearch = new L.Control.Search({
        url: 'https://nominatim.openstreetmap.org/search?format=json&q={s}',
        jsonpParam: 'json_callback',
        propertyName: 'display_name',
        propertyLoc: ['lat','lon'],
        marker: L.marker([0,0], {icon : customSearch}),
        autoCollapse: true,
        autoType: false,
        minLength: 2,
        position: 'topleft'

        })
        mymap.addControl(controlSearch);

							

    //position control 
		L.control.layers(layerGroup).addTo(mymap);
		L.control.zoom({position: 'bottomright'}).addTo(mymap);
    

    //titik koordinat user
    navigator.geolocation.watchPosition((data) => {
      currentCoordinate = data.coords
    })

    navigator.geolocation.getCurrentPosition((data) => {
      currentCoordinate = data.coords
      mymap.flyTo([currentCoordinate.latitude, currentCoordinate.longitude], 16);
      L.marker([currentCoordinate.latitude, currentCoordinate.longitude])
      .bindPopup('<center><img src="lok_kamu.jpg" width="200" height="200"></center>'+ 
      '<hr class="featurette-divider">' + "Ini merupakan lokasi anda berada")
      .addTo(mymap)
    })


        //fungsi load list
        function getList(){
      $('#list-wifi').empty();
      data.forEach(element => {
        if (element.geojson) {
          const geojson = JSON.parse(element.geojson)
          if (geojson.type == 'Point') {
            var latitude = geojson.coordinates[1];
            var longitude = geojson.coordinates[0];
            var fromLatLng = L.latLng(currentCoordinate.latitude, currentCoordinate.longitude);
            var toLatLng = L.latLng(latitude, longitude);
            var dis = (fromLatLng.distanceTo(toLatLng)/1000).toFixed(1);
            clone = $('.template-list').clone();
            clone.find('.nama_wifi').html(element.nama);
            // clone.find('.alamat_wifi').html(element.alamat);
            clone.find('.jarak_wifi').html(dis+ " Km");
            clone.removeClass('template-list');
            clone.removeClass('d-none');
            clone.addClass('list');
            $('#list-wifi').append(clone);
          }
        }
      });
    }

    //fungsi load wifi
    function showMarker() {
      data.forEach(element => {
        if (element.geojson) {
          const geojson = JSON.parse(element.geojson)
          if (geojson.type == 'Point') {
            var latitude = geojson.coordinates[1];
            var longitude = geojson.coordinates[0];

            var fromLatLng = L.latLng(currentCoordinate.latitude, currentCoordinate.longitude);
            var toLatLng = L.latLng(latitude, longitude);

            var dis = (fromLatLng.distanceTo(toLatLng)/1000).toFixed(1);
            console.log(dis);

            var marker = L.marker([latitude, longitude], {icon : customicon})
            marker.bindPopup('<img src="fimaps.png" width="20" height="25">' + element.nama + 
                            '<hr class="featurette-divider">' +
                             '<img src="address.png" width="20" height="20">' + "  Alamat Wifi" + " : " + element.alamat + 
                             '<hr class="featurette-divider">' +
                             '<img src="info.png" width="20" height="20">' + "  Detail Wifi" + " : " + element.catatan + 
                             '<hr class="featurette-divider">' +
                             '<img src="distance.png" width="25" height="20">' + "  Jarak Titik Wifi ke User : " + dis + "km" + 
                             '<hr class="featurette-divider">' + 
                             '<img src="key.png" width="20" height="20">' + "  Password : " + element.password)
                            .addTo(mymap);

            L.circle([currentCoordinate.latitude, currentCoordinate.longitude], {
                            color: '#0035F0',
                            fillColor: '#0035F0',
                            fillOpacity: 0.005,
                            radius: 2000,
                            weight: 0.2,
                            })
                            .bindPopup("Menjangkau sekitar 2 Kilometer dari titik lokasi saat ini")
                            .addTo(mymap);                      
            }
        }
      });
    }

    function showPolygon() {
      data.forEach(element => {
        if (element.geojson) {
          const geojson = JSON.parse(element.geojson)
          if (geojson.type == 'Polygon') { 
            var polygon_style = {
              fillColor: 'red',
              fillOpacity: 0.3,
              color: 'red',
              opacity: 0.8,
            };
            L.geoJson(geojson, polygon_style).bindPopup(element.nama).addTo(mymap); 
          }
        }
      })
    }


    setTimeout(function bandung() {
		let xhr = new XMLHttpRequest();
		xhr.open('GET', 'kota_bandung.geojson');
		xhr.setRequestHeader('Content-Type', 'application/json');
		xhr.setRequestHeader('Access-Control-Allow-Origin','*');
		xhr.responseType = 'json';
		xhr.onload = function() {
			if (xhr.status !== 200) return
			L.geoJSON(xhr.response).addTo(mymap);
		};
		xhr.send();
		}, 3000);

    function clearMap() {
      mymap.eachLayer(function(layer) {
				if (!!layer.toGeoJSON && layer._latlng != undefined) {
				//console.log(layer);
				mymap.removeLayer(layer);
				}
				});
				mymap.removeLayer(drawnItems);
				drawnItems = new L.FeatureGroup();
				mymap.addLayer(drawnItems);

				document.getElementById('nama').value = "";
				document.getElementById('catatan').value = "";
				document.getElementById('geojson').value = "";
    }


    function tutorial() {
  swal({
    title: "Tutorial",
    text: "1) Izinkan sistem untuk deteksi lokasi. 2) Pilih tombol Wifi Terdekat. 3) Lalu akan tampil titik wifi terdekat dengan kamu dalam radius 2km. Semoga informasi ini membantu kamu ya!:)",
    imageUrl: "tutor.png",
    imageWidth: 300,
    imageHeight: 180,
    showCancelButton: false,
    confirmButtonText: "OKE",
    confirmButtonColor: "#00ff55",
    cancelButtonColor: "#999999",
    reverseButtons: true,
  });
  }

  </script>
@endsection