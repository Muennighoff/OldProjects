var readyToStart, clicked, lastX, lastY, stepX, stepY, angleX, angleY, stepZ, zoom;
var lat, lon, nms;

var globe, globeCount = 0;

function createGlobe() {
    var newData = [];
    globeCount++;
    $("#globe canvas").remove();

    newData = data.slice();

    console.log("This is data:");
    console.log(newData);

    globe = new ENCOM.Globe(window.innerWidth, window.innerHeight, {
        font: "Inconsolata",
        data: newData, // copy the data array
        tiles: grid.tiles,
        baseColor: 'yellow',
        markerColor: 'red',
        pinColor: 'orange',
        satelliteColor: 'brown',
        scale: parseFloat(1.0),
        dayLength: 1000 * parseFloat(28),
        introLinesDuration: parseFloat(2000),
        maxPins: parseFloat(500),
        maxMarkers: parseFloat(500),
        viewAngle: parseFloat(.1)
    });

    $("#globe").append(globe.domElement);
    globe.init(start);
}

function findnearestSpot(lat, lon) {
    var titles = grid.tiles,
        distance = 1000000000,
        index = 0;
    for (var i = 0; i < titles.length; i++) {
        var latdiff = Math.abs(titles[i].lat - lat); if (latdiff >= 360) latdiff-=360;
        var londiff = Math.abs(titles[i].lon - lon); if (londiff >= 360) londiff-=360;
        var temp = latdiff * latdiff + londiff * londiff;
        if (temp < distance || i == 0) {
            distance = temp;
            index = i;
        }
    }
    return index;
}

function hightlightArea(lat, lon, pcolor) {
    var index = findnearestSpot(lat, lon);
    globe.highlightspot(index, pcolor);
}

function mySpots(obj) {
    if (obj.length > 0) {
        var arr = [];
        if (obj[0].lon == undefined) {
            for (var k = 0; k < obj.length; k++) {
                var index = findnearestSpot(obj[k].lat, obj[k].lng);
                var newobj = {
                    'index': index,
                    'color': Math.floor(Math.random() * 40 + 59)
                }
                arr.push(newobj);
            }
        } else {
            for (var k = 0; k < obj.length; k++) {
                var index = findnearestSpot(obj[k].lat, obj[k].lon);
                var newobj = {
                    'index': index,
                    'color': obj[k].color
                }
                arr.push(newobj);
            }
        }
            return arr;
    } else
        return [];
}

