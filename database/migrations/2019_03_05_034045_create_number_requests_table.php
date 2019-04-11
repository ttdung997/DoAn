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
            $table->string('end_entity_profile'); // End Entity Profile muon dung
            $table->string('username'); // ten nguoi dang ky
            $table->string('password'); // password cho ENd Entity
            $table->string('email');
            $table->string('common_name')->nullable(); // CN:  ten co quan
            $table->string('organization')->nullable(); // O
            $table->string('country')->nullable(); // C
            $table->string('locality')->nullable(); // L
            $table->string('province')->nullable(); // SP: tinh
            $table->string('certificate_profile'); // certificate profile đã đăng ký
            $table->string('CA')->nullable(); // Ten to chuc cấp chứng chỉ
            $table->unsignedBigInteger('token_id');
            $table->date('days_to_return');
            $table->integer('status');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('token_id')->references('id')->on('tokens')->onDelete('cascade');
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
