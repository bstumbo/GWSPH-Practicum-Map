$(document).ready(function(){
    
    /*
     * Reload Page with reset button
    */
    
   $("#reset").click(function(){
       window.location.href="/practicummap/public/programs"
    });
    
    var url = "/practicummap/public/programs-edit";
    
    //display modal form for task editing
    $('.open-modal').click(function(){
        var program_id = $(this).val();

        $.get(url + '/' + program_id, function (data) {
            //success data
            console.log(data);
            $('#program_id').val(data.id);
            $('#program').val(data.program);
            $('#program_pretty').val(data.program_pretty);
            $('#department').val(data.department);
            $('#program_url').val(data.program_url);
            $('#btn-save').val("update");

            $('#myModal').modal('show');
        }) 
    });

    //display modal form for creating new task
    $('#btn-add').click(function(){
        $('#btn-save').val("add");
        $('#frmTasks').trigger("reset");
        $('#myModal').modal('show');
    });

    //delete task and remove it from list
    $('.delete-program').click(function(){
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
         
        var program_id = $(this).val();

        $.ajax({

            type: "DELETE",
            url: url + '/' + program_id,
            success: function (data) {
                console.log(data);

                $("#" + program_id).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

    //create new task / update existing task
        $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

        e.preventDefault(); 

        var formData = {
            id: $('#program_id').val(),
            program: $('#program').val(),
            program_pretty: $('#program_pretty').val(),
            department: $('#department').val(),
            program_url: $('#program_url').val(),
        }

        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save').val();

        var type = "POST"; //for creating new resource
        var program_id = $('#program_id').val();;
        var my_url = url;

        if (state == "update"){
            type = "PUT"; //for updating existing resource
            my_url += '/' + program_id;
        }

        console.log(formData);

        $.ajax({

            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);

                var program = '<tr id="' + data.id + '"><td style="width: 25%; text-align: center;">' + data.program_pretty + '</td><td style="width: 16%; text-align: center;">' + data.department + '</td><td style="width: 25%; text-align: center;">' + data.program_url + '</td>';
                program += '<td><button class="btn btn-warning btn-xs btn-detail open-modal" value="' + data.id + '">Edit</button>';
                program += '<button class="btn btn-danger btn-xs btn-delete delete-program" value="' + data.id + '">Delete</button></td></tr>';

                if (state == "add"){ //if user added a new record
                    $('#programs').append(program);
                }else{ //if user updated an existing record

                    $("#" + program_id).replaceWith( program );
                }

                $('#frmSites').trigger("reset");

                $('#myModal').modal('hide')
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

});