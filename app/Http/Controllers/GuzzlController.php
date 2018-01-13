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

	        $this->response = $client->request($sRequestType,$this->sDomain . $this->sService . $this->sDefultParameters);
	        //$jsonResponse = json_decode($this->response->getBody());
	        dd(array('done',$this->response));
    	}catch(Exception $e){
    		$jsonResponse =  new stdClass();
    	}
dd('error');
    	return $jsonResponse;
    }

}
