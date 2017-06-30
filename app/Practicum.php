<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Practicum extends BaseModel
{
    protected $primaryKey = 'prac_id';
    protected $foreignKey = 'site_id';
    
    //Practicum id's pulled from Symplicity and are not auto-incrementing
    
    public $incrementing = false;
    protected $table = 'practicums';
    protected $fillable = array('prac_id','title', 'term', 'description', 'department', 'site_id', 'major', 'program_link' );

}
