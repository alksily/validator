<?php

namespace Alksily\Validator\Lead;

use Alksily\Validator\FilterRule;

class Strlen extends FilterRule
{
    /**
     * @var integer
     */
    public $len;

    /**
     * @var string
     */
    public $padString;

    /**
     * @var integer
     */
    public $padType;

    /**
     * Sanitizes a string to an exact length by padding or chopping it
     *
     * @param int    $len       minimum string length
     * @param string $padString Pad using this string
     * @param int    $padType   A `STR_PAD_*` constant
     */
    public function __construct($len, $padString = ' ', $padType = STR_PAD_RIGHT)
    {
        $this->len = $len;
        $this->padString = $padString;
        $this->padType = $padType;
    }

    public function __invoke(&$data, $field)
    {
        $value = &$data[$field];

        if (!is_scalar($value)) {
            return false;
        }

        $strLen = mb_strlen($value);

        if ($strLen < $this->len) {
            $value = static::mbStrPad($value, $this->len, $this->padString, $this->padType);
        }
        if ($strLen > $this->len) {
            $value = mb_substr($value, 0, $this->len);
        }

        return true;
    }
}
