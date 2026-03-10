<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('menu', function (Blueprint $table) {
            if (!Schema::hasColumn('menu', 'name')) {
                $table->string('name')->after('id');
            }
            if (!Schema::hasColumn('menu', 'url')) {
                $table->string('url')->nullable()->after('name');
            }
            if (!Schema::hasColumn('menu', 'parent_id')) {
                $table->integer('parent_id')->default(0)->after('url');
            }
            if (!Schema::hasColumn('menu', 'sort_order')) {
                $table->integer('sort_order')->default(0)->after('parent_id');
            }
            if (!Schema::hasColumn('menu', 'status')) {
                $table->boolean('status')->default(1)->after('sort_order');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('menu', function (Blueprint $table) {
            //
        });
    }
};
