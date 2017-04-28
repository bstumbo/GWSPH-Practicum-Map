<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Site;
use App\Practicum;
use Geocoder\Laravel\Facades\Geocoder;
use Illuminate\Support\Facades\DB;

class Map extends Controller
{
    var $site;
    var $practicum;
    
    public function __construct() {
        $this->site = Site::all(array('org_name', 'address','city', 'state', 'zip', 'country', 'latitude', 'longitude'));
        $this->practicum = Practicum::all(array('title'));
    }
    
     public function index() {
        
        $mapsites = Site::all();

        $siteprac = [];
        
       foreach ($mapsites as $site) {
            $practicums = Practicum::all()->where('site_id', $site->id);
            $siteprac[] = array('site' => $site, 'practicums' => $practicums);
        }
         
       // $practicums = Practicum::paginate(15);
        
       return view('map', array('sites' => $mapsites, 'siteprac' => $siteprac));
    
    }
    
    public function deptfilter(Request $request, Practicum $practicum, Site $site) {
        $sites = [];
        $siteprac = [];
        
        $practicum = $practicum->newQuery();
        $site = $site->newQuery();
        
         if ($request->department !== "null") {
            $practicum->where('department', $request->input('department'))->get();
        }
        
        if ($request->term !== "null") {
            $practicum->where('term', $request->input('term'))->get();
        }
        
        if ($request->has('city')) {
            $subset =  $site->where('city', $request->input('city'))->get();
           if(count($subset) > 1){
            foreach ($subset as $set) {
                foreach ($set as $s) {
                    $practicum->where('site_id', $s['id']);
                }
            }
           } else {
           
            foreach ($subset as $set) {
            $practicum->where('site_id', $set->id);
            }
           
           }
        }
         
         $practicums = $practicum->get();
       
        foreach ($practicums as $practicum){
            $site = Site::find($practicum['site_id']);
            $sites[] = $site;
        }
        
        foreach ($sites as $site) {
             $practicums = Practicum::all()->where('site_id', $site->id);
            $siteprac[] = array('site' => $site, 'practicums' => $practicums);
        }
    

        return Response::json(['siteprac' => $siteprac, 'sites' => $sites]);
    }
            
}
