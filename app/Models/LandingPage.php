<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingPage extends Model
{
    use HasFactory;

    protected $fillable = ['path', 'target'];

    protected $casts = [
        'target' => 'array'
    ];

    public function getTargetCountry()
    {
        return $this->target['target_country'] ?? null;
    }

    public function getTargetUrl()
    {
        return $this->target['target_url'] ?? null;
    }

}
