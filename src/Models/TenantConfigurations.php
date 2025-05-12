<?php

namespace TomatoPHP\FilamentTenancy\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;

class TenantConfigurations extends Model
{

    protected $fillable = [
        'config_name',
        'config_value',
    ];

    
}
