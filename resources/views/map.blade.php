<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" />
<link href="../public/css/select2.min.css" rel="stylesheet" />
<link href="../public/css/styles.css" rel="stylesheet" />
<link href="../public/css/jquery.paginate.css" rel="stylesheet" />
<link href="../public/css/bootstrap.css" rel="stylesheet" />
<link href="../public/css/bootstrap-responsive.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="../public/js/select2.min.js"></script>
<script src="../public/js/jquery.paginate.js"></script>
<script src="../public/js/tablesort.js"></script>
<script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"></script>
<script src="http://matchingnotes.com/javascripts/leaflet-google.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCJsvr80YY4kZ4n1gcfpSNrz3dU7Ln1BEI"></script>
  
<!-- Drupal Styles and JS -->



<link type="text/css" rel="stylesheet" href="http://publichealth.gwu.edu/sites/default/files/css/css_Vv_jD3sn-2VpG5VjIb_hpOWzqRR9O-p6PjBDqioePrk.css" media="all" />
<link type="text/css" rel="stylesheet" href="http://publichealth.gwu.edu/sites/default/files/css/css_usSpPQDqrNuPYeAerggiImqHIT5SkDRLc6ao6Hui_cU.css" media="all" />
<link type="text/css" rel="stylesheet" href="http://publichealth.gwu.edu/sites/default/files/css/css_JCcqfxTx0d6y0MIbfwp2dDfzjbuE9R2UkOvi0oiqJ_Q.css" media="all" />
<link type="text/css" rel="stylesheet" href="http://publichealth.gwu.edu/sites/default/files/css/css_SSv1IbS4AkVJt1CF9-Rlbs4dTi0VKu0EkB7iQBlEcCM.css" media="print" />
<link type="text/css" rel="stylesheet" href="http://publichealth.gwu.edu/sites/default/files/css/css_s6WJX3p_QcUa0EgydMP-HxrmWX22D_dJfSLmOo6Xjmw.css" media="all" />

<!--<script src="http://publichealth.gwu.edu/sites/default/files/js/js_RU5Gn1hNhIAPv1pKQEFmDv-Q-KtqelK6M8P5clytA3A.js"></script>
<script src="http://publichealth.gwu.edu/sites/default/files/js/js_jUGMAWXyVvwzUHrnLYAOC20Z5Zo2RFUW2xbLBM2kqrc.js"></script>
<script src="http://publichealth.gwu.edu/sites/default/files/js/js_jeGGQBrUC0oniGvPBVs8IsCRdQYwSFPYog77TE1ySbE.js"></script>
<script src="http://publichealth.gwu.edu/sites/default/files/js/js_o0NmOA6FrOQamIKXP181IN2QejpF72PVBGsbUlh8LeY.js"></script> -->

<!-- End of Drupal Styles -->


<style>
  #mapid { height: 400px; width: 100%; }
  
  ul.pagination li {
    display: inline;
  }
</style>

<script type="text/javascript">
$(document).ready(function() {
  $("#department").select2();
  $("#term").select2();
  $("#city").select2();
  $("#state").select2();
  $("#country").select2();
});
</script>
  
<!-- Drupal Menu -->
<header class="l-header" role="banner">
    <div class="header-wrap">
      <div class="main-nav">
      	<!--<a href="/" class="mobile-home">Home</a>-->
          <div class="l-region l-region--header">
    <nav id="block-menu-block-4" role="navigation" class="block block--menu-block block--menu-block-4">
      
  <div class="menu-block-wrapper menu-block-4 menu-name-main-menu parent-mlid-0 menu-level-1">
  <ul class="menu"><li  class="first leaf active menu-mlid-221 home"><a href="http://publichealth.gwu.edu" class="active">Home</a></li>
