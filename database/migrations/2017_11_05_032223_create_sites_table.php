<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSitesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',25);
            $table->string('slug',25);
            $table->string('mysql_password',30);
            $table->string('local_url');
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['name', 'deleted_at']);
            $table->unique(['slug', 'deleted_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sites');
    }
}