<?php

namespace Alksily\Validator\Check;

use Alksily\Validator\FilterRule;

class InKeys extends FilterRule
{
    /**
     * @var array
     */
    public $array;

    /**
     * Validates that the value is a key in a given array
     *
     * @param array $array array of key-value pairs; the value must match one of the keys in this array
     */
    public function __construct($array)
    {
        $this->array = $array;
    }

    public function __invoke(&$data, $field)
    {
        $value = $data[$field];

        if (!is_string($value) && !is_int($value)) {
            // array_key_exists errors on non-string non-int keys.
            return false;
        }

        // using array_keys() converts string numeric keys to integers, which
        // is *not* the behavior we want.
        return array_key_exists($value, $this->array);
    }
}
