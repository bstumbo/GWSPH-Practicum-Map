<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Site;
use App\Practicum;
use Geocoder\Laravel\Facades\Geocoder;
use Validator;


class JSONUploader extends Controller
{
    var $site;
    var $practicum;
    
    public function __construct() {
        $this->site = Site::all(array('org_name', 'address','city', 'state', 'zip', 'country'));
        $this->practicum = Practicum::all(array('title'));
    }
    
    public function index() {
        return view('uploader');
    }
    
    public function validateSite($data) {
        
        $validator = Validator::make($data, [
          'id' => 'required',
          'address' => 'required',
          'city' => 'required',
          'zip' => 'min:5',
          'prac_id' => 'required',
          'title' => 'required|max:255',
          'department' =>'required'
        ]);    
        
        if ($validator->fails()) {
            return "false";
        } else {
            return "true";
        }
    }
    
    public function uploadJSON() {
         
    /* Get the contents of the uploaded JSON file */
        
        $jsondata = file_get_contents('new_report.json');
         
    /* Convert data to associative array */     
         
        $entry = json_decode($jsondata, true);
        
    /* Check to see if Site or Practicum exists in the database
     * If it does, override current data with new data
     */
        
        $dud = [];    
    
       foreach ($entry as $data) {
        
        if (Site::find($data['id']) !== null) {
                $newSite = Site::find($data['id']);
            }else {
                $newSite = new Site;
            }
            
            if (Practicum::find($data['prac_id']) !== null) {
                $newPracticum = Practicum::find($data['prac_id']);
            } else {
                $newPracticum = new Practicum;
            }
        
        $validate = $this->validateSite($data);
       
        if ($validate == "true") {
        
            
        /* Assign json values to DB values */
         try { 
        
            $newSite->id = $data['id'];
            $newSite->org_name = $data['org_name'];
            $newSite->address = $data['address'];
            $newSite->city = $data['city'];
            $newSite->state = $data['state'];
            $newSite->zip = $data['zip'];
            $newSite->country = $data['country'];
            //$newSite->practicum_number= $data['practicum_number'];
            $address = $data['address'] . ", " . $data['city'] . ", " . $data['state'] . " " . $data['zip'];
            $coordinates = app('geocoder')->geocode($address)->get()->first()->getCoordinates();
            $newSite->latitude = $coordinates->getLatitude();
            $newSite->longitude = $coordinates->getLongitude();
            $newSite->save();
                     
            $newPracticum->id = $data['prac_id'];
            $newPracticum->title = $data['title'];
            $newPracticum->term = $data['term'];
            $newPracticum->department = $data['department'];
            //$newPracticum->description = $data['Practicum']['description'];
            $newPracticum->site_id = $data['id'];
            $newPracticum->save();
            
           } catch (\Exception $e) {
                echo "Something went wrong with" . " " . "Practicum: " . $newPracticum->id . " " . "Site: " . $newSite->org_name . "<br>";
           }
        } else {
            $dud[] = $data;
        }
        
       } 
        
         
         return view('uploaded', array('newSite' => $newSite, 'newPracticum' => $newPracticum, 'dud' => $dud));
         
    }
}
