<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends BaseModel
{
    protected $primaryKey = 'id';
    protected $table = 'sites';
    
    public $incrementing = false;
    protected $fillable = array('id','org_name', 'address', 'city', 'state', 'zip', 'country', 'practicum_number', 'latitude', 'longitude');


}
