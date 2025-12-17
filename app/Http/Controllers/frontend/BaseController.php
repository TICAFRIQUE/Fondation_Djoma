<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    //index
    public function index()
    {
        return view('frontend.index');
    }


}
