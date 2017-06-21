$(document).ready(function(){ 
  
  var $divs = $("div.site-row");
  console.log($divs);
  
  var ascendingorgname = false;
  var ascendingcity = false;
  var ascendingstate = false;
  var ascendingcountry = false;
  
  $(document).ajaxSuccess(function(){
    $divs = $("div.site-row");
  });
  
  
  //Sort search results by Org Name alpha
  
  $('#orgheader').on('click', function() {
    console.log($divs);
          
      if (ascendingorgname == false) {
       var alphaorg = $divs.sort(function(a, b) {
  
        return $(a).find('.org_name').text().toUpperCase().localeCompare($(b).find('.org_name').text().toUpperCase());
      
      });
       
       ascendingorgname = ascendingorgname ? false : true;
      
     $("#practicum-list").html(alphaorg);
     
      } else {
        var alphaorg = $divs.sort(function(b, a) {
  
        return $(a).find('.org_name').text().toUpperCase().localeCompare($(b).find('.org_name').text().toUpperCase());
      
      });
       
       ascendingorgname = ascendingorgname ? false : true;
      
     $("#practicum-list").html(alphaorg);
      }
      
    });
  

  //Sort search results by city alpha
  
  $('#cityheader').on('click', function() {
         
      if (ascendingcity == false) {
       var alphacity = $divs.sort(function(a, b) {
  
        return $(a).find('.city').text().toUpperCase().localeCompare($(b).find('.city').text().toUpperCase());
      
      });
       
       ascendingcity = ascendingcity ? false : true;
      
     $("#practicum-list").html(alphacity);
     
      } else {
        var alphacity = $divs.sort(function(b, a) {
  
        return $(a).find('.city').text().toUpperCase().localeCompare($(b).find('.city').text().toUpperCase());
      
      });
       
       ascendingcity = ascendingcity ? false : true;
      
     $("#practicum-list").html(alphacity);
      }
      
    });
  
  //Sort search results by state alpha
  
  $('#stateheader').on('click', function() {
         
      if (ascendingstate == false) {
       var alphastate = $divs.sort(function(a, b) {
  
        return $(a).find('.state').text().toUpperCase().localeCompare($(b).find('.state').text().toUpperCase());
      
      });
       
       ascendingstate = ascendingstate ? false : true;
      
     $("#practicum-list").html(alphastate);
     
      } else {
        var alphastate = $divs.sort(function(b, a) {
  
        return $(a).find('.state').text().toUpperCase().localeCompare($(b).find('.state').text().toUpperCase());
      
      });
       
       ascendingstate = ascendingstate ? false : true;
      
     $("#practicum-list").html(alphastate);
      }
      
    });
  
  //Sort search results by country alpha
  
  $('#countryheader').on('click', function() {
         
      if (ascendingcountry == false) {
       var alphacountry = $divs.sort(function(a, b) {
  
        return $(a).find('.country').text().toUpperCase().localeCompare($(b).find('.country').text().toUpperCase());
      
      });
       
       ascendingcountry = ascendingcountry ? false : true;
      
     $("#practicum-list").html(alphacountry);
     
      } else {
        var alphacountry = $divs.sort(function(b, a) {
  
        return $(a).find('.country').text().toUpperCase().localeCompare($(b).find('.country').text().toUpperCase());
      
      });
       
       ascendingcountry = ascendingcountry ? false : true;
      
     $("#practicum-list").html(alphacountry);
      }
      
    });
});