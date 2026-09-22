<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('informations')) {
            return;
        }

        $missing = fn (string $column): bool => ! Schema::hasColumn('informations', $column);

        Schema::table('informations', function (Blueprint $table) use ($missing) {
            if ($missing('is_auto_assign')) {
                $table->boolean('is_auto_assign')->default(false);
            }

            if ($missing('auto_assign_rules')) {
                $table->longText('auto_assign_rules')->nullable();
            }
        });
    }

    public function down(): void
    {
        // Configuration compatibility migrations preserve existing settings.
    }
};