<li  class="expanded menu-mlid-539 about"><a href="/about">About</a><ul class="menu"><li  class="first leaf menu-mlid-878 leadership leadership"><a href="/about/leadership">Leadership</a></li>
<li  class="leaf menu-mlid-1067 message-from-the-dean message-from-the-dean"><a href="/about/dean">Message from the Dean</a></li>
<li  class="leaf menu-mlid-1447 faculty-directory faculty-directory"><a href="/content/faculty-directory">Faculty Directory</a></li>
<li  class="leaf menu-mlid-839 administrative-offices administrative-offices"><a href="/about/administrative-offices">Administrative Offices</a></li>
<li  class="leaf menu-mlid-876 pressroom pressroom"><a href="/about/pressroom" title="Information for journalists and the media, recent press releases">Pressroom</a></li>
<li  class="leaf menu-mlid-847 events events"><a href="/about/events">Events</a></li>
<li  class="leaf menu-mlid-845 jobs jobs"><a href="/about/jobs">Jobs</a></li>
<li  class="last leaf menu-mlid-2253 accreditation-ceph accreditation-ceph"><a href="/content/ceph-accreditation-2015">Accreditation (CEPH)</a></li>
</ul></li>
<li  class="expanded menu-mlid-531 admissions"><a href="/admissions">Admissions</a><ul class="menu"><li  class="first leaf has-children menu-mlid-832 graduate-admissions graduate-admissions"><a href="/admissions/graduate-admissions">Graduate Admissions</a></li>
<li  class="leaf menu-mlid-831 undergraduate-admissions undergraduate-admissions"><a href="/admissions/undergraduate-admissions">Undergraduate Admissions</a></li>
<li  class="leaf menu-mlid-829 admissions-visits admissions-visits"><a href="/admissions/visits">Admissions Visits</a></li>
<li  class="leaf menu-mlid-830 virtual-visits virtual-visits"><a href="/admissions/virtual-visits">Virtual Visits</a></li>
<li  class="leaf menu-mlid-3806 admissions-monthly admissions-monthly"><a href="/content/top-10-reasons-get-your-graduate-degree-public-health">Admissions Monthly</a></li>
<li  class="leaf menu-mlid-5147 contact-us contact-us"><a href="/admissions/contact-us">Contact Us</a></li>
<li  class="leaf menu-mlid-932 deadlines deadlines"><a href="/admissions/deadlines">Deadlines</a></li>
<li  class="last leaf menu-mlid-1397 apply apply"><a href="http://www.sophas.org/" title="">Apply</a></li>
</ul></li>
<li  class="expanded menu-mlid-532 academics"><a href="/academics">Academics</a><ul class="menu"><li  class="first leaf menu-mlid-844 undergraduate-programs undergraduate-programs"><a href="/academics/undergraduate" title="Undergraduate Public Health Programs at The George Washington University">Undergraduate Programs</a></li>
<li  class="leaf has-children menu-mlid-833 graduate-programs graduate-programs"><a href="/academics/graduate-academic-programs">Graduate Programs</a></li>
<li  class="leaf menu-mlid-790 certificate-programs certificate-programs"><a href="/academics/graduate/certificates">Certificate Programs</a></li>
<li  class="leaf menu-mlid-796 online-programs online-programs"><a href="/academics/online-programs">Online Programs</a></li>
<li  class="leaf menu-mlid-791 academic-advising academic-advising"><a href="/academics/advising">Academic Advising</a></li>
<li  class="leaf has-children menu-mlid-792 courses courses"><a href="/academics/courses">Courses</a></li>
<li  class="leaf has-children menu-mlid-824 practicum practicum"><a href="/academics/practicum">Practicum</a></li>
<li  class="leaf menu-mlid-912 graduation graduation"><a href="/academics/graduation">Graduation</a></li>
<li  class="leaf menu-mlid-911 academic-forms academic-forms"><a href="/academics/forms">Academic Forms</a></li>
<li  class="leaf menu-mlid-1269 academic-integrity-requirements academic-integrity-requirements"><a href="/integrity">Academic Integrity Requirements</a></li>
<li  class="last leaf menu-mlid-1180 archive-of-retired-programs archive-of-retired-programs"><a href="/academics/program-archive">Archive of Retired Programs</a></li>
</ul></li>
<li  class="expanded menu-mlid-533 departments"><a href="/departments/main">Departments</a><ul class="menu"><li  class="first leaf has-children menu-mlid-688 environmental-and-occupational-health environmental-and-occupational-health"><a href="/departments/environmental-and-occupational-health">Environmental and Occupational Health</a></li>
<li  class="leaf has-children menu-mlid-687 epidemiology-and-biostatistics epidemiology-and-biostatistics"><a href="/departments/epidemiology-and-biostatistics">Epidemiology and Biostatistics</a></li>
<li  class="leaf has-children menu-mlid-686 exercise-and-nutrition-sciences exercise-and-nutrition-sciences"><a href="/departments/exercise-and-nutrition-sciences">Exercise and Nutrition Sciences</a></li>
<li  class="leaf has-children menu-mlid-644 global-health global-health"><a href="/departments/global-health">Global Health</a></li>
<li  class="leaf has-children menu-mlid-678 health-policy-and-management health-policy-and-management"><a href="/departments/health-policy-and-management">Health Policy and Management</a></li>
<li  class="leaf has-children menu-mlid-683 prevention-and-community-health prevention-and-community-health"><a href="/departments/prevention-and-community-health">Prevention and Community Health</a></li>
<li  class="last leaf has-children menu-mlid-879 undergraduate-public-health undergraduate-public-health"><a href="/departments/undergraduate-public-health">Undergraduate Public Health</a></li>
</ul></li>
<li  class="expanded menu-mlid-534 research"><a href="/research/main">Research</a><ul class="menu"><li  class="first leaf menu-mlid-872 research-overview research-overview"><a href="/research/research-overview-old" title="">Research Overview</a></li>
<li  class="leaf menu-mlid-862 organized-research-units organized-research-units"><a href="/research/centers-institutes">Organized Research Units</a></li>
<li  class="leaf has-children menu-mlid-863 sph-office-of-research-excellence sph-office-of-research-excellence"><a href="/research/sphhs-office-research-excellence">SPH Office of Research Excellence</a></li>
<li  class="leaf menu-mlid-937 research-computing-resources research-computing-resources"><a href="/research/shared-data-platform-strong-box">Research Computing Resources</a></li>
<li  class="leaf menu-mlid-934 research-accelerator-blog research-accelerator-blog"><a href="http://publichealth.gwu.edu/blogs/researchaccelerator/" title="">Research Accelerator! Blog</a></li>
<li  class="last leaf menu-mlid-871 gw-office-of-the-vice-president-of-research gw-office-of-the-vice-president-of-research"><a href="http://research.gwu.edu" title="">GW Office of the Vice President of Research</a></li>
</ul></li>
<li  class="expanded menu-mlid-535 services"><a href="/content/services-students">Services</a><ul class="menu"><li  class="first leaf has-children menu-mlid-822 for-students for-students"><a href="/content/services-students" title="">For Students</a></li>
<li  class="leaf has-children menu-mlid-826 for-faculty for-faculty"><a href="/services/faculty">For Faculty</a></li>
<li  class="leaf has-children menu-mlid-885 for-alumni for-alumni"><a href="/services/alumni-unlisted916">For Alumni</a></li>
<li  class="last leaf menu-mlid-3807 gwsph-source gwsph-source"><a href="http://source.publichealth.gwu.edu" title="">GWSPH Source</a></li>
</ul></li>
<li  class="expanded menu-mlid-536 facilities"><a href="/facilities/facilities-overview">Facilities</a><ul class="menu"><li  class="first leaf menu-mlid-1168 overview overview"><a href="/facilities/facilities-overview" title="">Overview</a></li>
<li  class="leaf has-children menu-mlid-1165 950-new-hampshire-avenue 950-new-hampshire-avenue"><a href="/facilities/950-new-hampshire-avenue">950 New Hampshire Avenue</a></li>
<li  class="leaf menu-mlid-1268 2175-k-street 2175-k-street"><a href="/content/2175-k-street">2175 K Street</a></li>
<li  class="last leaf menu-mlid-1272 directions-and-parking directions-and-parking"><a href="/content/directions-and-parking">Directions and Parking</a></li>
</ul></li>
<li  class="expanded menu-mlid-828 give"><a href="/give">Give</a><ul class="menu"><li  class="first leaf menu-mlid-884 make-a-gift make-a-gift"><a href="https://secure2.convio.net/gwu/site/Donation2?df_id=1382&amp;1382.donation=form1&amp;set.SingleDesignee=1014&amp;utm_source=publichealth.gwu.edu&amp;utm_medium=website&amp;utm_content=nav&amp;utm_campaign=giving-sphhs" title="">Make a Gift</a></li>
<li  class="leaf menu-mlid-881 giving-opportunities giving-opportunities"><a href="/give/giving-opportunities">Giving Opportunities</a></li>
<li  class="leaf menu-mlid-806 ways-to-give ways-to-give"><a href="/content/ways-give">Ways to Give</a></li>
<li  class="leaf menu-mlid-1179 donors-making-a-difference donors-making-a-difference"><a href="/give/donors-difference">Donors Making a Difference</a></li>
<li  class="leaf menu-mlid-882 frequently-asked-questions frequently-asked-questions"><a href="/give/giving-FAQ">Frequently Asked Questions</a></li>
<li  class="last leaf menu-mlid-883 sph-development-staff sph-development-staff"><a href="/give/development-staff">SPH Development Staff</a></li>
</ul></li>
</ul></div>
</nav>
  </div>
      </div><!-- /main-nav -->
    </div><!-- /header-wrap -->
  </header>

