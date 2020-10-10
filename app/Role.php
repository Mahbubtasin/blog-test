<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Trebol\Entrust\EntrustRole;

class Role extends EntrustRole
{
    //
    protected $fillable = [
        'name', 'display_name', 'description'
    ];
}
