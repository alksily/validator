<?php

namespace Alksily\Validator\Check;

use Alksily\Validator\FilterRule;

class Str extends FilterRule
{
    /**
     * Validates that the value represents a string
     */
    public function __construct()
    {
    }

    public function __invoke(&$data, $field)
    {
        return is_string($data[$field]);
    }
}