<!-- Drupal Menu End -->

<!-- Drupal Section Content -->

 <!-- head section -->
    <section role="region" aria-labelledby="highlevel-title" class="page-title parallax3 padding-two" style="background:#004065;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 text-center animated fadeInUp">
                    <!-- page title -->
                    <h1 id="highlevel-title" class="white-text">GWSPH Practicum Map</h1>
                    <!-- end page title -->
                    <!-- page title tagline -->
                    <span class="white-text">The only school of public health in the nation’s capital and currently ranked #14 on U.S. News and World Report’s list of Best Public Health Graduate schools.</span>
                    <p class="padding-two no-margin"><a href="http://publichealth.gwu.edu/academics/graduate-academic-programs" class="highlight-button-white-border btn-noshadow btn btn-medium btn-round button xs-margin-bottom-five">Learn More About Practicums</a></p>
                    <!-- end title tagline -->
                </div>
            </div>
        </div>
    </section>
    <!-- end head section -->
    
    <!--What is Department-->
    <section role="region" aria-labelledby="whatis" class="padding-one bg-white">
        <div class="container">
            <div class="padding-one col-md-12 col-sm-12 sm-margin-bottom-ten sm-text-center">
                <h3 id="whatis" class="letter-spacing-2">Practicums are good, but GWSPH Practicums are Great</h3><br>
                <p>Environmental and occupational health looks at how environmental and occupational exposures impact human health. It explores the underlying science and policy for issues such as sustainable cities and food systems, climate change mitigation, workplace safety and risk management. Students learn from and work with our faculty on conducting cutting-edge research that is helping to dictate environmental and occupational health policy. Our faculty have been called upon by Congress to offer their expertise in areas like antibiotic resistance, climate change, occupational safety and environmental exposures, influencing critical regulations and legislation like the Toxic Substances Control Act.</p>
            </div>
        </div>
    </section>    
    <!--What is Department End-->


