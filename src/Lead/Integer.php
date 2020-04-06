<?php

namespace Alksily\Validator\Lead;

use Alksily\Validator\FilterRule;

class Integer extends FilterRule
{
    /**
     * Forces the value to an integer
     */
    public function __construct()
    {
    }

    public function __invoke(&$data, $field)
    {
        $value = &$data[$field];

        if (is_numeric($value) || is_string($value)) {
            $value = (float) $value;
            $value = (int) $value;

            return true;
        }

        return false;
    }
}
