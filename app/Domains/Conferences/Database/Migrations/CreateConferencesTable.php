<?php

namespace Confee\Domains\Conferences\Database\Migrations;

use Confee\Support\Database\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConferencesTable extends Migration
{
    function up()
    {
        $this->schema->create('conferences', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('responsible_id');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    function down()
    {
        $this->schema->drop('conferences');
    }

}