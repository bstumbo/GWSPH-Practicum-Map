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

   
            
}
