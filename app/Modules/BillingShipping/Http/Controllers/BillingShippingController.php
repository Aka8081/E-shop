<?php

namespace App\Modules\BillingShipping\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BillingShippingController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        return view("BillingShipping::welcome");
    }
}
