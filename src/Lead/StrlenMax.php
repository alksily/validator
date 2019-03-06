<?php

namespace AEngine\Validator\Lead;

use AEngine\Validator\FilterRule;

class StrlenMax extends FilterRule
{
    /**
     * @var integer
     */
    public $max;

    /**
     * Sanitizes a string to a maximum length by chopping it at the right
     *
     * @param int $max maximum length.
     */
    public function __construct($max)
    {
        $this->max = $max;
    }

    public function __invoke(&$data, $field)
    {
        $value = &$data[$field];

        if (!is_scalar($value)) {
            return false;
        }
        if (mb_strlen($value) > $this->max) {
            $value = mb_substr($value, 0, $this->max);
        }

        return true;
    }
}
