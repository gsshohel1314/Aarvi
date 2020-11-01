<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->bigIncrements('partner_id');
            $table->string('partner_type');
            $table->string('partner_name',50)->unique();
            $table->string('partner_url');
            $table->string('partner_logo',50);
            $table->text('partner_address');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('payment_condition');
            $table->text('payment_comment')->nullable();
            $table->string('payment_date')->nullable();
            $table->string('partner_slug',30)->unique();
            $table->integer('partner_publish')->default(1);
            $table->integer('partner_status')->default(1);
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
        Schema::dropIfExists('partners');
    }
}
