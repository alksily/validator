<?php

namespace Alksily\Validator\Lead;

use Alksily\Validator\FilterRule;

class Str extends FilterRule
{
    /**
     * Forces the value to a string
     */
    public function __construct()
    {
    }

    public function __invoke(&$data, $field)
    {
        $value = &$data[$field];

        if (!is_scalar($value) && !method_exists($value, '__toString')) {
            return false;
        }

        $value = strval($value);

        return true;
    }
}
