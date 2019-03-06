<?php

namespace AEngine\Validator\Lead;

use AEngine\Validator\FilterRule;

class Remove extends FilterRule
{
    /**
     * Removes the field from the data with unset()
     */
    public function __construct()
    {
    }

    public function __invoke(&$data, $field)
    {
        unset($data[$field]);

        return true;
    }
}
