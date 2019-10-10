<?php

namespace Alksily\Validator\Lead;

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
     * If the value is less than min, will set the min value,
     * and if value is greater than max, set the max value
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
        $value = &$data[$field];

        if (!is_scalar($value)) {
            return false;
        }
        if ($value < $this->min) {
            $value = $this->min;
        }
        if ($value > $this->max) {
            $value = $this->max;
        }

        return true;
    }
}
