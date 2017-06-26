<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;
use App\Site;
use App\Practicum;


class SiteSearch extends Controller
{
    public static function apply(Request $filters, Practicum $practicum, Site $site)
    {
        $sites = [];
        $siteprac = [];
        $practicumarray = [];
        
        $practicum = $practicum->newQuery();
        $site = $site->newQuery();
        
        
        /*
         * Filter practicums by department 
         */
        
         if ($filters->department !== "null") {
            $practicum->where('department', $filters->input('department'))->get();
        }
        
        /*
         * Filterm practicums by term
         */
        
        if ($filters->term !== "null") {
            $practicum->where('term', $filters->input('term'))->get();
        }
        
         
        /*
         * Fitler practicum by city
         */
        
        if ($filters->city !== "null") {
            
            $subset =  $site->where('city', $filters->input('city'))->get();
           
            foreach ($subset as $set) {
                    $practicumarray[] = $set->id;
                }
            
            $practicum->whereIn('site_id', $practicumarray);
        }
        
         /*
         * Fitler practicum by State
         */
         
         if ($filters->state !== "null") {
            $subset =  $site->where('state', $filters->input('state'))->get();
           
            foreach ($subset as $set) {
                         $practicumarray[] = $set->id;
                    }
            
            $practicum->whereIn('site_id', $practicumarray);
        }
        
         /*
         * Fitler practicum by Country
         */
         
         if ($filters->country !== "null") {
            $subset =  $site->where('country', $filters->input('country'))->get();
              
                foreach ($subset as $set) {
                         $practicumarray[] = $set->id;
                    }
            
                $practicum->whereIn('site_id', $practicumarray);
                
        }
        
        $practicums = $practicum->get();
        
          

        foreach ($practicums as $practicum){
            $site = Site::find($practicum['site_id']);
            $sites[] = $site;
            
        }
        
         /*
          * Remove duplicate sites
          */
         
        $finalsites = array_unique($sites);
        
        
        foreach ($finalsites as $site) {
            $practicum = $practicums->where('site_id', $site->id);
            $siteprac[] = array('site' => $site, 'practicums' => $practicum);
        }
        
        $mapsites = array_values($finalsites); //Reindex for map json
    

        return Response::json(['siteprac' => $siteprac, 'sites' => $mapsites]);
    
        
    }
}