<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Site;
use App\Practicum;


class SiteSearch extends Controller
{
    public static function apply(Request $filters, Practicum $practicum, Site $site)
    {
       $sites = [];
        $siteprac = [];
        
        $practicum = $practicum->newQuery();
        $site = $site->newQuery();
        
        
        /*
         * Fitler practicum by city
         */
        
        if ($filters->has('city')) {
            $subset =  $site->where('city', $filters->input('city'))->get();
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
        
         
         $practicums = $practicum->get();
    
       
        foreach ($practicums as $practicum){
            $site = Site::find($practicum['site_id']);
            $sites[] = $site;
        }
        
        foreach ($sites as $site) {
             $practicum = $practicums->where('site_id', $site->id);
            $siteprac[] = array('site' => $site, 'practicums' => $practicum);
        }
    

        return Response::json(['siteprac' => $siteprac, 'sites' => $sites]);
    }
}