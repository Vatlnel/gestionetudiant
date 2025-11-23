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
    Schema::table('sites', function (Blueprint $table) {
        $table->dropForeign(['university_id']); // si une contrainte existe
        $table->dropColumn('university_id');
    });
}

public function down()
{
    Schema::table('sites', function (Blueprint $table) {
        $table->foreignId('university_id')->constrained()->onDelete('cascade');
    });
}
};
