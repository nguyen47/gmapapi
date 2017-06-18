<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoogleMap extends Model
{
	public static function getLongLat($address){

		// Encode dia chi nguoi dung nhap vao.
		$address = urlencode($address);

		// Truyen $address vao url API cua google -> API tra ve dang json.
		$url = "http://maps.google.com/maps/api/geocode/json?address={$address}";

		// Doc file json
		$resp_json = file_get_contents($url);

    	// decode file  json
		$resp = json_decode($resp_json, true);

		// Net ket qua tra ve la OK
		if($resp['status']=='OK'){

        	// Lay ra Lat, Lng va dia chi.
			$lati = $resp['results'][0]['geometry']['location']['lat'];
			$longi = $resp['results'][0]['geometry']['location']['lng'];
			$formatted_address = $resp['results'][0]['formatted_address'];

        	// Kiem tra ca 3 bien $lati, $longi va $formatted_address
			if($lati && $longi && $formatted_address){

            // push vao array
				$data_arr = array();            

				array_push(
					$data_arr, 
					$lati, 
					$longi, 
					$formatted_address
					);
				return $data_arr;

			}else{
				return false;
			}

		}else{
			return false;
		}

	}
}
