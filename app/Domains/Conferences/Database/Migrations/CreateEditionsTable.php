<?php

namespace Confee\Domains\Conferences\Database\Migrations;

use Illuminate\Database\Schema\Blueprint;
use Confee\Support\Database\Migration;

class CreateEditionsTable extends Migration
{
    function up()
    {
        $this->schema->create('editions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('conference_id')->index();
            $table->string('name', 255);
            $table->json('venue')->nullable();
            $table->date('start_date');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    function down()
    {
        $this->schema->drop('editions');
    }

}