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
        if (! Schema::hasTable('sliders')) {
            return;
        }

        Schema::table('sliders', function (Blueprint $table) {
            if (! Schema::hasColumn('sliders', 'title')) {
                $table->string('title')->nullable();
            }

            if (! Schema::hasColumn('sliders', 'description')) {
                $table->text('description')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // These columns may be owned by the base sliders migration.
    }
};
