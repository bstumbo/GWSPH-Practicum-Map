<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Sites</title>

    <!-- Load Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<style>
    ul.pagination li {
    display: inline;
    }
    
    table {
        border: 1px solid black;
        padding: 5px; 
    }
    
    tr {
        margin-top: 5px;
    }
    
    td {
        padding: 5px;
        border: 1px solid black;
    }
</style>
</head>
<body>
<h1>Sites</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Organization Name</th>
                <th>Address</th>
                <th>City</th>
                <th>State</th>
                <th>Zip Code</th>
                <th>Country</th>
            </tr>
        </thead>
        <tbody id="sites">                    
            @foreach ($sites as $site)
                <tr id="{{$site->id}}">
                    <td style="width: 16%; text-align: center;">{{$site->org_name}}</td>
                    <td style="width: 16%; text-align: center;">{{$site->address}}</td>
                    <td style="width: 16%; text-align: center;">{{$site->state}}</td>
                    <td style="width: 16%; text-align: center;">{{$site->state}}</td>
                    <td style="width: 16%; text-align: center;">{{$site->zip}}</td>
                    <td style="width: 16%; text-align: center;">{{$site->country}}</td>
                    <td>
                       <button class="btn btn-warning btn-xs btn-detail open-modal" value="{{$site->id}}">Edit</button>
                       <button class="btn btn-danger btn-xs btn-delete delete-task" value="{{$site->id}}">Delete</button>
                   </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
     
        
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
                            <input type="text" class="form-control has-error" id="site_id" name="site_id" value="" readonly>
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


        
<meta name="_token" content="{!! csrf_token() !!}" />  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="{{asset('js/sites-admin.js')}}"></script>

</body>   
</html>
