<?php

namespace AEngine\Validator\Check;

use AEngine\Validator\FilterRule;

class InValues extends FilterRule
{
    /**
     * @var array
     */
    public $array;

    /**
     * Validates that the value is in a given array
     *
     * @param array $array array of allowed values
     */
    public function __construct($array)
    {
        $this->array = $array;
    }

    public function __invoke(&$data, $field)
    {
        return in_array($data[$field], $this->array, true);
    }
}
