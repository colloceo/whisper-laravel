<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CrisisResource extends Model
{
    protected $fillable = ['name', 'url', 'phone', 'type', 'is_active'];
}
