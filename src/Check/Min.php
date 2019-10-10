<?php

namespace Alksily\Validator\Check;

use Alksily\Validator\FilterRule;

class Min extends FilterRule
{
    /**
     * @var integer
     */
    public $min;

    /**
     * Validates that the value is greater than or equal to a minimum
     *
     * @param int $min minimum valid value
     */
    public function __construct($min)
    {
        $this->min = $min;
    }

    public function __invoke(&$data, $field)
    {
        $value = $data[$field];

        if (!is_scalar($value)) {
            return false;
        }

        return $value >= $this->min;
    }
}
