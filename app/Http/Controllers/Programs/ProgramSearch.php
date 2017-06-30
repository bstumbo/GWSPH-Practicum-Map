<?php

namespace App\Http\Controllers\Programs;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Program;


class ProgramSearch extends Controller
{
    public function getProgramUrl($major)
    {
        $program = Program::where('program', $major)->first();
    
        $url = $program->program_url;
        
        return $url;
    
    }
}