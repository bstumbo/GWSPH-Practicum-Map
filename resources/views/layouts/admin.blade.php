<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>@yield('title')</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <link href="../public/css/select2.min.css" rel="stylesheet" />
        <link href="../public/css/styles.css" rel="stylesheet" />
        <link href="../public/css/jquery.paginate.css" rel="stylesheet" />
        <link href="../public/css/bootstrap.css" rel="stylesheet" />
        <link href="../public/css/bootstrap-responsive.css" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="../public/js/select2.min.js"></script>
        <script src="../public/js/jquery.paginate.js"></script>
        <script src="../public/js/tablesort.js"></script>
<!-- Drupal Styles and JS -->
<style>
@import url("http://publichealth.gwu.edu/sites/all/themes/gwu/css/global/gwu.global.css?os685u");
</style>
<link href="../public/css/gwu-style.css" rel="stylesheet" />
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
                        <form id="frmImport" name="frmImport" method="POST" action="/practicummap/public/uploaded" class="form-horizontal"  novalidate="" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group error">
                                <label for="inputTask" class="col-sm-3 control-label">JSON File</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control has-error" id="file" name="file" accept=".json">
                                </div>
                            </div>
                        <input type="submit" value="submit" class="btn btn-primary">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <!--<input type="submit" value="submit" class="btn btn-primary">-->
                        <!--<button type="button" class="btn btn-primary" id="btn-upload" value="upload">Import</button>-->
                        <!--<input type="hidden" id="site_id" name="site_id" value="0">-->
                    </div>
                </div>
            </div>
        </div>
<meta name="_token" content="{!! csrf_token() !!}" /> 
<script src="{{asset('js/admin.js')}}"></script>
    </body>
</html>