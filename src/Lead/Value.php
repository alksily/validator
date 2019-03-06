<?php

namespace AEngine\Validator\Lead;

use AEngine\Validator\FilterRule;

class Value extends FilterRule
{
    /**
     * @var mixed
     */
    public $otherValue;

    /**
     * Modifies the field value to match another value
     *
     * @param mixed $otherValue value to set
     */
    public function __construct($otherValue)
    {
        $this->otherValue = $otherValue;
    }

    public function __invoke(&$data, $field)
    {
        $data[$field] = $this->otherValue;

        return true;
    }
}
