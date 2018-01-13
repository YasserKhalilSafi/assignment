<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class GuzzlController extends Controller
{

	private $sDomain = 'https://offersvc.expedia.com/';
    private $sService = 'offers/v2/getOffers';
    private $sDefultParameters = '?scenario=deal-finder&page=foo&uid=foo&productType=Hotel';
    private $oResponse = null;
    private $sParams = 's';
    private $aReturnResponse = array();

    public function getAPIResponse($sRequestType,$sSearchParams = ''){

    	try{

    		$this->sParams = $this->sDomain.$this->sService.$this->sDefultParameters;

    		if(!empty($sSearchParams)){
				$sSearch_params;
				$this->sParams = $this->sParams . '&' . $sSearchParams;
    		}

			$client = new Client([
				'header' =>['content_type'=>'application/json','Accept'=>'application/json'],
			]);

	        $this->oResponse = $client->request($sRequestType,$this->sParams);
	        $aReturnResponse = \GuzzleHttp\json_decode($this->oResponse->getBody());

    	}catch(\Exception $e){
    		$aReturnResponse =  array();
    	}

    	return $aReturnResponse;
    }
}
