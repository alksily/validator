<?php

namespace Alksily\Validator\Lead;

use Alksily\Validator\FilterRule;

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
