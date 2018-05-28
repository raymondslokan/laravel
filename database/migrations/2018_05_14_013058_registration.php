<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Registration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function (Blueprint $table) {
          $table->renameColumn('name', 'fname');
          $table->string('lname',100)->after('name');
          $table->string('username',100)->after('email');
          $table->string('type',100)->nullable()->after('email');
          $table->string('status',100)->nullable()->after('email');
          $table->integer('loginAttempts')->after('email')->default(0);
          $table->integer('loginAttemptTimeout')->after('email')->default(0);
          $table->string('passwordRecoveryKey',100)->nullable()->after('email');
          $table->integer('passwordRecoveryTimeout')->after('email')->default(0);
          $table->integer('referralId')->after('email')->default(0);
          $table->string('timezone',100)->after('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
