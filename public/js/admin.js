$(document).ready(function(){

    
    //Display modal form for json import
    
    //display modal form for creating new task
    $('#btn-import').click(function(){
        $('#frmImport').trigger("reset");
        $('#importModal').modal('show');
    });
    
    $("#btn-upload").click(function (e) {
        $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
               }
           })
         e.preventDefault();
         
         var uf = $('form#frmImport');
         var fd = new FormData(uf[0]);
          console.log(fd);
          
          $.ajax({

            type: "POST",
            url: "/practicummap/public/uploaded",
            data: fd,
            processData: false,
            contentType: false,
            success: function (data) {
                console.log(data);
            
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

});