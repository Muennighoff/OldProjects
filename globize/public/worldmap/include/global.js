var globe, globeCount = 0;

var globe_color = "#ffcc00";
var pin_color = "#8FD8D8";
var marker_color = "#ffcc00";
var satellite_color = "#ff0000";
var globe_si = 8;


function createGlobe() {
    var newData = [];
    globeCount++;
    $("#globe canvas").remove();
    globe = new ENCOM.Globe(window.innerWidth, window.innerHeight, {
        font: "Inconsolata",
        data: newData, // copy the data array
        tiles: grid.tiles,
        baseColor: globe_color,
        pinColor: pin_color,
        markerColor: marker_color,
        satelliteColor: satellite_color,
        scale: 1.0,
        viewAngle: 0.1,
        dayLength: 28000,
        introLinesDuration: 500,
        maxPins: 500,
        maxMarkers: 4,
    });

    $("#globe").append(globe.domElement);
    globe.init(start);
}

function onWindowResize() {
    // globe.camera.aspect = window.innerWidth / window.innerHeight;
    // globe.camera.updateProjectionMatrix();
    globe.renderer.setSize(window.innerWidth, window.innerHeight);

}

function roundNumber(num) {
    return Math.round(num * 100) / 100;
}

function projectionToLatLng(width, height, x, y) {

    return {
        lat: 90 - 180 * (y / height),
        lon: 360 * (x / width) - 180,
    };

}

function mySpots(obj) {
    var arr = [];
    return arr;
}

function animate() {

    if (globe) {
        globe.tick();
    }

    lastTickTime = Date.now();

    requestAnimationFrame(animate);
}

function start() {

    if (globeCount == 1) { // only do this for the first globe that's created. very messy
        $("#apply-button").click(function(e) {
            globe.destroy(function() {
                createGlobe();
            });
        });
        $(".projection").click(function(e) {
            var offset = $(this).offset();
            var latLon = projectionToLatLng($(".projection").width(), $(".projection").height(), e.clientX - offset.left, e.clientY - offset.top);

            var selectedId = $("#add-element .selected").attr("id");

            if (selectedId == "add-pin") {
                globe.addPin(latLon.lat, latLon.lon, "User Dropped Pin");
            } else if (selectedId == "add-marker") {
                globe.addMarker(latLon.lat, latLon.lon, "User Marker", true);
            } else if (selectedId == "add-satellite") {
                var opts = {
                    coreColor: satellite_color,
                    numWaves: globe_si //parseInt($("#globe-si").val())
                };
                globe.addSatellite(latLon.lat, latLon.lon, 1.3, opts);
            }
        });

        $("#add-element li").click(function(e) {
            $("#add-element li").removeClass("selected");
            $(e.currentTarget).addClass("selected");
        });

        animate();

        /* add pins at random locations */
        // setInterval(function() {
        //     var lat = Math.random() * 180 - 90,
        //         lon = Math.random() * 360 - 180,
        //         name = "Test " + Math.floor(Math.random() * 100);

        //     globe.addPin(lat, lon, name);

        // }, 5000);
    }

    /* add 6 satellites in random locations */

    if ($("#globe-dd:checked").length) {
        // setTimeout(function() {
        //     var constellation = [];
        //     var opts = {
        //         coreColor: satellite_color,
        //         numWaves: globe_si //parseInt($("#globe-si").val())
        //     };
        //     var alt = parseFloat($("#globe-sa").val());

        //     for (var i = 0; i < 2; i++) {
        //         for (var j = 0; j < 3; j++) {
        //             constellation.push({
        //                 lat: 50 * i - 30 + 15 * Math.random(),
        //                 lon: 120 * j - 120 + 30 * i,
        //                 altitude: alt
        //             });
        //         }
        //     }

        //     globe.addConstellation(constellation, opts);
        // }, 4000);

        // /* add the connected points that are in the movie */
        // setTimeout(function() {
        //     globe.addMarker(49.25, -123.1, "Vancouver");
        //     globe.addMarker(35.6895, 129.69171, "Tokyo", true);
        // }, 2000);
    }

}

$(function() {
    var open = false;
    if (!Detector.webgl) {
        Detector.addGetWebGLMessage({ parent: document.getElementById("container") });
        return;
    }
    window.addEventListener('resize', onWindowResize, false);
    var docHeight = $(document).height();
    WebFontConfig = {
        google: {
            families: ['Inconsolata']
        },
        active: function() {
            /* don't start the globe until the font has been loaded */
            $("#options").css({
                "visibility": "visible",
                "top": docHeight / 2,
                "bottom": docHeight / 2
            }).animate({}, 800, function complete() {
                createGlobe();
            });
        }
    };
    /* Webgl stuff */
    /* web font stuff*/
    var wf = document.createElement('script');
    wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
        '://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js';
    wf.type = 'text/javascript';
    wf.async = 'true';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(wf, s);

});