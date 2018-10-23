/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



    function initGeolocation() {
 if (navigator && navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
        } else {
            console.log('Geolocation is not supported');
        }
}
 
function errorCallback() {
    alert('please enable location for this browser')
}
 
function successCallback(position) {
      var mapUrl = "https://maps.googleapis.com/maps/api/staticmap?center=";
      mapUrl = mapUrl + position.coords.latitude + ',' + position.coords.longitude;
      mapUrl = mapUrl + '&zoom=19&size=200x200&maptype=roadmap&sensor=false&markers=color:red|'+position.coords.latitude + ',' + position.coords.longitude+'&key=AIzaSyAoMoCXfaMix78wsFxAHh8c0I9s4w0UaC4';
      var imgElement = document.getElementById("static-map");
      imgElement.src = mapUrl;
    }