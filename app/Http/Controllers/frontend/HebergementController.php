<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HebergementController extends Controller
{
    //hebergement linux
    public function hebergement_linux()
    {
        return view('frontend.hebergements.mutualise.linux.hebergement_linux');
    }

    //hebergement cloud
    public function hebergement_cloud()
    {
        return view('frontend.hebergements.mutualise.cloud.hebergement_cloud');
    }

    // hebergement windows
    public function hebergement_windows()
    {
        return view('frontend.hebergements.mutualise.windows.hebergment_windows');
    }

    // index hebergement mutualise
    public function hebergement_mutualise()
    {
        return view('frontend.hebergements.mutualise.index');
    }

    // commender hebergement
    public function commander_hebergement()
    {
        return view('frontend.hebergements.mutualise.commander');
    }


    public function inscription()
    {
        return view('frontend.hebergements.mutualise.cloud.inscription');
    }

}
