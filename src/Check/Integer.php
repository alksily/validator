<?php

namespace Alksily\Validator\Check;

use Alksily\Validator\FilterRule;

class Integer extends FilterRule
{
    /**
     * Validates that the value represents an integer
     */
    public function __construct()
    {
    }

    public function __invoke(&$data, $field)
    {
        $value = $data[$field];

        if (is_int($value)) {
            return true;
        }

        // otherwise, must be numeric, and must be same as when cast to int
        return is_numeric($value) && $value == (int)$value;
    }
}
