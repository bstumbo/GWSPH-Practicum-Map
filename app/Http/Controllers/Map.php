<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Request;
use View;
use Illuminate\Support\Collection;
use Response;
use App\Site;
use App\Practicum;
use Geocoder\Laravel\Facades\Geocoder;
use Illuminate\Support\Facades\DB;
use Select2Filters\CityFilter;

class Map extends Controller
{
    var $site;
    var $practicum;
    
    public function __construct() {
        $this->site = Site::all(array('org_name', 'address','city', 'state', 'zip', 'country', 'latitude', 'longitude'));
        $this->practicum = Practicum::all(array('title'));
    }
    
     public function index() {
        
        /*
         * Query all sites and corresponding practicums
         *
         * Build array to be returned to map.blade.php
         */
        
        $mapsites = Site::all();
        $sites = Site::all();
        $siteprac = [];
        
       foreach ($sites as $site) {
            $practicums = Practicum::all()->where('site_id', $site->id);
            $siteprac[] = array('site' => $site, 'practicums' => $practicums);
        }
        
        //$sitescollection = collect($siteprac);
        //$sitepracs = $sitescollection->forPage(1, 15);
        
        $cityquery = new Select2Filters\CityFilter; 
        $cities = $cityquery->getCities();
        
        /*
         * Get all states (no dups) for filtering
         */
        
        $statequery = new Select2Filters\StateFilter; 
        $states = $statequery->getStates();
        
        /*
         * Get all countries (no dups) for filtering
         */
        
        $countryquery = new Select2Filters\CountryFilter; 
        $countries = $countryquery->getCountries();
       
       
       /*if (Request::ajax()) {
            return Response::json(View::make('siteprac', array('siteprac' => $siteprac, 'site' => $sites))->render());
        }*/ 
       
       // $practicums = Practicum::paginate(15);
        
       return view('map', array(
            'sites' => $mapsites,
            'site' => $sites,
            'siteprac' => $siteprac,
            'cities' => $cities,
            'states' => $states,
            'countries' => $countries
            ));
    }

   
            
}
