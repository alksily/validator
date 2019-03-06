<?php

namespace AEngine\Validator\Lead;

use AEngine\Validator\FilterRule;

class Callback extends FilterRule
{
    /**
     * Sanitizes a value using a callable
     */
    public function __construct()
    {
    }

    public function __invoke(&$data, $field)
    {
        return $data[$field]($data, $field);
    }
}
