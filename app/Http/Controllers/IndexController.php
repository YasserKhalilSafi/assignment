<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends GuzzlController
{
    public function index()
    {
        $aData = $this->getAPIResponse('GET');
        if(!empty($aData)){
        	return view('index.view',['offers'=>$aData->offers]);
        }else{
        	dd('render 404 page');
        }
    }
}
