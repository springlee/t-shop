<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $filled = ['p_id', 'name', 'short', 'x', 'y', 'depth'];
}
