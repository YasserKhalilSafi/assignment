<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;


class GuzzlController extends Controller
{

	private $sDomain = 'https://offersvc.expedia.com/';
    private $sService = 'offers/v2/getOffers';
    private $sDefultParameters = '?scenario=deal-finder&page=foo&uid=foo&productType=Hotel';
    private $sSearchParams = '';
    private $oResponse = null;

    public function getAPIResponse($sRequestType){

    	try{
			$client = new Client([
				'header' =>['content_type'=>'application/json','Accept'=>'application/json'],
			]);

	        $this->response = $client->request($sRequestType,$this->sDomain . $this->sService . $this->sDefultParameters);
	        $jsonResponse = json_decode($this->response->getBody());

	        dd($this->response );
    	}catch(Exception $e){
    		$jsonResponse =  new stdClass();
    	}

    	return $jsonResponse;
    }

}
