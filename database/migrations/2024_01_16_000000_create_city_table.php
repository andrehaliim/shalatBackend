<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('city', function (Blueprint $table) {
            // Table engine
            $table->engine = 'InnoDB';
                        
            $table->increments('id')->unsigned()->nullable(false);
            $table->string('nama')->nullable(false)->default('');

            // dates
            $table->dateTime('created_at')->nullable(false);
            $table->string('created_by', 100)->nullable(false)->default('');
            $table->dateTime('updated_at')->nullable(false);
            $table->string('updated_by', 100)->nullable(false)->default('');

            // index
            $table->index('nama');
            $table->index('created_at');
            $table->index('created_by');
            $table->index('updated_at');
            $table->index('updated_by');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('city');
    }
}
