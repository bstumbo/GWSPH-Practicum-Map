<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>@yield('title')</title>
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
        <div style="width: 250px; margin-left: auto; margin-right:auto;">
             <h1>Admin Section</h1>
                <button id="btn-import" name="btn-import" class="btn btn-primary btn-xs">Import Data</button>
        </div>
    
        <div class="container">
            @yield('content')
        </div>
    <!-- Modal (Pop up when detail button clicked) -->
        <div class="modal fade" id="importModal" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel">Import Symplicity JSON</h4>
                    </div>
                    <div class="modal-body">
                        <form id="frmImport" name="frmImport" class="form-horizontal"  novalidate="">
                            <div class="form-group error">
                                <label for="inputTask" class="col-sm-3 control-label">JSON File</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control has-error" id="file" name="file" accept=".json">
                                </div>
                            </div>
                        
                        </form>
                    </div>
                    <div class="modal-footer">
                        <!--<input type="submit" value="submit" class="btn btn-primary">-->
                        <button type="button" class="btn btn-primary" id="btn-upload" value="add">Import</button>
                        <!--<input type="hidden" id="site_id" name="site_id" value="0">-->
                    </div>
                </div>
            </div>
        </div>
<meta name="_token" content="{!! csrf_token() !!}" /> 
<script src="{{asset('js/admin.js')}}"></script>
    </body>
</html>