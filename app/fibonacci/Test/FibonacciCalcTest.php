<?php
include("../Entities/FibonacciCalc.php");

class FibonacciCalcTest extends PHPUnit_Framework_TestCase {

    private $fc;

    /** @before */
    protected function setUp()
    {
        $this->fc = new FibonacciCalc();
    }

    /** @test */
    public function firstPositionIsZero(){
        $this->assertEquals(0,$this->fc->getValueForPosition(1));
    }

    /** @test */
    public function secondPositionMustBeOne(){
       $this->assertEquals(1,$this->fc->getValueForPosition(2));
    }

    /** @test */
    public function thirdPositionMustBeOne(){
        $this->assertEquals(1,$this->fc->getValueForPosition(3));
    }

    /** @test */
    public function forthPositionMustBeTwo(){
        $this->assertEquals(2,$this->fc->getValueForPosition(4));
    }

    /** @test */
    public function fithPositionMustBeThree(){
        $this->assertEquals(3,$this->fc->getValueForPosition(5));
    }

    /** @test */
    public function tenthPositionMustBeThirthFour(){
        $this->assertEquals(34,$this->fc->getValueForPosition(10));
    }

}


 