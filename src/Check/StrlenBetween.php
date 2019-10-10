<?php

namespace Alksily\Validator\Check;

use Alksily\Validator\FilterRule;

class StrlenBetween extends FilterRule
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
     * Validates that the length of the value is within a given range
     *
     * @param int $min minimum valid length.
     * @param int $max maximum valid length.
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
        $len = mb_strlen($value);

        return ($len >= $this->min && $len <= $this->max);
    }
}