function onWindowResize() {
    globe.camera.aspect = window.innerWidth / window.innerHeight;
    globe.camera.updateProjectionMatrix();
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

function animate() {
    if (readyToStart) {
        angleX += 0.1;
        if (angleX > 360)
            angleX -= 360;
    }
    globe.tick(angleX, angleY);
    lastTickTime = Date.now();
    requestAnimationFrame(animate);
    if (globe.prepared > 0) {
        readyToStart = 1;
    }
}

function start() {
    if (globeCount == 1) {
        if (globe)
            animate();
    }
}

$(function() {
    var open = false;
    if (!Detector.webgl) {
        Detector.addGetWebGLMessage({
            parent: document.getElementById("container")
        });
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
            }).animate({
                "top": 0,
                "bottom": 0,
                "padding-top": 46
            }, 800, function complete() {
                setTimeout(function() {
                    open = true;

                }, 3000);

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


$(document).ready(function() {

    readyToStart = 0;
    clicked = 0;
    lastX = 0;
    lastY = 0;
    stepX = 10;
    stepY = 25;
    angleX = 0;
    angleY = 0;
    stepZ = 20;
    zoom = 1700;
    lat = [];
    lon = [];
    nms = [];

    data = [];

    var latitude = $("input[name='latitude']").val();
    var longitude = $("input[name='longitude']").val();
    if (latitude.length < 1 || longitude.length < 1) {
        location.href = $("input[name='redirect']").val();
    } else {
        var opts = $("#friend_list option");
        for (var i = 0; i < opts.length; i++) {
            var buffer = opts.eq(i).val();
            var parts = buffer.split(":");
            if (!isNaN(parseInt(parts[0])) && !isNan(parseInt(parts[1]))) {
                var addData = {
                    lat: -parseInt(parts[0]),
                    lon: parseInt(parts[1]),
                    color: 99
                }
                data.push(addData);
            }
        }
    }

    function fn_warning(id_label) {
        $(id_label).css({
            'border-color': 'red'
        });
    }

    $('#lat').on('focus', function() {
        $(this).css({
            'border-color': '#DDDDDD'
        });
    });

    $('#lon').on('focus', function() {
        $(this).css({
            'border-color': '#DDDDDD'
        });
    });

    var temp = "";

    $('#pincolor').on('keyup', function() {
        temp = $(this).val();
        if (temp == '-' || temp > 99) {
            fn_warning('#pincolor');
            $('#color_alert').fadeIn(1000);
            setTimeout(function() {
                $('#color_alert').fadeOut(1000);
            }, 2000);
        } else {
            $(this).css({
                'border-color': '#DDDDDD'
            });
        }
    });

    $('#saveData').on('click', function() {
        resetAlert();
        var lat = $('#lat').val();
        var lon = $('#lon').val();
        var pincolor = $('#pincolor').val();
        // var label = $('#label').val();
        var result = true;
        if (!lat) {
            result = false;
            fn_warning('#lat');
        }

        if (!lon) {
            result = false;
            fn_warning('#lon');
        }

        if (!pincolor) {
            result = false;
            fn_warning('#pincolor');
        }

        if (result == true) {
            var addData = {
                lat: lat,
                lon: lon,
                color: pincolor
            }
            data.push(addData);
            $('#basicExampleModal').modal('toggle');
            // globe.addPin(lat, lon, pincolor);
            hightlightArea(lat, lon, pincolor);
            initdata()
        }
    });

    function resetAlert() {
        $('#lat').css({
            'border-color': '#DDDDDD'
        });
        $('#pincolor').css({
            'border-color': '#DDDDDD'
        });
        $('#lon').css({
            'border-color': '#DDDDDD'
        });
    }

    function initdata() {
        resetAlert();
        $('#lat').val('');
        $('#lon').val('');
    }
});

$("#globe").mousedown(function(e) {
    if (readyToStart == 0)
        return;
    lastX = parseInt(e.pageX);
    lastY = parseInt(e.pageY);
    clicked = 1;
});

$("#globe").mouseup(function(e) {
    clicked = 0;
});

$("#globe").mousemove(function(e) {
    if (clicked == 0)
        return;
    var currY = parseInt(e.pageY);
    if (currY > lastY) {
        if (currY - lastY >= stepY) {
            angleY += stepY / 20;
            if (angleY > 30)
                angleY = 30;
            lastY += stepY;
        }
    } else {
        if (lastY - currY >= stepY) {
            angleY -= stepY / 20;
            if (angleY < -30)
                angleY = -30;
            lastY -= stepY;
        }
    }

    var currX = parseInt(e.pageX);
    if (currX > lastX) {
        if (currX - lastX >= stepX * 4) {
            angleX += stepX;
            if (angleX > 360)
                angleX -= 360;
            lastX += stepX * 4;
        }
    } else {
        if (lastX - currX >= stepX * 4) {
            angleX -= stepX;
            if (angleX < 0)
                angleX += 360;
            lastX -= stepX * 4;
        }
    }
});

$("#globe").on('mousewheel DOMMouseScroll', function(e) {
    if (typeof e.originalEvent.detail == 'number' && e.originalEvent.detail !== 0) {
        if (e.originalEvent.detail > 0) {
            zoom += stepZ;
            if (zoom > 2200)
                zoom = 2200;
        } else if (e.originalEvent.detail < 0) {
            zoom -= stepZ;
            if (zoom < 1200)
                zoom = 1200;
        }
    } else if (typeof e.originalEvent.wheelDelta == 'number') {
        if (e.originalEvent.wheelDelta < 0) {
            zoom += stepZ;
            if (zoom > 2200)
                zoom = 2200;
        } else if (e.originalEvent.wheelDelta > 0) {
            zoom -= stepZ;
            if (zoom < 1200)
                zoom = 1200;
        }
    }
    globe.setScale(1700.0 / zoom);
});
