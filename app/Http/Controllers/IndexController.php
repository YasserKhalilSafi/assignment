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
        	dd('render 404 page');
        }
    }

    public function find(Request $request)
    {
        $aRequestParams = array(
            'destinationName'   => $request->input('destinationName'),
            'regionIds'  		=> $request->input('regionIds'),
            'minTripStartDate'	=> $request->input('minTripStartDate'),
            'maxTripStartDate'	=> $request->input('maxTripStartDate'),
            'lengthOfStay'	=> $request->input('lengthOfStay'),
            'minGuestRating'	=> $request->input('minGuestRating'),
            'maxGuestRating'	=> $request->input('maxGuestRating'),
        );

        $this->aSearchParams = http_build_query($aRequestParams);

        $aData = $this->getAPIResponse('GET',$this->aSearchParams);
        if(!empty($aData) && isset($aData->offers)){
        	return view('index.view',['offers'=>$aData->offers]);
        }else{
        	dd('render 404 page');
        }
    }

}
