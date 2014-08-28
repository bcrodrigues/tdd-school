<?php

include("../Entities/StringSet.php");

class StringSetTest extends PHPUnit_Framework_TestCase {

    private $s;

    /** @before */
    public function setUp()
    {
        $this->s = new StringSet();
    }


    /** @test */
    public function addEmptyStringToStringSet(){
        $this->s->add('');
        $this->assertTrue( $this->s->hasString('') );
    }

    /** @test */
    public function addOlaMundoAndGetOlaMundo(){
        $testString='Olá Mundo!!!';
        $this->s->add($testString);
        $this->assertTrue($this->s->hasString($testString));
    }

    /** @test */
    public function addEmptyAndDontGetOlaMundo(){
        $this->s->add('');
        $this->assertFalse($this->s->hasString('Olá Mundo!!!'));
    }

    /** @test */
    public function addTwoStringsAndRemoveOneStringTheOtherMustBeFound(){
        $this->s->add('Bruno');
        $this->s->add('Carol');
        $this->s->remove('Bruno');
        $this->assertTrue($this->s->hasString('Carol'));
    }
    /** @test */
    public function addTwoStringsAndRemoveOneStringThisOneMustNotBeFound(){
        $this->s->add('Bruno');
        $this->s->add('Carol');
        $this->s->remove('Bruno');
        $this->assertFalse($this->s->hasString('Bruno'));
    }

    /** @test */
    public function addTwoStringsAndReturnCountEqualTwo(){
        $this->s->add('Bruno');
        $this->s->add('Carol');
        $this->assertEquals(2, $this->s->count());
    }

    /** @test */
    public function addThreeStringsRemoveTwoAndGetCountEqualOne(){
        $this->s->add('Bruno');
        $this->s->add('Carol');
        $this->s->add('Daniel');
        $this->s->remove('Daniel');
        $this->s->remove('Carol');
        $this->assertEquals(1, $this->s->count());
    }

}
 