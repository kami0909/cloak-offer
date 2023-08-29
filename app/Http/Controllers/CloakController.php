<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CloakController extends Controller
{

    public function landing()
    {
        $country = request()->header('CF-IPCountry');
        $country = strtolower($country);
        if ($country === 'vn') {
            return redirect()->away('https://dneybay.com/products/winter-long-plush-pet-cat-bed-round-cat-cushion-cat-house-2-in-1-warm-cat-basket-cat-sleep-bag-cat-nest-kennel-for-small-dog-cat');
        }

        return redirect()->away('https://magidbox.com/products/winter-long-plush-pet-cat-bed-round-cat-cushion-cat-house-2-in-1-warm-cat-basket-cat-sleep-bag-cat-nest-kennel-for-small-dog-cat');
    }

    public function payment()
    {

    }
}
