<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id'); // ->unique() not necessary
            $table->string('name');
            $table->string('last_name');
            $table->string('password');
            $table->string('email',128)->unique();
            $table->string('URL')->nullable();
            $table->rememberToken();
            $table->timestamps();
            //

        });
        Schema::create('podcasts', function(Blueprint $table){
            $table->bigIncrements('podcast_id'); // ->unique();
            $table->foreignId('user_id')->constrained();
            $table->string('title');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('name');
            $table->dropColumn('last_name');
            $table->dropColumn('password');
            $table->dropColumn('email');
            $table->dropColumn('remember_token');
            $table->dropTimestamps();
            //
        });
        Schema::table('podcasts', function(Blueprint $table){
            $table->dropColumn('post_id');
            $table->dropForeign('user_id');
            $table->dropColumn('title');
            $table->dropColumn('description');
            $table->droptimestamps();
        });
    }
};

