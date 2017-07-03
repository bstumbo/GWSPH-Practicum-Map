<?php

namespace App\Http\Controllers\Select2Filters;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Site;
use App\Program;



class ProgramFilter extends Controller
{
    /*
     * Return all programs for filtering
     */
    
    public function getPrograms() {
        $collectprograms = [];
        
        $programs = Program::all();
        foreach($programs as $program){
            $collectprograms[] = $program->program;
        }
        
        sort($collectprograms);
        
        return $collectprograms;
        
    }
}