<?php
class Session
{
    public function __construct()
    {
        session_start();
    }

    public function set_userdata($key, $value)
    {
        $_session[$key] = $value;
    }

    public function userdata($key)
    {
        return $_session[$key] ?? null;
    }

    public function unset_userdata($key)
    {
        unset($_session[$key]);
    }

    public function set_flashdata($key, $value = null)
    {
        if ($value !== null) {
            $_session['_flash'][$key] = $value;
        } else {
            $data = $_session['_flash'][$key] ?? null;
            unset($_session['_flash'][$key]);
            return $data;
        }
    }
}
