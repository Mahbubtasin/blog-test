<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Trebol\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    //
    protected $fillable = [
        'name', 'display_name', 'description'
    ];
}
