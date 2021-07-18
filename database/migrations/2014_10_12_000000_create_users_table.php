<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('lastname');
            $table->string('firstname');
            $table->string('date_de_naissance')->nullable();
            $table->string('address')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('city')->nullable();
            $table->string('canton')->nullable();
            $table->string('country')->default('Suisse');
            $table->string('telephone_mobile')->nullable();
            $table->string('telephone_professionnel')->nullable();
            $table->string('telephone_prive')->nullable();
            $table->string('telephone_fixe')->nullable();
            $table->string('website')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->text('profile_photo_path')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('tenant_id')->nullable();
            $table->unsignedBigInteger('role_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
