<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// include guzzle in the controller. 
use GuzzleHttp\Client;

class GuzzleController extends Controller
{
    public function getRemoteData() {
    	$client = new Client([
    		'headers' => ['content-type' => 'application/json', 'Accept' => 'application/json'],
    	]);
    	
    }
}
