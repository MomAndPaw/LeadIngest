<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class api_token extends Model
{
    use HasFactory;
    protected $table = 'api_token';

    protected $guarded = ['id'];

}
