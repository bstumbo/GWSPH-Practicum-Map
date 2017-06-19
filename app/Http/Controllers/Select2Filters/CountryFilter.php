<?php

namespace App\Http\Controllers\Select2Filters;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Site;


class CountryFilter extends Controller
{
    /*
     * Get all site Countries avaliable in database (Site object) to be use as Select2 filter in search
     *
     * Return only unique Countries values (no duplicates)
     */
    
    public function getCountries() {
        $collectcountries = [];
        
        $sites = Site::all();
        foreach($sites as $site){
            $collectcountries[] = $site->country;
        }
        
        $countries = array_unique($collectcountries);
        sort($countries);
        
        return $countries;
        
    }
}