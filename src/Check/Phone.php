<?php

namespace Alksily\Validator\Check;

use Alksily\Validator\FilterRule;

class Phone extends FilterRule
{
    protected $pattern = '/\(?\+[0-9]{1,3}\)? ?-?[0-9]{1,3} ?-?[0-9]{3,5} ?-?[0-9]{4}( ?-?[0-9]{3})? ?(\w{1,10}\s?\d{1,6})?/';

    /**
     * Validates that the value is phone
     */
    public function __construct()
    {
    }

    public function __invoke(&$data, $field)
    {
        $value = $data[$field];

        if (!is_scalar($value)) {
            return false;
        }

        if (preg_match($this->pattern, $value)) {
            return true;
        }

        return false;
    }
}
