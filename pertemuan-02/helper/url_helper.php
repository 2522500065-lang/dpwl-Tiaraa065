<?php
function base_url($path = '')
{
    global $config;
    // Pastikan ada slash di antara base_url dan path
    return rtrim($config['base_url'], '/') . '/' . ltrim($path, '/');
}
