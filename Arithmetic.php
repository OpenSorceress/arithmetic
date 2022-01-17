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
            $this->_init($argv);

        var_dump($this->numbers);
        var_dump($this->operation);
        $this->_init($argv);
    }

    /**
     * @param $args
     * @return $this
     */
    public function _init($args) {
        foreach($args as $arg) {
          if (is_string((string)$arg) && in_array($arg, ["+", "-", "*", "/", "%"])) {
              $this->operation = $arg;
          }  elseif(is_int((int)$arg) || is_float((float)$arg)) {
              $this->numbers[] = $arg;
          }
        }
        $this->_order($this->operation, $this->numbers);
        return $this;
    }


    public function _order($str, $nums) {
        switch($str):
            case("+"):
                $this->addition($nums);
                break;
            case("-"):
                break;
            case("*"):
                break;
            case("/"):
                break;
            case("%"):
                break;
        endswitch;
    }


    /**
     * @return void
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
     * @param $num
     * @return void
     */
    public function subtraction($num = 0)
    {

    }

    /**
     * @param $num
     * @return integer
     */
    public function multiplication($num = 0)
    {
        $result = 0;
        foreach($this->numbers as $n) {
            $result = $n * $num;
            $num = $n;
        }
        return $result;
    }

    /**
     * @param $num
     * @return void
     */
    public function division($num = 0)
    {
        if ($num === 0) {
            throw new ErrorException("Cannot divide by zero");
        }
    }

}

$result = new Arithmetic($argv);