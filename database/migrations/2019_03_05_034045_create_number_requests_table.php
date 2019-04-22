<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNumberRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('number_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->longText('request_of_user');
            // $table->string('username'); // ten nguoi dang ky
            // $table->longText('password'); // password cho ENd Entity
            // $table->string('email');
            // $table->string('common_name')->nullable(); // CN:  ten co quan
            // $table->string('organization')->nullable(); // O
            // $table->string('country')->nullable(); // C
            // $table->string('locality')->nullable(); // L
            // $table->string('province')->nullable(); // SP: tinh
            $table->integer('status');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropForeign([
                'user_id',
        ]);
        Schema::dropIfExists('number_requests');
    }
}
