<?php

namespace Alksily\Validator\Check;

use Alksily\Validator\FilterRule;

class Boolean extends FilterRule
{
    /**
     * Validates that the value is a boolean representation
     */
    public function __construct()
    {
    }

    public function __invoke(&$data, $field)
    {
        return static::isTrue($data[$field]) || static::isFalse($data[$field]);
    }
}
