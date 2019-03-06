<?php

namespace AEngine\Validator\Lead;

use AEngine\Validator\FilterRule;

class Uppercase extends FilterRule
{
    /**
     * Sanitizes a string to uppercase
     */
    public function __construct()
    {
    }

    public function __invoke(&$data, $field)
    {
        $value = &$data[$field];

        if (!is_scalar($value)) {
            return false;
        }

        $value = strtoupper($value);

        return true;
    }
}
