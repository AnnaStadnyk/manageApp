<?php

namespace App\support;

class Container
{
    private array $entries;
    private array $recepies;

    public function bind(string $what, \Closure $recepy): void
    {
        $this->recepies[$what] = $recepy;
    }

    public function get(string $what): mixed
    {
        if (! isset($this->recepies[$what])) {
            //echo "Method not found";
            http_response_code(500);
            exit;
        } else {
            if (empty($this->entries[$what])) {
                $this->entries[$what] = $this->recepies[$what]();
            }
        }

        return $this->entries[$what];
    }
}
