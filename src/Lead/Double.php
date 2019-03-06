<?php

namespace AEngine\Validator\Lead;

use AEngine\Validator\FilterRule;

class Double extends FilterRule
{
    /**
     * @var integer
     */
    public $precision;

    /**
     * Forces the value to a float
     *
     * @param int $precision rounding precision
     */
    public function __construct($precision = 2)
    {
        $this->precision = $precision;
    }

    public function __invoke(&$data, $field)
    {
        $value = &$data[$field];

        if (is_numeric($value) || is_string($value)) {
            $value = round((double)$value, $this->precision);

            return true;
        }

        return false;
    }
}
