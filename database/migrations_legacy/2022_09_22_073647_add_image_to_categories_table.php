<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable('categories') || Schema::hasColumn('categories', 'image')) {
            return;
        }

        Schema::table('categories', function (Blueprint $table) {
            $table->string('image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (! Schema::hasTable('categories') || ! Schema::hasColumn('categories', 'image')) {
            return;
        }

        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
};
