<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement('UPDATE students SET nis = RIGHT(nis, 4) WHERE CHAR_LENGTH(nis) > 4');

        Schema::table('students', function (Blueprint $table) {
            $table->string('nis', 4)->change();
        });
    }

    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->string('nis', 8)->change();
        });
    }
};
