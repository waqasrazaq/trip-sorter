<?php
namespace TripSorter\Tests;

use TripSorter\Entities\Transportation\AirlineBoardingCard;
use TripSorter\Entities\Transportation\TrainBoardingCard;
use TripSorter\Entities\Transportation\BusBoardingCard;
use \TripSorter\Helpers\CommonHelper;

require_once __DIR__ . '/../../vendor/autoload.php';

class CommonHelperTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateFromLocationHash()
    {
        $busBoardingCard = new BusBoardingCard('Barcelona', 'Gerona Airport');
        $airlineBoardingCard = new AirlineBoardingCard('Stockholm', 'New York JFK', '7B', 'SK22', '22');
        $airlineBoardingCard1 = new AirlineBoardingCard('Gerona Airport', 'Stockholm', '3A', 'SK455', '45B', '344');
        $trainBoardingCard = new TrainBoardingCard('Madrid', 'Barcelona', '45B', '78A');
        $fromLocationHash = CommonHelper::createFromLocationHash(array($busBoardingCard, $airlineBoardingCard, $airlineBoardingCard1, $trainBoardingCard));
        $fromLocationsStr = "";
        foreach ($fromLocationHash as $key=>$value) {
            $fromLocationsStr .= $key;
        }

        $this->assertEquals($fromLocationsStr,"BarcelonaStockholmGerona AirportMadrid");
    }

    public function testCreateToLocationHash()
    {
        $busBoardingCard = new BusBoardingCard('Barcelona', 'Gerona Airport');
        $airlineBoardingCard = new AirlineBoardingCard('Stockholm', 'New York JFK', '7B', 'SK22', '22');
        $airlineBoardingCard1 = new AirlineBoardingCard('Gerona Airport', 'Stockholm', '3A', 'SK455', '45B', '344');
        $trainBoardingCard = new TrainBoardingCard('Madrid', 'Barcelona', '45B', '78A');
        $toLocationHash = CommonHelper::createToLocationHash(array($busBoardingCard, $airlineBoardingCard, $airlineBoardingCard1, $trainBoardingCard));

        $toLocationsStr = "";
        foreach ($toLocationHash as $key=>$value) {
            $toLocationsStr .= $key;
        }

        $this->assertEquals($toLocationsStr,"Gerona AirportNew York JFKStockholmBarcelona");
    }

    public function testFindFirstStartLocation() {

        $busBoardingCard = new BusBoardingCard('Barcelona', 'Gerona Airport');
        $airlineBoardingCard = new AirlineBoardingCard('Stockholm', 'New York JFK', '7B', 'SK22', '22');
        $airlineBoardingCard1 = new AirlineBoardingCard('Gerona Airport', 'Stockholm', '3A', 'SK455', '45B', '344');
        $trainBoardingCard = new TrainBoardingCard('Madrid', 'Barcelona', '45B', '78A');

        $toLocationHash = CommonHelper::createToLocationHash(array($busBoardingCard, $airlineBoardingCard, $airlineBoardingCard1, $trainBoardingCard));
        $startingPoint = CommonHelper::findFirstStartLocation(array($busBoardingCard, $airlineBoardingCard, $airlineBoardingCard1, $trainBoardingCard), $toLocationHash);

        $this->assertEquals($startingPoint,"Madrid");
    }
}