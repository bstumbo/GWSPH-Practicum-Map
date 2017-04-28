<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Response;
use App\Site;
use App\Practicum;

class Admin extends Controller

{

    function index(){
        
    }
    
    function sitesAll() {
    
    /* Fetch all sites */
    
        $sites = Site::paginate(20);
    
       return view('sites', array('sites' => $sites));
    }
    
    function practicumsAll() {
    
    /* Fetch all practicums */
    
        $practicums = Practicum::paginate(20);
        
        return view('practicums', array('practicums' => $practicums));
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
        
        $practicum->prac_id = $request->id;
        $practicum->title = $request->title;
        $practicum->term = $request->term;
        $practicum->description = $request->description;
        $practicum->department = $request->department;
        $practicum->site_id = $request->site_id;
        
    /* Save updated $practicum to database */
        
        $practicum->save();
        
        return Response::json($practicum);
    }
    
    function deletePrac($practicum_id) {
        
    /* Destroy practicum record in database by $practicum_id */
        
        $practicum = Practicum::destroy($practicum_id);
        
        return Response::json($practicum);
    }
}