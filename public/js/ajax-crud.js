$(document).ready(function(){
    
    
    /*
     * Reload Page with reset button
    */
    
    $("#reset").click(function(){
        document.location.reload(true);
    });
    
    /* Show practicums under site
    */

    $("#practicum-list").on("click", ".site-row", function(){
        if ($(this).hasClass("expanded")) {
            $(this).removeClass("expanded");
            $(this).find('i.fa-minus').removeClass("fa-minus").addClass("fa-plus");        
        } else {
        $(this).addClass("expanded");
        $(this).find('i.fa-plus').removeClass("fa-plus").addClass("fa-minus");  
        }
         $(".sub-row", this).toggle();
    });
    
    
    $('form.ajax').on('submit', function() {
       // delete this.sitejson;
       // delete this.pagination;
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
                timeout: 100000,
                success: function(response) {
        
                    
                    var sites = ajaxmap(response.sites);
                    
                    console.log("Made it back");
                    var divHTML = '';
                    $.each(response.siteprac, function (i, item) {
                       divHTML += '<div class="site-row"><div class="org_name site-div" style="width: 24%; float: left;"><p align=center>' + item.site.org_name + '</div><div class="city site-div" style="width: 24%; float: left;"><p align=center>' + item.site.city + '</div><div class="state site-div"  style="width: 24%; float: left;"><p align=center>' + item.site.state + '</div><div class="country site-div" style="width: 24%; float: left;"><p align=center>' + item.site.country + '</div><div class="site-div" style="width: 4%; float: left;"><span><i class="fa fa-plus plus-top"></i></span></div>';
                        
                        divHTML += '<div style="display:none;" class="sub-row"><table class="practicum-table" style="width: 100%; border: 1px solid black;"> <th style="width: 25%; text-align: center;"><strong>Practicum Plan Titles</strong></th><th style="width: 25%; text-align: center;"><strong>Work Terms</strong></th><th style="width: 25%; text-align: center;"><strong>Major</strong></th><th style="width: 25%; text-align: center;"><strong>Departments/Tracks</strong></th>';
                        $.each(item.practicums, function (h, items){
                         
                        if (items.programlink !== null) { //if program link is null, won't be returned
                         
                         divHTML += '<tr><td style="width: 25%; text-align: center;">' + items.title + '</td><td style="width: 25%; text-align: center;">' + items.term + '</td><td style="width: 25%; text-align: center;"><a target="_blank" href="' + items.programlink.program_url + '">' + items.programlink.program_pretty + '</a></td><td style="width: 33%; text-align: center;">' + items.department + '</td></tr>';
               
                            }
                        
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