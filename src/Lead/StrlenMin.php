<?php

namespace Alksily\Validator\Lead;

use Alksily\Validator\FilterRule;

class StrlenMin extends FilterRule
{
    /**
     * @var integer
     */
    public $min;

    /**
     * @var string
     */
    public $padString;

    /**
     * @var integer
     */
    public $padType;

    /**
     * Sanitizes a string to a minimum length by padding it
     *
     * @param int    $min       minimum length
     * @param string $padString Pad using this string
     * @param int    $padType   A `STR_PAD_*` constant
     */
    public function __construct($min, $padString = ' ', $padType = STR_PAD_RIGHT)
    {
        $this->min = $min;
    }

    public function __invoke(&$data, $field)
    {
        $value = &$data[$field];

        if (!is_scalar($value)) {
            return false;
        }
        if (mb_strlen($value) < $this->min) {
            $value = static::mbStrPad($value, $this->min, $this->padString, $this->padType);;
        }

        return true;
    }
}
