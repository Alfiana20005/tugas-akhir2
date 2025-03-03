<?php
// File: app/Helpers/url_helper.php

if (!function_exists('remove_url_param')) {
    /**
     * Remove a parameter from a URL
     * 
     * @param string $url The URL to modify
     * @param string $param The parameter to remove
     * @return string The modified URL
     */
    function remove_url_param($url, $param)
    {
        $url_parts = parse_url($url);
        if (isset($url_parts['query'])) {
            parse_str($url_parts['query'], $params);
            unset($params[$param]);
            $url_parts['query'] = http_build_query($params);
        }

        return (isset($url_parts['scheme']) ? $url_parts['scheme'] . '://' : '') .
            (isset($url_parts['host']) ? $url_parts['host'] : '') .
            (isset($url_parts['path']) ? $url_parts['path'] : '') .
            (isset($url_parts['query']) && !empty($url_parts['query']) ? '?' . $url_parts['query'] : '') .
            (isset($url_parts['fragment']) ? '#' . $url_parts['fragment'] : '');
    }
}
