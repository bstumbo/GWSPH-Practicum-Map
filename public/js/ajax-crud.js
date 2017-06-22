$(document).ready(function(){
    
    /*
     * Reload Page with reset button
    */
    
   /* $("#reset").click(function(){
        document.location.reload(true);
    });*/
    
    /* Show practicums under site
    */

    $("#practicum-list").on("click", ".site-row", function(){
        $(".sub-row", this).toggle();
    });
    
    
    $('form.ajax').on('submit', function() {
        delete this.sitejson;
        delete this.pagination;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        
        
	var that = $(this),
            url = that.attr('action'),
            type = that.attr('method'),
            data = {};
            
        that.find('[name]').each(function(index, value){
                var that = $(this),
                    name =  that.attr('name'),
                    value = that.val();
                data[name] = value;
            });
        
		
             $.ajax ({
                
                url: url,
                type: type,
                data: data,
                timeout: 7000,
                success: function(response) {
        
                    
                    var sites = ajaxmap(response.sites);
                    
                    var divHTML = '';
                    $.each(response.siteprac, function (i, item) {
                        divHTML += '<div class="site-row" style="clear:both; border: 1px solid black; margin: 20px;"><div class="org_name site-div" style="width: 25%; float: left;"><p align=center>' + item.site.org_name + '</div><div class="city site-div" style="width: 25%; float: left;"><p align=center>' + item.site.city + '</div><div class="state site-div"  style="width: 25%; float: left;"><p align=center>' + item.site.state + '</div><div class="country site-div" style="width: 25%; float: left;"><p align=center>' + item.site.country + '</div>';
                        
                        divHTML += '<div style="width:100%; display:none;" class="sub-row"><table style="width: 100%; border: 1px solid black;">';
                        $.each(item.practicums, function (h, items){
                         
                         divHTML += '<tr><td style="width: 33%; text-align: center;">' + items.title + '</td><td style="width: 33%; text-align: center;">' + items.term + '</td><td style="width: 33%; text-align: center;">' + items.department + '</td></tr>';
               
                            
                        });
                        
                        divHTML += '</table></div></div>';
                    });
                    
                    $('#practicum-list').html(divHTML);
                    $('#mapid').html(sites);
                    
                    },
                error: function (data) {
                console.log('Error:', data);
            }
            });   

    return false;
	
    });
  
});