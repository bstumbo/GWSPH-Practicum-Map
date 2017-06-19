<?php

namespace App\Http\Controllers\Select2Filters;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Site;


class StateFilter extends Controller
{
    /*
     * Get all site states avaliable in database (Site object) to be use as Select2 filter in search
     *
     * Return only unique state values (no duplicates)
     */
    
    public function getStates() {
        $collectstates = [];
        
        $sites = Site::all();
        foreach($sites as $site){
            $collectstates[] = $site->state;
        }
        
        $states = array_unique($collectstates);
        sort($states);
        
        return $states;
        
    }
}