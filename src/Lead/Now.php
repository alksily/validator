<?php

namespace AEngine\Validator\Lead;

use AEngine\Validator\FilterRule;

class Now extends FilterRule
{
    /**
     * @var string
     */
    public $format;

    /**
     * Force the value to the current time (default format "Y-m-d H:i:s")
     *
     * @param string $format date format to use
     */
    public function __construct($format = 'Y-m-d H:i:s')
    {
        $this->format = $format;
    }

    public function __invoke(&$data, $field)
    {
        $data[$field] = date($this->format);

        return true;
    }
}
