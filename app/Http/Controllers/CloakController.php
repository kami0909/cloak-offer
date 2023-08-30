<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LandingPage;

class CloakController extends Controller
{

    public function landing()
    {
        $country = strtolower(request()->header('CF-IPCountry'));
        if ($country === 'vn') {
            return redirect()->away('https://dneybay.com');
        }
        var_dump($country);
        
        
    }


    public function payment()
    {

    }
}
