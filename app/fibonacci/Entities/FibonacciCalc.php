<?php

class FibonacciCalc {
    public function getValueForPosition($position){
        if($position==1)
            return 0;
        elseif ($position==2)
            return 1;
        else
            return $this->getValueForPosition($position-1)+$this->getValueForPosition($position-2);
    }
} 