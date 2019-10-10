<?php

namespace Alksily\Validator\Check;

use Alksily\Validator\FilterRule;

class ValueNotEmpty extends FilterRule
{
    /**
     * Validates that the value is *not* Empty
     */
    public function __construct()
    {
    }

    public function __invoke(&$data, $field)
    {
        return !empty($data[$field]);
    }
}
