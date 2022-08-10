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
        Schema::create('airdrops', function (Blueprint $table) {
            $table->id();
            $table->string('telegram_id')->unique();
            $table->string('telegram_name');
            $table->string('telegram_username');
            $table->string('twitter_username');
            $table->string('discord_username');
            $table->text('bep20_address');
            $table->boolean('airdrop_sent')->default(false);
            $table->string('referral')->unique();
            $table->integer('referral_count')->default(0);
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
        Schema::dropIfExists('airdrops');
    }
};
