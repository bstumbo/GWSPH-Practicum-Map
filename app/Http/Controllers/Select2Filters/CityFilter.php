<?php

namespace App\Http\Controllers\Select2Filters;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Site;



class CityFilter extends Controller
{
    /*
     * Get all site cities avaliable in database (Site object) to be use as Select2 filter in search
     *
     * Return only unique city values (no duplicates)
     */
    
    public function getCities() {
        $collectcities = [];
        
        $sites = Site::all();
        foreach($sites as $site){
            $collectcities[] = $site->city;
        }
        
        $cities = array_unique($collectcities);
        sort($cities);
        
        return $cities;
        
    }
}