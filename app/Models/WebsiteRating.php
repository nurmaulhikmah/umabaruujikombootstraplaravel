<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteRating extends Model
{
    protected $fillable = ['nama', 'rating', 'saran'];
}