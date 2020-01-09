<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;


class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('customer', function (Blueprint $table) {
            $table->bigIncrements('id', true);
            $table->string('firstname');
            $table->string('lastname')->nullable();
            $table->string('email');
            $table->bigInteger('cc')->nullable();
            $table->date('dob')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->timestamp('created') ->useCurrent();
            $table->string('register_by')->default('user');
            $table->timestamp('modified') ->useCurrent();
            $table->string('modified_by')->default('user');
            $table->boolean('record_deleted')->default(0);
        });

        // DB::connection('mysql')->table('customer')->insert([
        //     [
        //         'firstname' => 'Atnhony',
        //         'lastname' => 'Henriquez',
        //         'email' => 'ajhen217@gmail.com',
        //         'register_by' => 1
        //     ],
        //     [
        //         'firstname' => 'maria',
        //         'lastname' => 'del barrio',
        //         'email' => 'mari@gmail.com',
        //         'register_by' => 1
        //     ],
        //     [
        //         'firstname' => 'vannesa',
        //         'lastname' => '',
        //         'email' => 'vanessa@gmail.com',
        //         'register_by' => 1
        //     ],

        // ]);
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
