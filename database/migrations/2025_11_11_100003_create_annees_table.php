<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('annees', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // Exemple : Licence 1, Licence 2, Master 1, Master 2
        $table->timestamps();
    });
}
};