<!-- Drupal Section Content End -->

  
<div class="form-wrapper">
    <form method="POST" action="/practicummap/public/departments" id="frmTasks" name="frmTasks" class="ajax" novalidate="">
      <div class="form-group error">
          <div class="col-sm-9">
              <select id="department" name="department">
               <option selected="selected" value=null>Search by Department</option>
                <option value="Epidemiology and Biostatistics">Epidemiology and Biostatistics</option>
                <option value="Environmental and Occupational Health">Environmental and Occupational Health</option>
                <option value="Exercise and Nutrition Sciences">Exercise and Nutrition Sciences</option>
                  <option value="Global Health">Global Health</option>
                  <option value="Health Policy and Management">Health Policy and Management</option>
                <option value="Online MPH @ GW">Online MPH @ GW</option>
                  <option value="Prevention and Community Health">Prevention and Community Health</option>
              </select>
          </div>        
      </div>
        <div class="form-group error">
          <div class="col-sm-9">
              <select id="term" name="term">
                <option selected="selected" value=null>Search by Work Term</option>
                <option value="Spring 2016">Spring 2016</option>
                <option value="Summer 2016">Summer 2016</option>
                <option value="Fall 2016">Fall 2016</option>
                <option value="Spring 2017">Spring 2017</option>
                <option value="Summer 2017">Summer 2017</option>
                <option value="Fall 2017">Fall 2017</option>
              </select>
          </div>        
      </div>
        <div class="form-group error">
          <div class="col-sm-9">
              <select id="city" name="city" value="">
                 <option value="null">Select a City</option>
                  @foreach($cities as $city)
                    <option value="{{ $city }}">{{ $city }}</option>
                  @endforeach
              </select>
          </div>        
      </div>
        <div class="form-group error">
          <div class="col-sm-9">
              <select id="state" name="state" value="">
              <option value="null">Select a State</option>
                @foreach($states as $state)
                  <option value="{{ $state }}">{{ $state }}</option>
                @endforeach
              </select>
          </div>        
      </div>
        <div class="form-group error">
          <div class="col-sm-9">
              <select id="country" name="country" value="">
              <option value="null">Select a Country</option>
                @foreach($countries as $country)
                  <option value="{{ $country }}">{{ $country }}</option>
                @endforeach
              </select>
          </div>        
      </div>
      <div class="form-group error">
        <div class="col-sm-9">
          <input class="btn-primary" type="submit" value="Submit">
        </div>
      </div>
      <div class="form-group error">
        <div class="col-sm-9">
          <button class="btn-primary" id="reset">Reset</button>
        </div>
      </div>
    </form>
  </div>  
  
  <div id="mapid" style="width: 100%; height: 400px; position: relative; outline: none;"></div>
  
  <div id="practicum-ajax"></div>
   
  <div style="margin: 20px;">
    <div id="orgheader" class="sort" style="width: 25%; float: left;"><p align=center><strong>Organization Name</a></strong></p></div>
    <div id="cityheader" class="sort" style="width: 25%; float: left;"><p align=center><strong>City</a></strong></p></div>
    <div id="stateheader" class="sort" style="width: 25%; float: left;"><p align=center><strong>State</a></strong></p></div>
    <div id="countryheader" class="sort" style="width: 25%; float: left;"><p align=center><strong>Country</a></strong></p></div>
  </div>
  <div id="practicum-list"> 
    @include('siteprac');
  </div>

