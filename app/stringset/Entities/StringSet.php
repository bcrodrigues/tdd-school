<?php

class StringSet {

    private $listOfStrings = array();

    public function add($s){
        $this->listOfStrings[] = $s;
    }

    public function hasString($string){
        for($i=0; $i<$this->count();$i++)
            if($this->indexHasTheString($i, $string))
                return true;
        return false;
    }

    public function remove($string){
        for($i=0; $i<$this->count();$i++)
            if($this->indexHasTheString($i, $string))
                $this->removeStringAndReorganizeSet($i);
    }

    public function count(){
        return count($this->listOfStrings);
    }

    /**
     * @param $i
     */
    private function removeStringAndReorganizeSet($i)
    {
        unset($this->listOfStrings[$i]);
        $this->listOfStrings = array_values($this->listOfStrings);
    }

    /**
     * @param $i
     * @param $string
     * @return bool
     */
    private function indexHasTheString($i, $string)
    {
        return $this->listOfStrings[$i] == $string;
    }
} 