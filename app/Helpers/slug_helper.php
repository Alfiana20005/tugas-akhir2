<?php

if (!function_exists('generateSlugFromTitle')) {
    /**
     * Generate slug dari 3 kata pertama judul
     * 
     * @param string $title
     * @param int $wordCount Jumlah kata yang diambil (default: 3)
     * @return string
     */
    function generateSlugFromTitle($title, $wordCount = 3)
    {
        // Bersihkan string dari karakter khusus
        $title = trim($title);

        // Pisahkan berdasarkan spasi
        $words = explode(' ', $title);

        // Ambil n kata pertama
        $selectedWords = array_slice($words, 0, $wordCount);

        // Gabungkan kembali
        $slug = implode(' ', $selectedWords);

        // Convert ke slug format
        $slug = strtolower($slug);
        $slug = preg_replace('/[^a-z0-9]+/', '-', $slug);
        $slug = trim($slug, '-');

        return $slug;
    }
}

if (!function_exists('ensureUniqueSlug')) {
    /**
     * Pastikan slug unik dengan menambahkan angka jika duplikat
     * 
     * @param string $slug
     * @param object $model
     * @param int|null $excludeId
     * @return string
     */
    function ensureUniqueSlug($slug, $model, $excludeId = null)
    {
        $originalSlug = $slug;
        $counter = 1;

        while (true) {
            $builder = $model->where('slug', $slug);

            if ($excludeId) {
                $builder->where('id_sega !=', $excludeId);
            }

            $exists = $builder->first();

            if (!$exists) {
                break;
            }

            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}
