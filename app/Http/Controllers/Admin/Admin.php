<?php

namespace App\Http\Controllers\Admin;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Select2Filters\CityFilter;
use App\Http\Controllers\Select2Filters\StateFilter;
use App\Http\Controllers\Select2Filters\CountryFilter;
use App\Http\Controllers\Select2Filters\ProgramFilter;
use App\Http\Controllers\Programs\ProgramSearch;
use Response;
use App\Site;
use App\Practicum;
use App\Program;

class Admin extends Controller

{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    function sitesAll() {
    
    /* Fetch all sites */
    
        $sites = Site::paginate(20);
        
         /*
         * Get all cities (no dups) for filtering
         */
        
        $cityquery = new CityFilter; 
        $cities = $cityquery->getCities();
        
        /*
         * Get all states (no dups) for filtering
         */
        
        $statequery = new StateFilter; 
        $states = $statequery->getStates();
        
        /*
         * Get all countries (no dups) for filtering
         */
        
        $countryquery = new CountryFilter; 
        $countries = $countryquery->getCountries();
    
       return view('sites', array('sites' => $sites, 'cities' => $cities, 'states' => $states, 'countries' => $countries));
    }
    
    function practicumsAll() {
            
    
        /* Fetch all practicums */
        
        $practicums = Practicum::paginate(20);
        
        /*Practicum Filters */
        
        $programquery = new ProgramFilter; 
        $programs = $programquery->getPrograms();
        
        
        return view('practicums', array('practicums' => $practicums, 'programs' => $programs));
    }
    
    function programsAll() {
        $programs = Program::paginate(20);
        
        return view('programs', array('programs' => $programs));
    }
    
    
    /*
    *  Site CRUD (ajax)
    */
    
    function createSite(Request $request) {
        $site = new Site;
        
        $site->id = $request->id;
        $site->org_name = $request->org_name;
        $site->address = $request->address;
        $site->city = $request->city;
        $site->state = $request->state;
        $site->zip = $request->zip;
        $site->country = $request->country;
        //$newSite->practicum_number= $data['practicum_number'];
        $address = $request->address . ", " . $request->city . ", " . $request->state . " " . $request->zip;
        $coordinates = app('geocoder')->geocode($address)->get()->first()->getCoordinates();
        $site->latitude = $coordinates->getLatitude();
        $site->longitude = $coordinates->getLongitude();
        $site->save();
        
        return Response::json($site);
       }
       
    function readSite($site_id) {
        $site = Site::find($site_id);
       
        return Response::json($site);
    }
    
    function editSite(Request $request, $site_id) {
        
        /* Find site being up dated */
        $site = Site::find($site_id);
        
        /* Set values of $site to values of $request */
        $site->id =  $request->id;
        $site->org_name = $request->org_name;
        $site->address = $request->address;
        $site->city = $request->city;
        $site->state = $request->state;
        $site->zip = $request->zip;
        $site->country = $request->country;
        
        /* Save updated $site to database */
        
        $site->save();
        
        return Response::json($site);
    }
    
    function deleteSite($site_id) {
        
        $site = Site::destroy($site_id);
        
        return Response::json($site);
    }
    
    /*
    *  Practicum CRUD (ajax)
    */
    
     function createPrac(Request $request) {
         $practicum = Practicum::create($request->all());
        
        return Response::json($practicum);
    }
    
    function readPrac($practicum_id) {
        $practicum = Practicum::find($practicum_id);
       
        return Response::json($practicum);
        
    }
    
    function editPrac(Request $request, $practicum_id) {
        
    /* Find practicum being up dated */
     
        $practicum = Practicum::find($practicum_id);
        
    /* Set values of $practicum to values of $request */
        
        $practicum->prac_id = $request->prac_id;
        $practicum->title = $request->title;
        $practicum->term = $request->term;
        $practicum->description = $request->description;
        $practicum->department = $request->department;
        $practicum->site_id = $request->site_id;
        $practicum->major = $request->major;
        $practicum->program_link = $request->program_link;
        
    /* Save updated $practicum to database */
        
        $practicum->save();
        
        return Response::json($practicum);
    }
    
    function deletePrac($practicum_id) {
        
    /* Destroy practicum record in database by $practicum_id */
        
        $practicum = Practicum::destroy($practicum_id);
        
        return Response::json($practicum);
    }
    
    /*
     *
     * Programs CRUD
     *
     */
    
    function createProgram(Request $request) {
         $program = Program::create($request->all());
        
        return Response::json($program);
    }
    
    function readProgram($program_id) {
        $program = Program::find($program_id);
       
        return Response::json($program);
        
    }
    
    function editProgram(Request $request, $program_id) {
        
    /* Find Program being up dated */
     
        $program = Program::find($program_id);
        
    /* Set values of $practicum to values of $request */
        
        $program->program = $request->program;
        $program->program_pretty = $request->program_pretty;
        $program->department = $request->department;
        $program->program_url = $request->program_url;
        
    /* Save updated $program to database */
        
        $program->save();
        
        return Response::json($program);
    }
    
    function deleteProgram($program_id) {
        
    /* Destroy practicum record in database by $practicum_id */
        
        $program = Program::destroy($program_id);
        
        return Response::json($program);
    }
}