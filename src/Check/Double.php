<?php

namespace Alksily\Validator\Check;

use Alksily\Validator\FilterRule;

class Double extends FilterRule
{
    /**
     * Validates that the value represents a float
     */
    public function __construct()
    {
    }

    public function __invoke(&$data, $field)
    {
        $value = $data[$field];

        if (is_float($value)) {
            return true;
        }

        // otherwise, must be numeric, and must be same as when cast to float
        return is_numeric($value) && $value == (float) $value;
    }
}
