<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private const REPLACEMENTS = [
        'Insafstitch' => 'trizync-solution',
        'insafstitch' => 'trizync-solution',
    ];

    public function up(): void
    {
        $this->replaceJsonColumn('dynamic_landing_pages', 'seo');
        $this->replaceJsonColumn('dynamic_landing_page_components', 'config');
        $this->replaceJsonColumn('dynamic_landing_page_versions', 'snapshot');
        $this->replaceJsonColumn('dynamic_landing_saved_sections', 'components');
    }

    public function down(): void
    {
        // Branding migrations are intentionally irreversible.
    }

    private function replaceJsonColumn(string $table, string $column): void
    {
        if (!Schema::hasTable($table) || !Schema::hasColumn($table, $column)) {
            return;
        }

        DB::table($table)
            ->select(['id', $column])
            ->orderBy('id')
            ->chunkById(100, function ($rows) use ($table, $column) {
                foreach ($rows as $row) {
                    $original = $row->{$column};

                    if ($original === null || $original === '') {
                        continue;
                    }

                    $updated = str_replace(
                        array_keys(self::REPLACEMENTS),
                        array_values(self::REPLACEMENTS),
                        (string) $original
                    );

                    if ($updated !== (string) $original) {
                        DB::table($table)
                            ->where('id', $row->id)
                            ->update([$column => $updated]);
                    }
                }
            });
    }
};
