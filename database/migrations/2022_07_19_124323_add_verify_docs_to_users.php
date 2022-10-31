<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVerifyDocsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->integer('verify_docs_status')->default(0)->after('status');
        });

        Schema::create('kyc_request', function (Blueprint $table) {

            $table->id();

            $table->integer('user_id')->nullable();

            $table->string('document_name', '255')->nullable();
            $table->string('document_fields', '4095')->nullable();
            $table->string('files', '4095')->nullable();

            $table->integer('status')->default(0);

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
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
