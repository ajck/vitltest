<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNamesTable extends Migration
{
	// Run migration:
    public function up()
    {
	Schema::create('names', function (Blueprint $table) {
 		$table->string('firstname', 50)->nullable();
 		$table->string('lastname', 50)->nullable();
		});
    }

	// Reverse migration:
    public function down()
    {
        Schema::dropIfExists('names');
    }
}
