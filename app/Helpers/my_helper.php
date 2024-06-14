if (!function_exists('nl2p')) {
    function nl2p($text) {
        $text = trim($text);
        $paragraphs = explode("\n", $text);
        $text = '';
        foreach ($paragraphs as $paragraph) {
            $paragraph = trim($paragraph);
            if (!empty($paragraph)) {
                $text .= '<p>' . esc($paragraph) . '</p>';
            }
        }
        return $text;
    }
}