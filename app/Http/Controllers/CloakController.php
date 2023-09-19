<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LandingPage;

class CloakController extends Controller
{

    public function landing()
    {
        $country = strtolower(request()->header('CF-IPCountry'));
        $path = request()->path();
        $landingPage = LandingPage::where('path', $path)->first();

        if ($landingPage) {
            if ($country === 'vn') {
                if ($landingPage->redirect_url) {
                    return redirect()->away($landingPage->redirect_url);
                }
                return redirect()->away('https://figurcare.com/collections/all');
            }

            if ($landingPage->target_url) {
                return redirect()->away($landingPage->target_url);
            }
        }
        return redirect()->away('https://youtube.com');
    }


    public function payment()
    {

    }

    public function index()
    {
        return redirect()->away('https://figurcare.com/collections/all');
    }
}
