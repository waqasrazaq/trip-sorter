<?php
namespace TripSorter\Tests;

use \TripSorter\Entities\Transportation\TrainBoardingCard;
require_once __DIR__ . '/../../../vendor/autoload.php';

class TrainBoardingCardTest extends \PHPUnit_Framework_TestCase
{
    public function testToString()
    {
        $trainBoardingCard = new TrainBoardingCard('Madrid', 'Casablanca', '45B', '78A');
        $this->assertEquals($trainBoardingCard->toString(),"Take train 78A from Madrid to Casablanca. Sit in seat 45B.");
    }
}