<ul id="pagination-demo" class="pagination-sm"></ul>

<script type="text/javascript">
  
  $('#practicum-list').paginate({ 'perPage': 25 });
  
   $(document).ajaxSuccess(function(){
       $('#practicum-list').data('paginate').kill();
       $('#practicum-list').paginate({ 'perPage': 25 });
      });


</script>   
  
 <script type="text/javascript">
  bounds = new L.LatLngBounds(new L.LatLng(-75, -180), new L.LatLng(75, 185));

  var mymap = new L.Map('mapid', { center: new L.LatLng(37.0902, -95.7129), zoom: 3, maxBounds: bounds,
  maxBoundsViscosity: .75});
  
 L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
    maxZoom: 18,
    minZoom: 3,
    continuousWorld: false,
    noWrap: true,
    id: 'mapbox.streets',
    accessToken: 'pk.eyJ1IjoiYnN0dW1ibyIsImEiOiJjajFvejdiOGYwMWd4MndtYnZreXBjb3llIn0.ffvfjib5FpXMMwXW1ygyxg'
    }).addTo(mymap);
    
    
    var sitejson = {!! json_encode($sites) !!};
    
    for (var i = 0; i < sitejson.length; i++) {
      
      var orgname = sitejson[i].org_name;
      var infostring = orgname.concat(sitejson[i].city, sitejson[i].state);
      var marker = L.marker([sitejson[i].latitude, sitejson[i].longitude]).addTo(mymap)
      .bindPopup(infostring)
      .openPopup();
    }
    
</script>
  

<meta name="_token" content="{!! csrf_token() !!}" />  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="{{asset('js/map.js')}}"></script>
<script src="{{asset('js/ajax-crud.js')}}"></script>


    
  