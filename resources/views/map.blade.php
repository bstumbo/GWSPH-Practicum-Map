<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"></script>
<script src="http://matchingnotes.com/javascripts/leaflet-google.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCJsvr80YY4kZ4n1gcfpSNrz3dU7Ln1BEI"></script>
<style>
  #mapid { height: 400px; width: 100%; }
  
  ul.pagination li {
    display: inline;
  }
</style>

<div id="mapid" style="width: 100%; height: 400px; position: relative; outline: none;"></div> 

  <div style="margin-left: 35%; margin-right: 35%;">
    <form method="POST" action="/practicummap/public/departments" id="frmTasks" name="frmTasks" class="ajax" novalidate="">
      <div class="form-group error">
          <label for="inputTask" class="col-sm-3 control-label">Practicum</label>
          <div class="col-sm-9">
              <select name="department">
               <option selected="selected" value=null>Search by Department</option>
                <option value="Epidemiology and Biostatistics">Epidemiology and Biostatistics</option>
                <option value="Environmental and Occupational Health">Environmental and Occupational Health</option>
                <option value="Exercise and Nutrition Sciences">Exercise and Nutrition Sciences</option>
                  <option value="Global Health">Global Health</option>
                  <option value="Health Policy and Management">Health Policy and Management</option>
                <option value="Online MPH @ GW">Online MPH @ GW</option>
                  <option value="Prevention and Community Health">Prevention and Community Health</option>
              </select>
          </div>        
      </div>
        <div class="form-group error">
          <label for="inputTask" class="col-sm-3 control-label">Term</label>
          <div class="col-sm-9">
              <select id="term" name="term">
                <option selected="selected" value=null>Search by Work Term</option>
                <option value="Spring 2016">Spring 2016</option>
                <option value="Summer 2016">Summer 2016</option>
                <option value="Fall 2016">Fall 2016</option>
                <option value="Spring 2017">Spring 2017</option>
                <option value="Summer 2017">Summer 2017</option>
                <option value="Fall 2017">Fall 2017</option>
              </select>
          </div>        
      </div>
        <div class="form-group error">
          <label for="inputTask" class="col-sm-3 control-label">Term</label>
          <div class="col-sm-9">
              <input type="text" id="city" name="city" value="">
          </div>        
      </div>
      <div class="col-sm-9">
        <input type="submit" value="Submit">
      </div>
    </form>
  </div>
  
  <div id="practicum-ajax"></div>
   
  <div style="margin: 20px;">
    <div style="width: 25%; float: left;"><p align=center><strong>Organization Name</strong></p></div>
    <div style="width: 25%; float: left;"><p align=center><strong>City</strong></p></div>
    <div style="width: 25%; float: left;"><p align=center><strong>State</strong></p></div>
    <div style="width: 25%; float: left;"><p align=center><strong>Country</strong></p></div>
  </div>
  <div id="practicum-list"> 
    @foreach($siteprac as $entry)
     <div class="site-row" style="clear:both; border: 1px solid black; margin: 20px;">
       <div style="width: 25%; float: left;"><p align=center>{{$entry['site']->org_name}}</p></div>
       <div style="width: 25%; float: left;"><p align=center>{{$entry['site']->city}}</p></div>
       <div style="width: 25%; float: left;"><p align=center>{{$entry['site']->state}}</p></div>
       <div style="width: 25%; float: left;"><p align=center>{{$entry['site']->country}}</p></div>
       <div style="width:100%; display:none;" class="sub-row" id="{{$entry['site']->id}}">
         <table style="width: 100%; border: 1px solid black;">
           @foreach($entry['practicums'] as $prac)
             <tr id="{{$prac->prac_id}}">
               <td style="width: 33%; text-align: center;">{{$prac->title}}</td>
               <td style="width: 33%; text-align: center;">{{$prac->term}}</td>
               <td style="width: 33%; text-align: center;">{{$prac->department}}</td>
             </tr>
           @endforeach  
         </table>
       </div>
     </div> 
    @endforeach
  </div>
   
 
 <script type="text/javascript">
  var mymap = new L.Map('mapid', {center: new L.LatLng(37.0902, -95.7129), zoom: 4});
 L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox.streets',
    accessToken: 'pk.eyJ1IjoiYnN0dW1ibyIsImEiOiJjajFvejdiOGYwMWd4MndtYnZreXBjb3llIn0.ffvfjib5FpXMMwXW1ygyxg'
    }).addTo(mymap);
    
    
    var sitejson = {!! json_encode($sites) !!};
    
    for (var i = 0; i < sitejson.length; i++) {
      
      var orgname = sitejson[i].org_name;
      var infostring = orgname.concat(sitejson[i].city, sitejson[i].state);
      var marker = L.marker([sitejson[i].latitude, sitejson[i].longitude]).addTo(mymap)
      .bindPopup(infostring)
      .openPopup();
    }
    
</script>            
  
  


<meta name="_token" content="{!! csrf_token() !!}" />  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="{{asset('js/map.js')}}"></script>
<script src="{{asset('js/ajax-crud.js')}}"></script>


    
  