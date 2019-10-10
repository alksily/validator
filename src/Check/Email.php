<?php

namespace Alksily\Validator\Check;

use Alksily\Validator\FilterRule;

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
