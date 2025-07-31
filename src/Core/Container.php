<?php

namespace Core;

class Container
{
    protected array $bindings = [];

    public function bind(string $key, callable $resolver)
    {
        return $this->bindings[$key] = $resolver;
    }

    public function resolve($key)
    {
        if (! array_key_exists($key, $this->bindings)) {
            throw new \Exception('No binding was found for ' . $key);
        }

        $resolver = $this->bindings[$key];

        call_user_func($resolver);
    }
}