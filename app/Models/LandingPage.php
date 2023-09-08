<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingPage extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'included_countries', 'excluded_countries', 'target_url', 'redirect_url', 'offer_id', 'source_id'];

    protected $casts =[
        'included_countries' => 'json',
        'excluded_countries' => 'json'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($landingPage) {
            $landingPage->user_id = auth()->id();
        });
    }

}
