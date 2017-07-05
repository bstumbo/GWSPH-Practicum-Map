<?php

namespace App\Http\Controllers\Admin\AdminSearch;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Select2Filters\ProgramFilter;
use Response;
use App\Practicum;


class PracticumSearch extends Controller
{
    public static function apply(Request $filters, Practicum $practicum)
    {
          /*Program Filters */
        
        $programquery = new ProgramFilter; 
        $programs = $programquery->getPrograms();
        
       
        
        $practicum = $practicum->newQuery();
        
        
        /*
         * Filter by prac_id
         */
        
          if ($filters->practicum_id_filter){
            
            $practicum->where('prac_id', 'LIKE', '%'.$filters->practicum_id_filter.'%')->get();
        }
                
        /*
         * Filter by Title
         */
        
        if ($filters->practicum_plan_filter){
            
            $practicum->where('title', 'LIKE', '%'.$filters->practicum_plan_filter.'%')->get();
        }
        
        /*
         * Fitler Practicum by Program
         */
        
        if ($filters->program_filter !== "null") {
            
            $practicum->where('major', $filters->input('program_filter'))->get();
           
        }
        
         /*
         * Fitler Practicum by Department
         */
         
         if ($filters->department_filter !== "null") {
            
            $practicum->where('department', $filters->input('department_filter'))->get();
    
        }
        
        
        $practicums = $practicum->paginate(20);
        

        return view('practicums', array('practicums' => $practicums, 'programs' => $programs));
        
    }
}