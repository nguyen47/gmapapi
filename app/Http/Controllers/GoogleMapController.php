<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GoogleMap;

class GoogleMapController extends Controller
{
	public function getGmap(){
		return view('welcome');
	}

    public function postGmap(Request $request){

    	$address = $request->address;

    	$data = GoogleMap::getLongLat($address);

    	if($data){
         
	        $latitude = $data[0];
	        $longitude = $data[1];
	        $formatted_address = $data[2];
	    }

       return view('ketQua', ['viDo' => $latitude, 'kinhDo' => $longitude, 'diaChi' => $formatted_address]);

    }

    public function getNearestLocation(){
    	return view('findNearestLocation');
    }
}
