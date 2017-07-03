$(document).ready(function(){
    
    var url = "/practicummap/public/sites-edit";
    
    //display modal form for task editing
    $('.open-modal').click(function(){
        var site_id = $(this).val();

        $.get(url + '/' + site_id, function (data) {
            //success data
            console.log(data);
            $('#site_id').val(data.id);
            $('#org_name').val(data.org_name);
            $('#address').val(data.address);
            $('#city').val(data.city);
            $('#state').val(data.state);
            $('#zip').val(data.zip);
            $('#country').val(data.country);
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
    $('.delete-site').click(function(){
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
         
        var site_id = $(this).val();

        $.ajax({

            type: "DELETE",
            url: url + '/' + site_id,
            success: function (data) {
                console.log(data);

                $("#" + site_id).remove();
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
            id: $('#site_id').val(),
            org_name: $('#org_name').val(),
            address: $('#address').val(),
            city: $('#city').val(),
            state: $('#state').val(),
            zip: $('#zip').val(),
            country: $('#country').val(),
        }

        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save').val();

        var type = "POST"; //for creating new resource
        var site_id = $('#site_id').val();;
        var my_url = url;

        if (state == "update"){
            type = "PUT"; //for updating existing resource
            my_url += '/' + site_id;
        }

        console.log(formData);

        $.ajax({

            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);

                var site = '<tr id="#' + data.id + '"><td style="width: 16%; text-align: center;">' + data.org_name + '</td><td style="width: 16%; text-align: center;">' + data.address + '</td><td style="width: 16%; text-align: center;">' + data.city + '</td><td style="width: 16%; text-align: center;">' + data.state + '</td>';
                site += '<td style="width: 16%; text-align: center;">' + data.zip + '</td><td style="width: 16%; text-align: center;">' + data.country + '</td>';
                site += '<td><button class="btn btn-warning btn-xs btn-detail open-modal" value="' + data.id + '">Edit</button>';
                site += '<button class="btn btn-danger btn-xs btn-delete delete-task" value="' + data.id + '">Delete</button></td></tr>';

                if (state == "add"){ //if user added a new record
                    $('#sites').append(site);
                }else{ //if user updated an existing record

                    $("#" + site_id).replaceWith( site );
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