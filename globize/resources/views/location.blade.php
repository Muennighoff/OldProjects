<html>
<head>
    <meta name="viewport" content="initial-scale=1.0, width=device-width" />
	
	<!--begin::Global Theme Styles -->
	<link href="{{ asset('metronic/vendors/base/vendors.bundle.css') }}" rel="stylesheet" type="text/css" />
	<!--RTL version:<link href="public/assets/vendors/base/vendors.bundle.rtl.css" rel="stylesheet" type="text/css" />-->
	<link href="{{ asset('metronic/demo/default/base/style.bundle.css') }}" rel="stylesheet" type="text/css" />
	<!--RTL version:<link href="public/assets/demo/default/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />-->
	<!-- END::Global Theme Styles -->

	<!--begin::Web font -->
	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
	<script>
		WebFont.load({
        google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
        active: function() {
            sessionStorage.fonts = true;
        }
      });
    </script>
	<!--end::Web font -->

	<link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.0/mapsjs-ui.css?dp-version=1542186754" />
	
    <style>
        .form-control {
            display: inline-block;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12 text-center mt-4">
            <h3>Hmm... It seems you didn't set your location yet.</h3>
            <p class="mt-4">We predicted your location based on your IP Address. If you think this is not correct, you should input your location manually, or top on the map to choose your position.</p>
        </div>
    </div>
    <form class="m-form m-form--label-align-right">
    	<div class="m-form__section m-form__section--first">
    		<div class="form-group m-form__group row">
				<label class="col-lg-4 col-form-label">Address:</label>
				<div class="col-lg-8">
					<input id="address" name="addr" class="form-control m-input" placeholder="Your Address Here">
				</div>
			</div>
    		<div class="form-group m-form__group row">
				<label class="col-lg-4 col-form-label">Latitude:</label>
				<div class="col-lg-8">
					<input id="latitude" name="lati" class="form-control m-input" placeholder="Latitude">
				</div>
			</div>
    		<div class="form-group m-form__group row">
				<label class="col-lg-4 col-form-label">Longitude:</label>
				<div class="col-lg-8">
					<input id="longitude" name="long" class="form-control m-input" placeholder="Longitude">
				</div>
			</div>
			<div class="form-group m-form__group row">
				<div class="col-12">
					<div style="width: 100%; height: 400px;" id="map"></div>
				</div>
			</div>
			<input type="hidden" value="{{ $currentUser }}" id="uid" />
			<div class="form-group m-form__group row">
				<div class="col-lg-12 text-right">
					<button id="return" type="button" class="btn m-btn--pill m-btn--air btn-primary m-btn m-btn--custom">Save & return</button>
				</div>
			</div>
    	</div>
    </form>
</div>
	
<!-- BEGIN::Loader -->
<div id="loader" style="position: fixed; left: 0px; top: 0px; z-index: 999; background-color: rgba(0, 0, 0, 0.2); display: none;">
	<div class="m-loader m-loader--lg m-loader--primary" style="position: absolute; left: 50%; top: 50%; transform: translateX(-50%) translateY(-50%); width: 90px; height: 90px;"></div>
</div>
<!-- END::Loader -->

<!--begin::Global Theme Bundle -->
<script src="{{ asset('metronic/vendors/base/vendors.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('metronic/demo/default/base/scripts.bundle.js') }}" type="text/javascript"></script>
<!-- END::Global Theme Bundle -->

<!--begin::Map Script -->
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-core.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-service.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-ui.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-mapevents.js"></script>
<!--end::Map Script -->

<script>
	var wto, lat, lng, platform, pixelRatio, defaultLayers, map, behavior, ui, marker;

    $(document).ready(function() {
		$.getJSON('http://gd.geobytes.com/GetCityDetails?callback=?', function(data) {
			var ipv4 = data.geobytesipaddress;
			$.getJSON('https://ipapi.co/' + ipv4 + '/json/', function(data) {
				
				lat = data.latitude;
				lng = data.longitude;
				
				$("#latitude").val(data.latitude);
				$("#longitude").val(data.longitude);

				platform = new H.service.Platform({
					app_id: "1LNWCloRhJJo3y8jZaDL",
					app_code: "ewjlICdSrQHfy1WziYEIJQ",
					useHTTPS: true
				});
				pixelRatio = window.devicePixelRatio || 1;
				defaultLayers = platform.createDefaultLayers({
					tileSize: pixelRatio === 1 ? 256 : 512,
					ppi: pixelRatio === 1 ? undefined : 320
				});

				map = new H.Map(document.getElementById("map"),
					defaultLayers.normal.map, {pixelRatio: pixelRatio});

				behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));
				behavior.disable(H.mapevents.Behavior.WHEELZOOM);

				ui = H.ui.UI.createDefault(map, defaultLayers);

				moveMapTo(map);

				setUpClickListener(map);

				marker = new H.map.Marker({lat:lat, lng:lng});
				map.addObject(marker);
			});
		});
    });
	
	function setUpClickListener(map) {
		map.addEventListener('tap', function (evt) {
			$("#loader").fadeIn("fast");
			var coord = map.screenToGeo(evt.currentPointer.viewportX,
				evt.currentPointer.viewportY);
			marker.setPosition({lat: coord.lat.toFixed(6), lng: coord.lng.toFixed(6)});
			$("#latitude").val(coord.lat.toFixed(6));
			$("#longitude").val(coord.lng.toFixed(6));

			var reverseGeocodingParameters = {
				prox: coord.lat.toFixed(6) + ',' + coord.lng.toFixed(6) + ',150',
				mode: 'retrieveAddresses',
				maxresults: '1',
				jsonattributes : 1
			};

			var onResult = function(result) {
				$("#address").val(result.response.view[0].result[0].location.address.label);
				$("#loader").fadeOut("fast");
			};

			var geocoder = platform.getGeocodingService();

			geocoder.reverseGeocode(reverseGeocodingParameters, onResult, function(e) {
				$("#loader").fadeOut("fast");
				swal({
					text: "Hubo un problema con el servicio de mapas. Por favor, inténtelo de nuevo más tarde.",
					type: "warning",
					confirmButtonText: "Cerrar",
				});
			});
		});
	}

	function moveMapTo(map){
		map.setCenter({lat: lat, lng: lng});
		map.setZoom(14);
	}

	$('#latitude').change(function() {
		clearTimeout(wto);
		wto = setTimeout(function() {
			changeMap();
		}, 500);
	});

	$('#longitude').change(function() {
		clearTimeout(wto);
		wto = setTimeout(function() {
			changeMap();
		}, 500);
	});

	function changeMap() {
		var lat = parseFloat($("#latitude").val());
		var lng = parseFloat($("#longitude").val());
		if (isNaN(lat) || isNaN(lng))
			return;
		if (lat > 90) {
			lat = 90;
			$("#latitude").val("90.0000");
		}
		if (lat < -90) {
			lat = -90;
			$("#latitude").val("-90.0000");
		}
		if (lng > 180) {
			lng = 180;
			$("#longitude").val("180.0000");
		}
		if (lng < -180) {
			lng = -180;
			$("#longitude").val("-180.0000");
		}
		var coords = { lat: lat, lng: lng};
		map.setCenter(coords);
    }

    $("#return").click(function() {
		$("form").valid();
		
		$.post("{{ url('/api/update') }}", {lati: lat, long: lng, uidx: $("#uid").val()}, function(data) {
			if (data.status == "success")
				location.href = "{{ url('/home') }}";
		});
    });
</script>
</body>
</html>