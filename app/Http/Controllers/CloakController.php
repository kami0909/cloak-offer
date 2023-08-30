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
        
        $path = request()->path();
        $landingPage = LandingPage::where('path', $path)->first();
        if ($landingPage) {
            $target = $landingPage->target;

            if (isset($target[$country])) {
                $targetUrl = $target[$country];
                return redirect()->away($targetUrl);
            }
        }
        return redirect()->away('https://magidbox.com/collections/all');
    }


    public function payment()
    {

    }
}
