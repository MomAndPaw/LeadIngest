<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Lead extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string("parent_phone")->default("");
            $table->string("pet_name")->default("");
            $table->string("pet_age")->default("");
            $table->string("pet_weight")->default("");
            $table->string("pet_activity")->default("");
            $table->string("pet_body_type")->default("");
            $table->string("per_breed")->default("");
            $table->string("pet_genus")->default("dog");
            $table->string("parent_name")->default("");
            $table->string("parent_email")->default("");
            $table->string("parent_state")->default("");
            $table->string("lead_source")->default("");
            $table->string("sync_with_crm")->default("");
            $table->string("lead_referrer")->default("");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leads');
    }
}
