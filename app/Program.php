<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends BaseModel
{
    
    
    protected $table = 'programs';
    protected $fillable = array('id','department', 'program', 'program_pretty', 'program_url' );

}
