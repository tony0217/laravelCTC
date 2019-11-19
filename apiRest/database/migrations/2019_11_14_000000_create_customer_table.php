<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;


class CreateCustomerTable extends Migration
{
    /**
     * ejecutar las migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('customer', function (Blueprint $table) {
            $table->bigIncrements('id', true);
            $table->string('name');
            $table->string('lastname');
            $table->string('email');
            $table->text('password');
            $table->bigInteger('phone');
            $table->timestamp('created') ->useCurrent();
            $table->integer('register_by')->unsigned();
            $table->timestamp('modified') ->useCurrent();
            $table->string('modified_by')->default('user');
            $table->boolean('record_deleted')->default(0);
        });

        DB::connection('mysql')->table('customer')->insert([
            [
                'name' => 'Atnhony',
                'lastname' => 'Henriquez',
                'email' => 'ajhen217@gmail.com',
                'password' => encrypt('123456'),
                'phone' => '3122817309',
                'register_by' => 1
            ],
            [
                'name' => 'maria',
                'lastname' => 'del barrio',
                'email' => 'mari@gmail.com',
                'password' => encrypt('1234523446'),
                'phone' => '31244434343',
                'register_by' => 1
            ],
            [
                'name' => 'vannesa',
                'lastname' => 'martinez',
                'email' => 'vanessa@gmail.com',
                'password' => encrypt('3455532'),
                'phone' => '3102022092',
                'register_by' => 1
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('customer');

    }
}
