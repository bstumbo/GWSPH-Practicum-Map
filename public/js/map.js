 
 function ajaxmap(json) {
 
 console.log("Made it to ajaxmap");
 document.getElementById('mapid').innerHTML = "<div id='map' style='width: 100%; height: 400px; position: relative; outline: none;'></div> ";   
   bounds = new L.LatLngBounds(new L.LatLng(-75, -180), new L.LatLng(75, 185));
 var mymap = new L.Map('map', {center: new L.LatLng(37.0902, -95.7129), zoom: 3, maxBounds: bounds, maxBoundsViscosity: .75});
 
 L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
    maxZoom: 18,
    minZoom: 3,
    continuousWorld: false,
    noWrap: true,
    id: 'mapbox.streets',
    accessToken: 'pk.eyJ1IjoiYnN0dW1ibyIsImEiOiJjajFvejdiOGYwMWd4MndtYnZreXBjb3llIn0.ffvfjib5FpXMMwXW1ygyxg'
    }).addTo(mymap);
     
    var sitejson = json;
    console.log("before loop");
    console.log(sitejson);
    
    //This was changed.  Currently testing
    var count = Object.keys(sitejson).length;
    console.log(count);
    console.log(Object.keys(sitejson));
    for (var i = 0; i < count; i++) { //Was sitejson.length
      //document.write(json[i].latitude);
      var orgname = sitejson[i].org_name;
      console.log(orgname);
      var infostring = orgname.concat(sitejson[i].city, sitejson[i].state);
      var marker = L.marker([sitejson[i].latitude, sitejson[i].longitude]).addTo(mymap)
      .bindPopup(infostring)
      .openPopup();
    }
 }