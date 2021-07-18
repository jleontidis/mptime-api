<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;
  
    protected $fillable = ['enterprise'];

    public function employees() {
      return $this->hasMany(User::class);
    }

    public function getTenantAdminAttribute() {
      return $this->employees()->where('role_id', '2')->first();
    }
}
