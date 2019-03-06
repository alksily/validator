<?php

namespace AEngine\Validator\Lead;

use AEngine\Validator\FilterRule;

class Lowercase extends FilterRule
{
    /**
     * Sanitizes a string to lowercase
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

        $value = strtolower($value);

        return true;
    }
}
