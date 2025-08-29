<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('menu_sections', function (Blueprint $table) {
            if (!Schema::hasColumn('menu_sections', 'discount')) {
                $table->decimal('discount', 5, 2)->default(0)->after('name');
            }
        });
    }

    public function down(): void
    {
        Schema::table('menu_sections', function (Blueprint $table) {
            if (Schema::hasColumn('menu_sections', 'discount')) {
                $table->dropColumn('discount');
            }
        });
    }
};

