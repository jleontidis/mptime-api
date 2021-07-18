<?php

namespace Database\Seeders;

use App\Models\Badge;
use App\Models\Pointage;
use App\Models\Role;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      Role::factory()->is_super_admin()->create();
      Role::factory()->is_admin()->create();
      Role::factory()->is_editor()->create();

      Tenant::factory()->is_mathspartner()->create();
      Tenant::factory()->is_commune()->create();
      Tenant::factory()->is_creche()->create();
      
      User::factory()->is_super_admin()->create(['tenant_id'=> null]);
      User::factory()->is_gregoire()->create(['tenant_id'=> 1]);
      User::factory()->is_jerome()->create(['tenant_id'=> 1]);
      User::factory()->is_stephane()->create(['tenant_id'=> 1]);
      User::factory()->is_emilie()->create(['tenant_id'=> 1]);
      User::factory()->is_aurelie()->create(['tenant_id'=> 1]);
      User::factory()->is_sandy()->create(['tenant_id'=> 1]);
      User::factory()->is_tiago()->create(['tenant_id'=> 1]);

      User::factory()->is_commune_admin()->create(['tenant_id'=> 2]);
      User::factory()->is_commune_user()->create(['tenant_id'=> 2]);

      User::factory()->is_creche_admin()->create(['tenant_id'=> 3]);
      User::factory()->is_creche_user()->create(['tenant_id'=> 3]);

      Badge::factory()->is_badge_GA()->create();
      Badge::factory()->is_badge_BS()->create();
      Badge::factory()->is_badge_AF()->create();
      Badge::factory()->is_badge_EB()->create();
      Badge::factory()->is_badge_TD()->create();
      Badge::factory()->is_badge_JL()->create();
      Badge::factory()->is_badge_SB()->create();


      
      Pointage::factory()->count(100)->create(['tenant_id' => 1, 'user_id'=> 2, 'badge_id'=> 10002]);
      Pointage::factory()->count(100)->create(['tenant_id' => 1, 'user_id'=> 3, 'badge_id'=> 10003]);
      Pointage::factory()->count(100)->create(['tenant_id' => 1, 'user_id'=> 4, 'badge_id'=> 10004]);
      Pointage::factory()->count(100)->create(['tenant_id' => 1, 'user_id'=> 5, 'badge_id'=> 10005]);
      Pointage::factory()->count(100)->create(['tenant_id' => 1, 'user_id'=> 6, 'badge_id'=> 10006]);
      Pointage::factory()->count(100)->create(['tenant_id' => 1, 'user_id'=> 8, 'badge_id'=> 10008]);

      Pointage::factory()->count(100)->create(['tenant_id' => 2, 'user_id'=> 10, 'badge_id'=> 10010]);
      Pointage::factory()->count(100)->create(['tenant_id' => 3, 'user_id'=> 12, 'badge_id'=> 10012]);

      // Pointage::factory()->count(40)->create(['tenant_id' => 2]);
      
      // Pointage::factory()->count(60)->create(['tenant_id' => 3]);

    }
}
