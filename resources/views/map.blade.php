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
                <option value="Epidemiology and Biostatistics">Epidemiology and Biostatistics</option>
                <option value="Environmental and Occupational Health">Environmental and Occupational Health</option>
                <option value="Exercise and Nutrition Sciences">Exercise and Nutrition Sciences</option>
                  <option value="Global Health">Global Health</option>
                  <option value="Health Policy and Management">Health Policy and Management</option>
                <option value="Online MPH @ GW">Online MPH @ GW</option>
                  <option value="Prevention and Community Health">Prevention and Community Health</option>
              </select>
          </div>
            <div class="col-sm-9">
              <input type="submit" value="Submit">
          </div>
            
      </div>
    </form>
  </div>
  
  <div id="practicum-ajax"></div>
  
  <!-- Table-to-load-the-data Part -->
  <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Term</th>
                        <th>Department</th>
                    </tr>
                </thead>
                <tbody id="practicum-list"  name="practicum-list">
                  @foreach ($practicums as $practicum)
                    <tr id="{{$practicum->id}}">
                        <td style="width: 20%; text-align: center;">{{$practicum->id}}</td>
                        <td style="width: 20%; text-align: center;">{{$practicum->title}}</td>
                        <td style="width: 20%; text-align: center;">{{$practicum->term}}</td>
                        <td style="width: 20%; text-align: center;">{{$practicum->department}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            <div style="width: 400px; margin-right: auto; margin-left: auto;">{{ $practicums->links() }}</div> 
    
  <!-- End of Table-to-load-the-data Part -->
            
 
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
      
      //document.write(json[i].latitude);
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


    
  