<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Site;
use App\Practicum;
use Geocoder\Laravel\Facades\Geocoder;

class Map extends Controller
{
    var $site;
    var $practicum;
    
    public function __construct() {
        $this->site = Site::all(array('org_name', 'address','city', 'state', 'zip', 'country', 'latitude', 'longitude'));
        $this->practicum = Practicum::all(array('title'));
    }
    
     public function index() {
        
        $practicums = Practicum::paginate(15);
        $sites = Site::all();
        
        
       
       return view('map', array('sites' => $sites, 'practicums' => $practicums));
       //return response(view('map', array('sites' => $sites, 'practicums' => $practicums), 200, ['Content-Type' => 'application/json'])->render());
       
    }
    
    public function deptfilter(Request $request) {
        $sites = [];
        $department = $request->all();
        $practicums = Practicum::all()->where('department', $department['department']);
        foreach ($practicums as $practicum){
            $site = Site::find($practicum['site_id']);
            $sites[] = $site;
        }
        

        return Response::json(['practicums' => $practicums, 'sites' => $sites]);
    }
}
