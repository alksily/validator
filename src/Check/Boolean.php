<?php

namespace AEngine\Validator\Check;

use AEngine\Validator\FilterRule;

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
