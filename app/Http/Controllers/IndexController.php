<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends GuzzlController
{
    public function index()
    {
        $aData = $this->getAPIResponse('GET');
        if(!$oData instanceof \stdClasss){
        	return view('index.view',['offers'=>$aData->offers]);
        }
    }
}
