<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private const PLACEHOLDER = '/images/no_found.png';

    public function up(): void
    {
        $this->replaceImages('dynamic_landing_page_components', 'config');
        $this->replaceImages('dynamic_landing_page_versions', 'snapshot');
        $this->replaceImages('dynamic_landing_saved_sections', 'components');
    }

    public function down(): void
    {
        // Original remote component images cannot be reconstructed safely.
    }

    private function replaceImages(string $table, string $column): void
    {
        if (!Schema::hasTable($table) || !Schema::hasColumn($table, $column)) {
            return;
        }

        DB::table($table)
            ->select(['id', $column])
            ->orderBy('id')
            ->chunkById(100, function ($rows) use ($table, $column) {
                foreach ($rows as $row) {
                    $decoded = json_decode((string) $row->{$column}, true);

                    if (!is_array($decoded)) {
                        continue;
                    }

                    $updated = $this->replaceImageFields($decoded);

                    if ($updated !== $decoded) {
                        DB::table($table)
                            ->where('id', $row->id)
                            ->update([
                                $column => json_encode($updated, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
                            ]);
                    }
                }
            });
    }

    private function replaceImageFields(array $data, ?string $parentKey = null): array
    {
        foreach ($data as $key => $value) {
            if (in_array($key, ['image_url', 'center_image_url'], true)) {
                $data[$key] = self::PLACEHOLDER;

                continue;
            }

            if ($key === 'url' && $parentKey === 'images') {
                $data[$key] = self::PLACEHOLDER;

                continue;
            }

            if (is_array($value)) {
                $childParent = $parentKey === 'images' ? 'images' : (string) $key;
                $data[$key] = $this->replaceImageFields($value, $childParent);
            }
        }

        return $data;
    }
};
