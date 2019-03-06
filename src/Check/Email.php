<?php

namespace AEngine\Validator\Check;

use AEngine\Validator\FilterRule;

class Email extends FilterRule
{
    /**
     * Validates that the value represents a float
     */
    public function __construct()
    {
    }

    public function __invoke(&$data, $field)
    {
        return !!filter_var($data[$field], FILTER_VALIDATE_EMAIL);
    }
}
