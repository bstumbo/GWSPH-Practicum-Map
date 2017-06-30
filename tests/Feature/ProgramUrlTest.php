<?php

namespace App\Http\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Program;

class ProgramUrlTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }
    
    public function testProgramUrl() {
        
        $major = 'Public Health';
        
        $urlquery = new Programs\ProgramSearch;
        
        $url = $urlquery->getProgramUrl($major);
        
        print_r($url);
        
    }
    
    
}
