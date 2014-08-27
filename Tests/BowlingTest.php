<?php
/**
 * Created by PhpStorm.
 * User: rodrigues
 * Date: 26/08/14
 * Time: 21:31
 */

include("../Entities/Game.php");

class BowlingTest extends PHPUnit_Framework_TestCase {

    private $g;

    /**
    * @before
    */
    public function setUp(){
        $this->g = new Game();
    }

    /**
     * @param $n
     * @param $pins
     */
    private function rollMany($n, $pins)
    {
        for ($i = 0; $i < $n; $i++) {
            $this->g->roll($pins);
        }
    }

    private function rollSpare()
    {
        $this->g->roll(5);
        $this->g->roll(5);
    }

    private function rollStrike()
    {
        $this->g->roll(10);
    }

    /**
     * @test
     */
    public function canRoll()
    {
        $this->g->roll(0);
    }

    /**
     * @test
     */
    public function rollGutterGame()
    {
        $this->rollMany(20, 0);
        $this->assertEquals(0,$this->g->score());
    }

    /**
     * @test
     */

    public function allOnes()
    {
        $this->rollMany(20, 1);
        $this->assertEquals(20,$this->g->score());
    }

    /**
     * @test
     */
    public function oneSpare()
    {
        $this->rollSpare();
        $this->g->roll(3);

        $this->rollMany(17,0);

        $this->assertEquals(16,$this->g->score());

    }

    /**
     * @test
     */
    public function oneStrike()
    {
        $this->rollStrike();
        $this->g->roll(3);
        $this->g->roll(4);
        $this->rollMany(17,0);
        $this->assertEquals(24,$this->g->score());
    }

    public function perfectGame()
    {
        $this->rollMany(12,10);
        $this->assertEquals(300,$this->g->score());
    }


}
 