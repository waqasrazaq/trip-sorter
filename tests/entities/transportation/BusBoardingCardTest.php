<?php
namespace TripSorter\Tests;

use \TripSorter\Entities\Transportation\BusBoardingCard;
require_once __DIR__ . '/../../../vendor/autoload.php';

class TrainBoardingCardTest extends \PHPUnit_Framework_TestCase
{
    public function testToString()
    {
        $busBoardingCard = new BusBoardingCard('Barcelona', 'Gerona Airport');
        $this->assertEquals($busBoardingCard->toString(),"Take the airport bus from Barcelona to Gerona AirportNo seat assignment.");
    }
}