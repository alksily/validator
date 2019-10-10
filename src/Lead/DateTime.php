<?php

namespace Alksily\Validator\Lead;

use Alksily\Validator\FilterRule;

class DateTime extends FilterRule
{
    /**
     * @var string
     */
    public $format;

    /**
     * Sanitize a datetime to a specified format (default "Y-m-d H:i:s")
     *
     * @param string $format date format to use
     */
    public function __construct($format = 'Y-m-d H:i:s')
    {
        $this->format = $format;
    }

    public function __invoke(&$data, $field)
    {
        $value = &$data[$field];

        if (is_numeric($value)) {
            $value = date($this->format, $value);

            return true;
        }

        if (is_string($value) && ($time = strtotime($value)) !== false) {
            $value = date($this->format, $time);

            return true;
        }

        return false;
    }
}
