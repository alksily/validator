<?php

namespace Alksily\Validator\Check;

use Alksily\Validator\FilterRule;

class Between extends FilterRule
{
    /**
     * @var integer
     */
    public $min;

    /**
     * @var integer
     */
    public $max;

    /**
     * Validates that the value is within a given range
     *
     * @param int $min minimum valid value
     * @param int $max maximum valid value
     */
    public function __construct($min, $max)
    {
        $this->min = $min;
        $this->max = $max;
    }

    public function __invoke(&$data, $field)
    {
        $value = $data[$field];

        if (!is_scalar($value)) {
            return false;
        }

        return ($value >= $this->min && $value <= $this->max);
    }
}
