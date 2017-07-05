@extends('layouts.admin')

@section('content')
<script type="text/javascript">
    $(document).ready(function() {
      $("#program_filter").select2();
      $("#department_filter").select2();
    });
</script>  
<h1>Practicums</h1>
     <button id="btn-add" name="btn-add" class="btn btn-primary btn-xs">Add New Practicum</button>
    <div class="form-wrapper">
    <form class="adminform" method="POST" action="/practicummap/public/practicums" id="practicumsearch" name="practicumsearch" novalidate="">	
       <div class="form-group error">
          <div class="col-sm-9">
            <label>Search by Plan Id</label>
            <input class="select2 select2 select2-container select2-selection--single select2-selection__rendered" id="practicum_id_filter" name="practicum_id_filter" type="text"/>
          </div>        
      </div>
	  <div class="form-group error">
          <div class="col-sm-9">
            <label>Search Plan Title</label>
            <input class="select2 select2-container select2-selection--single select2-selection__rendered" id="practicum_plan_filter" name="practicum_plan_filter" type="text"/>
          </div>        
      </div>
         <div class="form-group error">
          <div class="col-sm-9">
              <select id="program_filter" name="program_filter">
                <option value="null">Search by Program</option>
                @foreach($programs as $program)
                  <option value="{{ $program }}">{{ $program }}</option>
                @endforeach
              </select>
          </div>
	  </div>	
        <div class="form-group error">
          <div class="col-sm-9">
              <select id="department_filter" name="department_filter">
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
                <th>Title</th>
                <th>Department</th>
                <th>Major</th>
				<th>Program Link</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="practicums">                    
            @foreach ($practicums as $practicum)
                <tr id="{{$practicum->prac_id}}">
                    <td style="width: 20%; text-align: center;">{{$practicum->title}}</td>
                    <td style="width: 20%; text-align: center;">{{$practicum->department}}</td>
                    <td style="width: 20%; text-align: center;">{{$practicum->major}}</td>
                    <td style="width: 20%; text-align: center;">{{$practicum->program_link}}</td>
                    <td style="width: 20%;">
                       <button class="btn btn-warning btn-xs btn-detail open-modal" value="{{$practicum->prac_id}}">Edit</button>
                       <button class="btn btn-danger btn-xs btn-delete delete-prac" value="{{$practicum->prac_id}}">Delete</button>
                   </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
     <div style="width: 400px; margin-right: auto; margin-left: auto;">{{ $practicums->links() }}</div>

<!-- Modal (Pop up when detail button clicked) -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Practicum Editor</h4>
            </div>
            <div class="modal-body">
                <form id="frmPrac" name="frmPrac" class="form-horizontal" novalidate="">
                    <div class="form-group error">
                        <label for="inputTask" class="col-sm-3 control-label">Practicum ID</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control has-error" id="prac_id" name="prac_id" value="">
                        </div>
                    </div>
                    <div class="form-group error">
                        <label for="inputTask" class="col-sm-3 control-label">Title</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control has-error" id="title" name="title" value="">
                        </div>
                    </div>      
                    <div class="form-group error">
                        <label for="inputTask" class="col-sm-3 control-label">Term</label>
                        <div class="col-sm-9">
                            <select id="term" name="term">
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
                        <label for="inputTask" class="col-sm-3 control-label">Description</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control has-error" id="description" name="description" value="">
                        </div>
                    </div>
                    <div class="form-group error">
                        <label for="inputTask" class="col-sm-3 control-label">Department</label>
                        <div class="col-sm-9">
                            <select id="department" name="department">
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
                        <label for="inputTask" class="col-sm-3 control-label">Site</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control has-error" id="site_id" name="site_id" value="">
                        </div>
                    </div>
                    <div class="form-group error">
                        <label for="inputTask" class="col-sm-3 control-label">Major</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control has-error" id="major" name="major" value="">
                        </div>
                    </div>
                    <div class="form-group error">
                        <label for="inputTask" class="col-sm-3 control-label">Program Link</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control has-error" id="program_link" name="program_link" value="">
                        </div>
                    </div>
                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes</button>
                <input type="hidden" id="prac_id" name="prac_id" value="0">
            </div>
        </div>
    </div>
</div>
    


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="{{asset('js/prac-admin.js')}}"></script>
@endsection
