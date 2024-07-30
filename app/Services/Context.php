<?php


namespace App\Services;

class Context
{
    protected $data = [];

    public function add($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function get($key)
    {
        return $this->data[$key] ?? null;
    }

    public function all()
    {
        return $this->data;
    }
}
