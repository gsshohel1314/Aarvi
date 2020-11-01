<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAwardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('awards', function (Blueprint $table) {
            $table->bigIncrements('award_id');
            $table->string('award_title',190)->nullable();
            $table->text('award_subtitle')->nullable();
            $table->date('award_reg_starting')->nullable();
            $table->date('award_reg_ending')->nullable();
            $table->text('award_details')->nullable();
            $table->string('award_image',50)->nullable();
            $table->string('award_slug',150)->nullable();
            $table->integer('award_status')->default(1);
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
        Schema::dropIfExists('awards');
    }
}
