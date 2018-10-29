/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var siteloc, userloc,urlnya;
var canvas = document.getElementById("canvas"),
            context = canvas.getContext("2d"),
            video = document.getElementById("video"),
            videoObj = { "video": true },
            image_format= "jpeg",
            jpeg_quality= 85,
            errBack = function(error) {
                console.log("Video capture error: ", error.code);
            };

function initGeolocation() {
    if (navigator && navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
    } else {
        alert('Geolocation is not supported');
    }
}

function errorCallback() {
    alert('please enable location for this browser')
}

function successCallback(position) {
    userloc = position.coords.latitude + ',' + position.coords.longitude;
    $.ajax({
        type: "POST",
        url: home + "absen/getloc/" + userid,
        async: false,
        success: function (data) {
            siteloc = data;
            getDistance(userloc, siteloc);
        },
        dataType: 'JSON'
    });
    console.log(position);
}


function getDistance(site, user) {
    $.ajax({
        type: "POST",
        url: home + "absen/getdistance/",
        async: false,
        dataType: "json",
        data: {userloc: user, siteloc: site},
        success: function (data) {
            console.log(data.url);
            if (parseInt(data.distance) > parseInt('1000')) {
                splash('glyphicon glyphicon-remove', 'alert alert-danger', 'Distance to far from destination');
            } else {
                if (data.inatt == 0){
                    getimages('absenin');
                    $('.absennya').html('Absen Masuk');
                }else{
                      if(data.outatt == 0){
                          getimages('absenout');
                          $('.absennya').html('Absen Pulang');
                      }else{
                          splash('glyphicon glyphicon-remove', 'alert alert-danger', 'your Attendance for today is completed');
                      }
                    
                }
            }
        }
    });
}

initGeolocation();


function getimages(url){
        // Grab elements, create settings, etc.
        urlnya = url;
        navigator.getUserMedia = (navigator.getUserMedia ||
            navigator.webkitGetUserMedia ||
            navigator.mozGetUserMedia);
    if (navigator.getUserMedia)
    {
        navigator.getUserMedia( {
                    video: true,
                    audio: false
                }, function(stream) {
                //video.src = stream;
                video.srcObject = stream;
                video.play();
                $("#snap").show();
            }, errBack);
        } else if(navigator.webkitGetUserMedia) { // WebKit-prefixed
            navigator.webkitGetUserMedia(videoObj, function(stream){
                video.src = window.webkitURL.createObjectURL(stream);
                video.play();
                $("#snap").show();
            }, errBack);
        } else if(navigator.mozGetUserMedia) { // moz-prefixed
            navigator.mozGetUserMedia(videoObj, function(stream){
                video.src = window.URL.createObjectURL(stream);
                video.play();
                $("#snap").show();
            }, errBack);
        }
    else {
        alert("Sorry, the browser you are using doesn't support the HTML5 webcam API");
    }

}
        // Put video listeners into place
        
        // video.play();       these 2 lines must be repeated above 3 times
        // $("#snap").show();  rather than here once, to keep "capture" hidden
        //                     until after the webcam has been activated.

        // Get-Save Snapshot - image
        document.getElementById("snap").addEventListener("click", function() {
            context.drawImage(video, 0, 0, 640, 480);
            // the fade only works on firefox?
            $("#video").fadeOut("slow");
            $("#canvas").fadeIn("slow");
            $("#snap").hide();
            $("#reset").show();
            $("#upload").show();
            video.pause();
        });
        // reset - clear - to Capture New Photo
        document.getElementById("reset").addEventListener("click", function() {
            $("#video").fadeIn("slow");
            $("#canvas").fadeOut("slow");
            $("#snap").show();
            $("#reset").hide();
            $("#upload").hide();
        });
        // Upload image to sever
        document.getElementById("upload").addEventListener("click", function(){
            var dataUrl = canvas.toDataURL("image/jpeg", 0.85);
            $("#uploading").show();
            $.ajax({
                type: "POST",
                url: home + "absen/"+urlnya,
                data: {
                    imgBase64: dataUrl,
                    userloc:userloc
        },
        dataType: "json",
        success: function (data) {
           if (parseInt(data) > parseInt('0')) {
                splash('glyphicon glyphicon-remove', 'alert alert-success', 'Success');
                 redirect();
            } else {
                splash('glyphicon glyphicon-remove', 'alert alert-danger', 'failed');
            }
        }
        });
        });