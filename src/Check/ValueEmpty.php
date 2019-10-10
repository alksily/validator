<?php

namespace Alksily\Validator\Check;

use Alksily\Validator\FilterRule;

class ValueEmpty extends FilterRule
{
    /**
     * Validates that the value is Empty
     */
    public function __construct()
    {
    }

    public function __invoke(&$data, $field)
    {
        return empty($data[$field]);
    }
}
