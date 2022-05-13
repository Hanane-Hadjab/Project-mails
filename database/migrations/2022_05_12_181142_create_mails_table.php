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
        Schema::create('mails', function (Blueprint $table) {
            $table->id();
            $table->string('object');
            $table->text('content');
            $table->string('send_to');
            $table->integer('send_by');
            $table->integer('deleted_by')->nullable();
            $table->integer('response_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('send_by')->references('id')->on('users')->onDelete('set null');

            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('set null');

            $table->foreign('response_id')->references('id')->on('mails')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mails');
    }
};
