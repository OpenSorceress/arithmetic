<?php

class Arithmetic
{

    public array $numbers = [];
    public string $operation = '';

    /**
     * @param $argv
     */
    public function __construct($argv)
    {
        $file = array_shift($argv);
        unset($file); // manual GC
        $this->_init($argv);
    }

    /**
     * @param $args
     * @return $this
     */
    protected function _init($args) {
        foreach($args as $arg) {
          if (is_string((string)$arg) && in_array($arg, ["+", "-", "*", "/", "%"])) {
              $this->operation = $arg;
          }  elseif(is_int((int)$arg) || is_float((float)$arg)) {
              $this->numbers[] = $arg;
          }
        }
        return $this->_order($this->operation, $this->numbers);
    }


    protected function _order($str, $nums) {
        switch($str):
            case("+"):
                print_r($this->addition($nums));
                break;
            case("-"):
                print_r($this->subtraction($nums));
                break;
            case("*"):
                print_r($this->multiplication($nums));
                break;
            case("/"):
                print_r($this->division($nums));
                break;
            case("%"):
                print_r($this->modulus($nums));
                break;
        endswitch;
    }


    /**
     * @param $nums
     * @return int
     */
    public function addition($nums)
    {
        $out = "Need 2 integers or floats to perform addition operaton";
        if (is_array($nums) && count($nums) >= 2){
            $out = $nums[0] + $nums [1];
        }
        return $out;
    }

    /**
     * @param $nums
     * @return int
     */
    public function subtraction($nums)
    {
        $out = "Need 2 integers or floats to perform subtraction operaton";
        if (is_array($nums) && count($nums) >= 2){
            $out = $nums[0] - $nums [1];
        }
        return $out;
    }

    /**
     * @param $nums
     * @return int
     */
    public function multiplication($nums)
    {
        $out = 0;
        if (is_array($nums) && count($nums) >= 2){
            $out = $nums[0] * $nums [1];
        }
        return $out;
    }

    /**
     * @param $nums
     * @return int
     */
    public function division($nums)
    {
        $out = 0;
        if (is_array($nums) && count($nums) >= 2) {
            if ($nums[0] === 0 || $nums[1] === 0) {
                throw new ErrorException("Cannot divide by zero");

            }
            $out = $nums[0] / $nums [1];
        }
        return $out;
    }

    /**
     * @param $nums
     * @return int
     */
    public function modulus(array $nums) {
        $out = 0;
        if (is_array($nums) && count($nums) >= 2) {
            if ($nums[0] === 0 || $nums[1] === 0) {
                throw new ErrorException("Cannot divide by zero");
            }
            $out = $nums[0] % $nums [1];
        }
        return $out;

    }

}

$result = new Arithmetic($argv);