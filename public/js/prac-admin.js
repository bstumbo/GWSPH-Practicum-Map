$(document).ready(function(){
    
      var url = "/practicummap/public/practicums-edit";
    
    //display modal form for task editing
    $('.open-modal').click(function(){
        var prac_id = $(this).val();

        $.get(url + '/' + prac_id, function (data) {
            //success data
            console.log(data);
            $('#prac_id').val(data.prac_id);
            $('#title').val(data.title);
            $('#term').val(data.term);
            $('#description').val(data.description);
            $('#department').val(data.department);
            $('#site_id').val(data.site_id);
            $('#major').val(data.major);
            $('#program_link').val(data.program_link);
            $('#btn-save').val("update");

            $('#myModal').modal('show');
        }) 
    });

    //display modal form for creating new task
    $('#btn-add').click(function(){
        $('#btn-save').val("add");
        $('#frmPrac').trigger("reset");
        $('#myModal').modal('show');
    });

    //delete task and remove it from list
    $('.delete-prac').click(function(){
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
         
        var prac_id = $(this).val();

        $.ajax({

            type: "DELETE",
            url: url + '/' + prac_id,
            success: function (data) {
                console.log(data);

                $("#" + prac_id).remove();
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
            prac_id: $('#prac_id').val(),
            title:$('#title').val(),
            term: $('#term').val(),
            description: $('#description').val(),
            department: $('#department').val(),
            site_id: $('#site_id').val(),
            major: $('#major').val(),
            program_link: $('#program_link').val(),
        }

        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save').val();

        var type = "POST"; //for creating new resource
        var prac_id = $('#prac_id').val();;
        var my_url = url;

        if (state == "update"){
            type = "PUT"; //for updating existing resource
            my_url += '/' + prac_id;
        }

        console.log(formData);

        $.ajax({

            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);

                var prac = '<tr id="#' + data.prac_id + '"><td style="width: 16%; text-align: center;">' + data.title + '</td><td style="width: 16%; text-align: center;">' + data.term + '</td><td style="width: 16%; text-align: center;">' + data.description + '</td><td style="width: 16%; text-align: center;">' + data.department + '</td><td style="width: 16%; text-align: center;">' + data.site_id + '</td><td style="width: 16%; text-align: center;">' + data.major + '</td><td style="width: 16%; text-align: center;">' + data.program_url + '</td>';
                prac += '<td><button class="btn btn-warning btn-xs btn-detail open-modal" value="' + data.prac_id + '">Edit</button>';
                prac += '<button class="btn btn-danger btn-xs btn-delete delete-task" value="' + data.prac_id + '">Delete</button></td></tr>';

                if (state == "add"){ //if user added a new record
                    $('#practicums').append(prac);
                }else{ //if user updated an existing record

                    $("#" + prac_id).replaceWith( prac );
                }

                $('#frmPrac').trigger("reset");

                $('#myModal').modal('hide')
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

});