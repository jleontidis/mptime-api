<?php

namespace App\Models;

use App\Traits\BelongsToTenant;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use BelongsToTenant;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'lastname',
        'firstname',
        'email',
        'password',
        'tenant_id',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    public function getLabelAttribute() {
      return $this->lastname . ' ' . $this->firstname;
    }

    public function getFullNameAttribute() {
      return $this->firstname . ' ' . $this->lastname;  
    }

    public function getLatestTimestampAttribute() {
      return $this->pointages()->get()->first();
    }

    public function badge() {
      return $this->hasOne(Badge::class);
    }

    public function pointages() {
      return $this->hasMany(Pointage::class)->orderBy('pointage', 'desc');
    }

    public function getPointages($badge_id) {
      $pointages = Pointage::where('badge_id', $badge_id)->get();
      return $pointages;
    }

    public function role() {
      return $this->belongsTo(Role::class);
    }

    public function hasRole($role) {
        if ($this->role->slug === $role) {
          return true;
        }

        return false;
    }
}