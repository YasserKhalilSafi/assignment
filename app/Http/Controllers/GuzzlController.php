<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

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
	        $this->oResponse = $client->request($sRequestType,$this->sDomain.$this->sService.$this->sDefultParameters);
	        $jsonResponse = \GuzzleHttp\json_decode($this->oResponse->getBody());
    	}catch(\Exception $e){
    		$jsonResponse =  array();
    	}
    	return $jsonResponse;
    }
}
