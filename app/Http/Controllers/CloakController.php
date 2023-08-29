<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CloakController extends Controller
{

    public function landing()
    {
        $country = request()->header('CF-IPCountry');

        if ($country === 'VN') {
            return redirect()->away('https://example.vn');
        } elseif ($country === 'US') {
            return redirect()->away('https://example.us');
        }

        // Xử lý cho các quốc gia khác

        return redirect()->away('https://google.com');
    }

    public function payment()
    {
        $country = request()->header('CF-IPCountry');

        if ($country === 'VN') {
            return redirect()->away('https://payment-vn.com');
        } elseif ($country === 'US') {
            return redirect()->away('https://payment-us.com');
        }

        // Xử lý cho các quốc gia khác

        return redirect()->away('https://google.com');
    }
}
