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
            $table->string('End Entity Profile'); // End Entity Profile muon dung
            $table->string('username'); // ten nguoi dang ky
            $table->string('password'); // password cho ENd Entity
            $table->string('email')->unique();
            $table->string('Common name')->nullable(); // CN:  ten co quan
            $table->string('Organization')->nullable(); // O
            $table->string('Country')->nullable(); // C
            $table->string('Locality')->nullable(); // L
            $table->string('Province')->nullable(); // SP: tinh
            $table->string('Certificate Profile'); // certificate profile đã đăng ký
            $table->string('CA'); // Ten to chuc cấp chứng chỉ
            $table->string('token');
            $table->integer('days_to_return');
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
