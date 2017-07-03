<?php

namespace App\Http\Controllers\Admin\AdminSearch;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Select2Filters\CityFilter;
use App\Http\Controllers\Select2Filters\StateFilter;
use App\Http\Controllers\Select2Filters\CountryFilter;
use Response;
use App\Site;


class SiteSearch extends Controller
{
    public static function apply(Request $filters, Site $site)
    {
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
        
        
        $site = $site->newQuery();
        
        /*
         * Fitler Site by city
         */
        
    
        if ($filters->city_filter !== "null") {
            
            $site->where('city', $filters->input('city_filter'))->get();
           
        }
        

        
         /*
         * Fitler Site by State
         */
         
         if ($filters->state_filter !== "null") {
            
            $site->where('state', $filters->input('state_filter'))->get();
    
        }
        
         /*
         * Fitler practicum by Country
         */
         
         if ($filters->country_filter !== "null") {
             
             $site->where('country', $filters->input('country_filter'))->get();
                    
                
        }
        
        $sites = $site->paginate(20);
        

        return view('sites', array('sites' => $sites, 'cities' => $cities, 'states' => $states, 'countries' => $countries));
        
    }
}