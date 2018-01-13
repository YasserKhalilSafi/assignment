<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends GuzzlController
{
    public function index()
    {
        $oData = $this->getAPIResponse('GET');

        if(!$oData instanceof stdClasss){
        	dd('render review');
        }
    }
}
