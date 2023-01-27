<?php

namespace App;

class Session
{
    private static array $data;

    public static function start(): void
    {
        session_start();
        self::$data = $_SESSION;
    }

    public static function store(string $key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    public static function has(string $key): bool
    {
        return isset(self::$data->$key);
    }

    public static function get(string $key)
    {
        return self::$data->$key;
    }

    public static function unset(string $key): void
    {
        unset(self::$data->$key);
    }
}