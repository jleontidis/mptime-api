<?php

namespace App\Models;

use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    use HasFactory, BelongsToTenant;
    
    const STATUSES = [['id'=> 1, 'label' => 'Actif'], ['id'=> 0, 'label'=> 'Désactivé']];

    protected $primaryKey = 'badge_id';

    public function user() {
      return $this->belongsTo(User::class);
    }

}
