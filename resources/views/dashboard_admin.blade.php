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
			height: 500px;
		}

		#geojson {
			height: 200px;
			width: 100%;
		}

		.leaflet-popup-content-wrapper {
			background-color: #f0efef;
			color: #141414;

		}

		.leaflet-popup-tip {

			background-color: #ffbd07;

		}
	</style>

	<style>
		.button {
			background-color: #f00808;
			border: none;
			border-radius: 16px;
			box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.18), 0 4px 4px 0 rgba(0, 0, 0, 0.18);
			color: rgb(255, 255, 255);
			text-align: center;
			text-decoration: none;
			font-size: 13px;
			width: 100px;
			height: 30px;
		}

		.button2 {
			background-color: #ffffff;
			border: none;
			border-radius: 16px;
			box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.18), 0 4px 4px 0 rgba(0, 0, 0, 0.18);
			color: black;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 13px;
			width: 180px;
			height: 30px;
		}

		.button3 {
			background-color: #ff5e42f5;
			border: none;
			border-radius: 16px;
			box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.18), 0 4px 4px 0 rgba(0, 0, 0, 0.18);
			color: black;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 13px;
			width: 180px;
			height: 30px;
		}

		.button4 {
			background-color: #fcd423f5;
			border: none;
			border-radius: 16px;
			box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.18), 0 4px 4px 0 rgba(0, 0, 0, 0.18);
			color: black;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 13px;
			width: 100px;
			height: 30px;
		}

		.sidebar{
			width: 275px;
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
		integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
		crossorigin=""> </script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
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

	<script src="js/leaflet/DrawToolbar.js"></script>
	<script src="js/leaflet/Draw.Feature.js"></script>
	<script src="js/leaflet/Draw.SimpleShape.js"></script>
	<script src="js/leaflet/Draw.Polyline.js"></script>
	<script src="js/leaflet/Draw.Marker.js"></script>
	<script src="js/leaflet/Draw.Circle.js"></script>
	<script src="js/leaflet/Draw.CircleMarker.js"></script>
	<script src="js/leaflet/Draw.Polygon.js"></script>
	<script src="js/leaflet/Draw.Rectangle.js"></script>

	<script src="js/leaflet/EditToolbar.js"></script>
	<script src="js/leaflet/EditToolbar.Edit.js"></script>
	<script src="js/leaflet/EditToolbar.Delete.js"></script>
	<script src="js/leaflet/Control.Draw.js"></script>
	<script src="js/leaflet/Edit.Poly.js"></script>
	<script src="js/leaflet/Edit.SimpleShape.js"></script>
	<script src="js/leaflet/Edit.Rectangle.js"></script>
	<script src="js/leaflet/Edit.Marker.js"></script>
	<script src="js/leaflet/Edit.CircleMarker.js"></script>
	<script src="js/leaflet/Edit.Circle.js"></script>

@endsection

@section('content')
<div id="sidebar" class="h-100 sidebar text-center p-3">
    <button class="btn btn-light" id="closeSidebar" style="background-color: transparent; border:none;">Tutup Daftar</button>
    <div id="list-wifi">
    </div>
  </div>
  <header class="p-3 text-black" style="background-color: #EDEDED">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <img src="icon/fimaps.png" width="30" height="40"/><strong style= "margin-right: 20%;"> Fi-Maps BANDUNG JUARA</strong>
        <!-- <center> -->
		<div class="text-end">
			<button onclick="get_data_from_api()" type="button" class="button2" style="margin-right: 5px;">Semua Data Wifi</button>
			<button onclick="clear_map()" type="button" class="button" style="margin-right: 40px;">Bersihkan Peta</button>
		</div>
		<div class="text-end" style="margin-left: auto;">
			<a href="logout">
				<button type="button" class="button4">Logout</button>
			</a>
          	<button type="button" class="button" id="sidebarBtn">List Wifi</button>
		</div>
        <!-- </center> -->
      </div>
    </div>
  </header>

  <div id="mapid"></div>

  	<div class="input-group mb-3 mt-3 col-md-3">
		<input type="hidden" id="id_wifi">
		<input type="text" class="form-control col-md-3" placeholder="Masukkan Nama Wifi" id="nama"
		style="margin-right: 12px; margin-left: 12px;">		
		<input id="alamat" placeholder="Masukkan Alamat" name="alamat" class="form-control" style="margin-right: 12px;">
		<span class="input-group-text">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil">
				<path
					d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
			</svg>
		</span>
		<select id="type" placeholder="Pilih Type" class="form-select" style="margin-right: 12px;">
			<option value="Point">Point</option>
		</select>
		<input id="catatan" placeholder="Masukan Catatan" class="form-control" style="margin-right: 12px;">
		<input id="password" placeholder="Masukan Password Wifi" class="form-control" style="margin-right: 12px;">
		<button onclick="save_data_to_api()" class="btn btn-warning" style="margin-right: 12px; margin-left: 12px;">Simpan Data Wifi</button>
		<textarea id="geojson" class="form-control mt-3" style="margin-right: 12px; margin-left: 12px; height: 158px;" readonly></textarea>
	</div>

	<div class="template-list d-none">
		<div class="nama d-flex align-items-center p-1">
		<img src="fimaps.png" width="20" height="25"><span class="nama_wifi"></span>
		</div>
		<div class="alamat d-flex align-items-center p-1">
		<img src="address.png" width="20" height="20"><span class="alamat_wifi"></span>
		</div>
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
		//layerGroup

		var HikeBike_HikeBike = L.tileLayer('https://tiles.wmflabs.org/hikebike/{z}/{x}/{y}.png', {
			attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
		});

		var Esri_WorldImagery = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
			attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
		});

		var OpenStreetMap_BZH = L.tileLayer('https://tile.openstreetmap.bzh/br/{z}/{x}/{y}.png', {
			attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Tiles courtesy of <a href="http://www.openstreetmap.bzh/" target="_blank">Breton OpenStreetMap Team</a>'
		});

		var OpenTopoMap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
			attribution: 'Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)'
		});

		var OpenStreetMap_HOT = L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
			maxZoom: 19,
			attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Tiles style by <a href="https://www.hotosm.org/" target="_blank">Humanitarian OpenStreetMap Team</a> hosted by <a href="https://openstreetmap.fr/" target="_blank">OpenStreetMap France</a>'
		});

		var layerGroup = {
			"Dark Map": Esri_WorldImagery,
			"Gray Map": HikeBike_HikeBike,
			"Ori Map": OpenStreetMap_BZH,
			"Topo Map": OpenTopoMap,
			"New": OpenStreetMap_HOT,
		};


		//marker group
		var customicon = new L.icon({
			iconUrl: 'icon/wifi.png',
			shadowUrl: 'icon/marker-shadow.png',
			iconSize: [45, 45],
			iconAnchor: [12, 35],
			popupAnchor: [1, -35],
			shadowSize: [70, 35]
		});

		var customSearch = new L.Icon({
			iconUrl: 'icon/marker1.png',
			shadowUrl: 'icon/marker-shadow.png',
			iconSize: [35, 35],
			iconAnchor: [12, 35],
			popupAnchor: [1, -35],
			shadowSize: [35, 35]
		});

		var customIcon3 = L.Icon.extend({
			options: {
				iconSize: [35, 35],
				iconAnchor: [15, 25],
				shadowSize: [65, 35],
				iconUrl: 'icon/wifi.png',
				shadowUrl: 'icon/marker-shadow.png',
			}
		});

		//basemap
		var mymap = L.map('mapid', {
			center: [-6.936686275415605, 107.72938168071582],
			zoom: 6,
			maxZoom: 20,
			minZoom: 6,
			zoomControl: false,
			layers: [OpenStreetMap_HOT]
		});

		//position control 
		L.control.layers(layerGroup).addTo(mymap);
		L.control.zoom({ position: 'bottomleft' }).addTo(mymap);

		mymap.flyTo([-6.936686275415605, 107.72938168071582], 13);

		// search box
		var controlSearch = new L.Control.Search({
			url: 'https://nominatim.openstreetmap.org/search?format=json&q={s}',
			jsonpParam: 'json_callback',
			propertyName: 'display_name',
			propertyLoc: ['lat', 'lon'],
			marker: L.marker([0, 0], { icon: customSearch }),
			autoCollapse: true,
			autoType: false,
			minLength: 2,
			position: 'topleft'

		})
		mymap.addControl(controlSearch);

		// draw editor
		var drawnItems = new L.FeatureGroup();
		mymap.addLayer(drawnItems);

		var drawControl = new L.Control.Draw({
			position: 'topleft',
			draw: {
				marker: {
					icon: new customIcon3()
				},
				polyline: {
					shapeOptions: {
						color: '#f357a1',
						weight: 10
					}
				},
				polygon: {
					allowIntersection: false,
					drawError: {
						color: '#e1e100',
						message: '<strong>Tidak boleh saling tumpang tindih</strong>'
					},
					shapeOptions: {
						color: '#bada55'
					}
				},
				circlemarker: false,
				rectangle: {
					shapeOptions: {
						clickable: false
					}
				},
			},
			edit: {
				featureGroup: drawnItems
			}
		});
		mymap.addControl(drawControl);

		//event draw
		mymap.on(L.Draw.Event.CREATED, function (event) {
			var layer = event.layer;
			drawnItems.addLayer(layer);
		});

		mymap.on('draw:created', function (e) {
			//console.log('===================');
			drawnItems.eachLayer(function (layer) {
				var vector_geojson = layer.toGeoJSON();
				//console.log(vector_geojson);
				var vector_string = JSON.stringify(vector_geojson);
				//console.log(vector_string);
				document.getElementById('geojson').value = vector_string;
			});
		});

		mymap.on('draw:edited', function (e) {
			//console.log('===================');
			drawnItems.eachLayer(function (layer) {
				var vector_geojson = layer.toGeoJSON();
				//console.log(vector_geojson);
				var vector_string = JSON.stringify(vector_geojson);
				//console.log(vector_string);
				document.getElementById('geojson').value = vector_string;
			});
		});

		setTimeout(function bandung() {
			let xhr = new XMLHttpRequest();
			xhr.open('GET', 'kota_bandung.geojson');
			xhr.setRequestHeader('Content-Type', 'application/json');
			xhr.setRequestHeader('Access-Control-Allow-Origin', '*');
			xhr.responseType = 'json';
			xhr.onload = function () {
				if (xhr.status !== 200) return
				L.geoJSON(xhr.response).addTo(mymap);
			};
			xhr.send();
		}, 3000);

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


		var marker_from_api;
		function get_data_from_api() {
      $(function() {
        $.ajax({
          method: "post",
          url: "data_admin/admin_get_data_all",
		  data: {
            "_token": "{{ csrf_token() }}"
          },
          success: function(response) {
            response.forEach((element) => {
            //   console.log(element);
              if (element.geometry) {
                element.geometry = JSON.parse(element.geometry);
                if (element.type == 'Point' && (element.geometry.coordinates[0] 
				!= undefined && element.geometry.coordinates[0] != 'undefined') 
				&& (element.geometry.coordinates[1] != undefined && element.geometry.coordinates[1] != 'undefined')) {
                  var latitude = element.geometry.coordinates[1];
                  var longitude = element.geometry.coordinates[0];

				  var fromLatLng = L.latLng(currentCoordinate.latitude, currentCoordinate.longitude);
				  var toLatLng = L.latLng(latitude, longitude);

				  var dis = (fromLatLng.distanceTo(toLatLng)/1000).toFixed(1);
				  console.log(dis);

                  var marker = L.marker([latitude, longitude], {icon : customicon})
                  marker.bindPopup('<img src="icon/fimaps.png" width="20" height="25">' + element.nama +
                    '<hr class="featurette-divider">' +
                    '<img src="icon/address.png" width="20" height="20">' + "  Alamat Wifi" + " : " + element.alamat +
                    '<hr class="featurette-divider">' +
                    '<img src="icon/info.png" width="20" height="20">' + "  Detail Wifi" + " : " + element.catatan +
                    '<hr class="featurette-divider">' +
					'<img src="distance.png" width="25" height="20">' + "  Jarak Titik Wifi ke User : " + dis + "km" + 
					'<hr class="featurette-divider">' +
                    '<img src="icon/key.png" width="20" height="20">' + "  Password : " + element.password +
                    '<hr class="featurette-divider">' +
                    '<button onclick="clear_data(' + element.id_wifi + ')" type="button" class="button">Hapus Data</button>' +
                    '<button onclick="ubah_data(' + element.id_wifi + ')" type="button" class="button4">Ubah Data</button>'
                  )
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
        });
      });
      
		}

		function clear_data(id) {
			var isConfirmed = confirm("Apakah Benar ingin menghapus data wifi ini?");
			if(isConfirmed){
				$(function() {
				$.ajax({
					method: "post",
					url: "data_admin/admin_delete_data",
					data: {
					"_token": "{{ csrf_token() }}",
					'id'    : id,
					},
					success: function(response) {
					alert(response);
					clear_map();
					get_data_from_api();
					getList();
					}
				});
				});
			}
		}

	function ubah_data(id) {
      $(function() {
        $.ajax({
          method: "post",
          url: "data_admin/admin_view_data",
          data: {
            "_token": "{{ csrf_token() }}",
            'id'    : id,
          },
          success: function(response) {
			  response.forEach((res) => {
              	document.getElementById('id_wifi').value = res.id_wifi;
            	document.getElementById('nama').value = res.nama;
            	document.getElementById('alamat').value = res.alamat;
            	document.getElementById('type').value = res.type;
            	document.getElementById('catatan').value = res.catatan;
            	document.getElementById('password').value = res.password;
            	document.getElementById('geojson').value = res.geojson;
            });
			getList();
          }
        });
      });
		}

	

		function clear_map() {
			mymap.eachLayer(function (layer) {
				if (!!layer.toGeoJSON && layer._latlng != undefined) {
					//console.log(layer);
					mymap.removeLayer(layer);
				}
			});
			mymap.removeLayer(drawnItems);
			drawnItems = new L.FeatureGroup();
			mymap.addLayer(drawnItems);

			document.getElementById('id_wifi').value = null;
			document.getElementById('nama').value = "";
			document.getElementById('alamat').value = "";
			document.getElementById('geojson').value = "";
			document.getElementById('catatan').value = "";
			document.getElementById('password').value = "";

		}

		var data_to_api;
		function save_data_to_api() {
			$(function() {
				$.ajax({
				method: "post",
				url: "data_admin/admin_add_data",
				data: {
					"_token": "{{ csrf_token() }}",
					id_wifi    : document.getElementById('id_wifi').value,
					nama    : document.getElementById('nama').value,
					alamat  : document.getElementById('alamat').value,
					type    : document.getElementById('type').value,
					catatan : document.getElementById('catatan').value,
					password: document.getElementById('password').value,
					geojson : JSON.stringify(JSON.parse(document.getElementById('geojson').value).geometry),
				},
				success: function(response) {
					alert(response);
					clear_map();
					get_data_from_api();
					getList();
				}
				});
			});
			
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

  function getList() {
      $(function() {
        $.ajax({
          method: "post",
          url: "data_admin/admin_get_data_all",
		  data: {
            "_token": "{{ csrf_token() }}"
          },
          success: function(response) {
			$('#list-wifi').empty();
            response.forEach((element) => {
            //   console.log(element);
              if (element.geometry) {
                element.geometry = JSON.parse(element.geometry);
                if (element.type == 'Point' && (element.geometry.coordinates[0] 
				!= undefined && element.geometry.coordinates[0] != 'undefined') 
				&& (element.geometry.coordinates[1] != undefined && element.geometry.coordinates[1] != 'undefined')) {
                  var latitude = element.geometry.coordinates[1];
                  var longitude = element.geometry.coordinates[0];

				  var fromLatLng = L.latLng(currentCoordinate.latitude, currentCoordinate.longitude);
				  var toLatLng = L.latLng(latitude, longitude);

				  var dis = (fromLatLng.distanceTo(toLatLng)/1000).toFixed(1);
				  

					clone = $('.template-list').clone();

					clone.find('.nama_wifi').html(element.nama);
					clone.find('.alamat_wifi').html(element.alamat);
					clone.find('.jarak_wifi').html(dis+ " Km");

					clone.removeClass('template-list');
					clone.removeClass('d-none');
					clone.addClass('list');

					$('#list-wifi').append(clone);

                }
              }
            });
          }
        });
      });
      
		}

	</script>


@endsection