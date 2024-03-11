<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string("first_name",30)->nullable();
            $table->string("last_name",30)->nullable();
            $table->date("dob");
            $table->string("email_id",30)->unique();
            $table->string("mobile",13);
            $table->char("gender")->comment("[m:male, f:female]");
            $table->text("address");
            $table->string("city");
            $table->integer("pin_code");
            $table->string("state");
            $table->string("country");
            $table->string("hobbies");
            $table->string("courses");
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
        Schema::dropIfExists('students');
    }
};
