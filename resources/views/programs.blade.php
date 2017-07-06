@extends('layouts.admin')

@section('content')

<h1>Programs</h1>
<button id="btn-add" name="btn-add" class="btn btn-primary btn-xs">Add New Program</button>
<br>
 <table class="table">
        <thead>
            <tr>
                <th>Program</th>
			    <th>Program Name</th>
                <th>Department</th>
				<th>Program Link</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="programs">                    
            @foreach ($programs as $program)
                <tr id="{{$program->id}}">
				    <td style="width: 25%; text-align: center;">{{$program->program}}</td>
                    <td style="width: 25%; text-align: center;">{{$program->program_pretty}}</td>
                    <td style="width: 25%; text-align: center;">{{$program->department}}</td>
                    <td style="width: 25%; text-align: center;">{{$program->program_url}}</td>
                    <td style="width: 25%;">
                       <button class="btn btn-warning btn-xs btn-detail open-modal" value="{{$program->id}}">Edit</button>
                       <button class="btn btn-danger btn-xs btn-delete delete-program" value="{{$program->id}}">Delete</button>
                   </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
     <div style="width: 400px; margin-right: auto; margin-left: auto;">{{ $programs->links() }}</div>

<!-- Modal (Pop up when detail button clicked) -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Program Editor</h4>
            </div>
            <div class="modal-body">
                <form id="frmSites" name="frmSites" class="form-horizontal" novalidate="">
					<div class="form-group error">
                        <label for="inputTask" class="col-sm-3 control-label">Program Code</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control has-error" id="program" name="program" value="">
                        </div>
                    </div>  
                    <div class="form-group error">
                        <label for="inputTask" class="col-sm-3 control-label">Program Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control has-error" id="program_pretty" name="program_pretty" value="">
                        </div>
                    </div>
					  <div class="form-group error">
                        <label for="inputTask" class="col-sm-3 control-label">Department</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control has-error" id="department" name="department" value="">
                        </div>
                    </div>
                    <div class="form-group error">
                        <label for="inputTask" class="col-sm-3 control-label">Program URL</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control has-error" id="program_url" name="program_url" value="">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes</button>
                <input type="hidden" id="program_id" name="program_id" value="0">
            </div>
        </div>
    </div>
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="{{asset('js/programs-admin.js')}}"></script>
@endsection