<?php

namespace App\Traits;

use App\Models\Tenant;
use App\Scopes\TenantScope;
use Illuminate\Support\Facades\Cookie;

trait BelongsToTenant {

  protected static function bootBelongsToTenant() 
  {

    static::addGlobalScope(new TenantScope);

    static::creating(function ($model) {
      if(auth()->user()) {
        $model->tenant_id = auth()->user()->tenant_id;
      }
    });

  }

  public function tenant() {
    return $this->belongsTo(Tenant::class);
  }
}