<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplyAwardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apply_awards', function (Blueprint $table) {
            $table->bigIncrements('aa_id');
            $table->string('aa_name',50)->nullable();
            $table->string('aa_phone',20)->nullable();
            $table->string('aa_email',40)->nullable();
            $table->string('aa_address',190)->nullable();
            $table->text('aa_message')->nullable();
            $table->integer('award_id');
            $table->string('aa_slug',50);
            $table->integer('aa_status')->default(1);
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
        Schema::dropIfExists('apply_awards');
    }
}
