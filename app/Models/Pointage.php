<?php

namespace App\Models;

use App\Traits\BelongsToTenant;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pointage extends Model
{
    use HasFactory, BelongsToTenant;

    protected $fillable = ['tenant_id', 'badge_id', 'user_id','pointage', 'type'];

    public function user() {
      return $this->belongsTo(User::class);
    }

    public function getPointageTimeAttribute() {
      return Carbon::parse($this->pointage)->locale('fr_FR')->isoFormat('kk:mm:ss');
    }

    public function getPointageDateAttribute() {
      return Carbon::parse($this->pointage)->locale('fr_FR')->isoFormat('Do MMMM YYYY');
    }
}
