<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWifisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wifis', function (Blueprint $table) {
            $table->id();
            $table->char('bssid')->unique()->nullable(false);
            $table->char('essid')->nullable();
            $table->char('psk')->nullable();
            $table->boolean('connect')->default(false);
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
        Schema::dropIfExists('wifis');
    }
}
