<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends GuzzlController
{
	private $aSearchParams = '';

    public function index()
    {
        $aData = $this->getAPIResponse('GET');
        if(!empty($aData) && isset($aData->offers)){
        	return view('index.view',['offers'=>$aData->offers]);
        }else{
        	return view('index.view',['offers'=>null]);
        }
    }

    public function find(Request $request)
    {
        $aRequestParams = array(
            'destinationName'   => $request->input('destinationName'),
            'regionIds'  		=> $request->input('regionIds'),
            'lengthOfStay'		=> $request->input('lengthOfStay'),
            'minGuestRating'	=> $request->input('minGuestRating'),
            'maxGuestRating'	=> $request->input('maxGuestRating'),
        );

        if(!empty($request->input('minTripStart'))){
            $aRequestParams['minTripStartDate'] = ':' . $request->input('minTripStart');
        }

        if(!empty($request->input('maxTripStart'))){
            $aRequestParams['maxTripStartDate'] = ':' . $request->input('maxTripStart');
        }

        $this->aSearchParams = urldecode(http_build_query($aRequestParams));

        $aData = $this->getAPIResponse('GET',$this->aSearchParams);
        if(!empty($aData) && isset($aData->offers)){
        	return view('index.view',['offers'=>$aData->offers,'search'=>true]);
        }else{
        	return view('index.view',['offers'=>null]);
        }
    }

}
