<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Site;
use App\Practicum;
use App\Program;
use Geocoder\Laravel\Facades\Geocoder;
use Validator;


class JSONUploader extends Controller
{
    var $site;
    var $practicum;
    
    public function __construct() {
        //$this->middleware('auth');
        $this->site = Site::all(array('org_name', 'address','city', 'state', 'zip', 'country'));
        $this->practicum = Practicum::all(array('title'));
    }
    
    public function index() {
        return view('uploader');
    }
    
    public function validateUSSite($data) {
        
        $validator = Validator::make($data, [
          'id' => 'required',
          //'address' => 'required',
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
    
    protected function validateOtherSite($data){
        $validator = Validator::make($data, [
          'id' => 'required',
          'address' => 'required',
          'city' => 'required',
          'zip' => 'nullable',
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
    
   protected function siteUSCommit($newSite, $newPracticum, $data) {
            
            $newSite->id = $data['id'];
            $newSite->org_name = $data['org_name'];
            $newSite->address = $data['address'];
            $newSite->city = $data['city'];
            $newSite->state = $data['state'];
            $newSite->zip = $data['zip'];
            $newSite->country = $data['country'];
            $address = $data['address'] . ", " . $data['city'] . ", " . $data['state'] . " " . $data['zip'];
            $coordinates = app('geocoder')->geocode($address)->get()->first()->getCoordinates();
            $newSite->latitude = $coordinates->getLatitude();
            $newSite->longitude = $coordinates->getLongitude();
            $newSite->save();
                     
            $newPracticum->prac_id = $data['prac_id'];
            $newPracticum->title = $data['title'];
            $newPracticum->term = $data['term'];
            $newPracticum->department = $data['department'];
            $newPracticum->major = $data['major'];
        
            /*
             * Lookup program url with major as foreign key
             */
            $urlquery = new Programs\ProgramSearch;
            $test = $data['major'];
            $url = $urlquery->getProgramUrl($test);
            $newPracticum->program_link = $url;
            //$newPracticum->description = $data['Practicum']['description'];
            $newPracticum->site_id = $data['id'];
            $newPracticum->save();

   }
   
   protected function siteOtherCommit($newSite, $newPracticum, $data) {
                
            $newSite->id = $data['id'];
            $newSite->org_name = $data['org_name'];
            $newSite->address = $data['address'];
            $newSite->city = $data['city'];
            $newSite->state = $data['state'];
            $newSite->zip = $data['zip'];
            $newSite->country = $data['country'];
            $address = $data['city'] . ", " . $data['country'];
            $coordinates = app('geocoder')->geocode($address)->get()->first()->getCoordinates();
            $newSite->latitude = $coordinates->getLatitude();
            $newSite->longitude = $coordinates->getLongitude();
            $newSite->save();
                     
            $newPracticum->prac_id = $data['prac_id'];
            $newPracticum->title = $data['title'];
            $newPracticum->term = $data['term'];
            $newPracticum->department = $data['department'];
            $newPracticum->major = $data['major'];
            
            /*
             * Lookup program url with major as foreign key
             */
            $urlquery = new Programs\ProgramSearch;
            $test = $data['major'];
            $url = $urlquery->getProgramUrl($test);
            $newPracticum->program_link = $url;
            //$newPracticum->description = $data['Practicum']['description'];
            $newPracticum->site_id = $data['id'];
            $newPracticum->save();

   }
   
    public function uploadJSON(Request $request) {
         
        $file = $request->file('file');
         
    /* Get the contents of the uploaded JSON file */
        
        $jsondata = file_get_contents($file);
         
    /* Convert data to associative array */     
         
        $entry = json_decode($jsondata, true);
        
    /* Check to see if Site or Practicum exists in the database
     * If it does, override current data with new data
     */
        
        $dud = [];
        $catch = [];
        $urls = [];
        
       foreach ($entry as $data) {
        
        /*
         * If site is already in database, $newSite is that site.  Else create a new Site object
         */
        
        if (Site::find($data['id']) !== null) {
                $newSite = Site::find($data['id']);
            } else {
                $newSite = new Site;
            }
        
        /*
         * If practicum is already in database, $newPracticum is that site.  Else create a new Practicum object
         */
        
            
        if (Practicum::find($data['prac_id']) !== null) {
                $newPracticum = Practicum::find($data['prac_id']);
            } else {
                $newPracticum = new Practicum;
            }
            
       
       if ($data['state'] == 'Non-U.S.'){
        
        $validateOther = $this->validateOtherSite($data);
        
        if ($validateOther == "true") {
            try{
            $this->siteOtherCommit($newSite, $newPracticum, $data);
            } catch (\Exception $e) {
                $catch[] = $data;
            }
       
        } else {
            $dud[] = $data;
        }
        
       } else {
       
        $validateUS = $this->validateUSSite($data);
       
            if ($validateUS == "true") {
                try{
                $this->siteUSCommit($newSite, $newPracticum, $data);
                } catch (\Exception $e) {
                    $catch[] = $data;
                }
            } else {
                $dud[] = $data;
            }
        
        }
        
       
       }
        
         
         return view('uploaded', array('newSite' => $newSite, 'newPracticum' => $newPracticum, 'dud' => $dud, 'catches' => $catch, 'urls' => $urls));
         
    }
}
