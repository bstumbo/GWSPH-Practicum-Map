@extends('layouts.admin')

@section('content')
  <script type="text/javascript">
            $(document).ready(function() {
              $("#city_filter").select2();
              $("#state_filter").select2();
              $("#country_filter").select2();
            });
        </script>   
<h1>Sites</h1>
    <button id="btn-add" name="btn-add" class="btn btn-primary btn-xs">Add New Site</button>
    <div class="form-wrapper">
    <form method="POST" action="/practicummap/public/sites" id="sitessearch" name="sitessearch" novalidate="">	
      <div class="form-group error">
          <div class="col-sm-9">
            <label>Search Organizations</label>
            <input id="org_name_filter" name="org_name_filter" type="text"/>
          </div>        
      </div>
       <div class="form-group error">
          <div class="col-sm-9">
              <select id="city_filter" name="city_filter" value="">
                 <option value="null">Select a City</option>
                  @foreach($cities as $city)
                    <option value="{{ $city }}">{{ $city }}</option>
                  @endforeach
              </select>
          </div>        
      </div>
        <div class="form-group error">
          <div class="col-sm-9">
              <select id="state_filter" name="state_filter" value="">
              <option value="null">Select a State</option>
                @foreach($states as $state)
                  <option value="{{ $state }}">{{ $state }}</option>
                @endforeach
              </select>
          </div>        
      </div>
        <div class="form-group error">
          <div class="col-sm-9">
              <select id="country_filter" name="country_filter" value="">
              <option value="null">Select a Country</option>
                @foreach($countries as $country)
                  <option value="{{ $country }}">{{ $country }}</option>
                @endforeach
              </select>
          </div>        
      </div>
        <!-- Removed Work Term Search
		<div class="form-group error">
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
      </div> -->
      <div class="form-group error">
          <input id="submit" class="" type="submit" value="Submit">
      </div>
      <div class="form-group error">
          <input class="" id="reset" type="reset" value="Reset">
      </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
  </div>  
    <table class="table">
        <thead>
            <tr>
                <th>Organization Name</th>
                <th>Address</th>
                <th>City</th>
                <th>State</th>
                <th>Zip Code</th>
                <th>Country</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="sites">                    
            @foreach ($sites as $site)
                <tr id="{{$site->id}}">
                    <td style="width: 16%; text-align: center;">{{$site->org_name}}</td>
                    <td style="width: 16%; text-align: center;">{{$site->address}}</td>
                    <td style="width: 16%; text-align: center;">{{$site->city}}</td>
                    <td style="width: 16%; text-align: center;">{{$site->state}}</td>
                    <td style="width: 16%; text-align: center;">{{$site->zip}}</td>
                    <td style="width: 16%; text-align: center;">{{$site->country}}</td>
                    <td>
                       <button class="btn btn-warning btn-xs btn-detail open-modal" value="{{$site->id}}">Edit</button>
                       <button class="btn btn-danger btn-xs btn-delete delete-site" value="{{$site->id}}">Delete</button>
                   </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
     <div style="width: 400px; margin-right: auto; margin-left: auto;">{{ $sites->links() }}</div> 
    
     
        
<!-- Modal (Pop up when detail button clicked) -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Site Editor</h4>
            </div>
            <div class="modal-body">
                <form id="frmSites" name="frmSites" class="form-horizontal" novalidate="">
                    <div class="form-group error">
                        <label for="inputTask" class="col-sm-3 control-label">Site ID</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control has-error" id="site_id" name="site_id" value="">
                        </div>
                    </div>  
                    <div class="form-group error">
                        <label for="inputTask" class="col-sm-3 control-label">Organization Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control has-error" id="org_name" name="org_name" value="">
                        </div>
                    </div>  
                    <div class="form-group error">
                        <label for="inputTask" class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control has-error" id="address" name="address" value="">
                        </div>
                    </div>
                    <div class="form-group error">
                        <label for="inputTask" class="col-sm-3 control-label">City</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control has-error" id="city" name="city" value="">
                        </div>
                    </div>
                    <div class="form-group error">
                        <label for="inputTask" class="col-sm-3 control-label">State</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control has-error" id="state" name="state" value="">
                        </div>
                    </div>
                    <div class="form-group error">
                        <label for="inputTask" class="col-sm-3 control-label">Zip Code</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control has-error" id="zip" name="zip" value="">
                        </div>
                    </div>
                    <div class="form-group error">
                        <label for="inputTask" class="col-sm-3 control-label">Country</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control has-error" id="country" name="country" value="">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes</button>
                <input type="hidden" id="site_id" name="site_id" value="0">
            </div>
        </div>
    </div>
</div>
        

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="{{asset('js/sites-admin.js')}}"></script>
@endsection

