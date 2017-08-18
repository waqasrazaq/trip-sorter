<?php
namespace TripSorter;
use \TripSorter\Entities\Transportation\TrainBoardingCard;
use \TripSorter\Entities\Transportation\BusBoardingCard;
use \TripSorter\Entities\Transportation\AirlineBoardingCard;
use \TripSorter\Managers\TripManager;

require_once __DIR__ . '/vendor/autoload.php';

$trip = new TripManager();
$trip->addCard(new AirlineBoardingCard('Stockholm', 'New York JFK', '7B', 'SK22', '22'));
$trip->addCard(new AirlineBoardingCard('Gerona Airport', 'Stockholm', '3A', 'SK455', '45B', '344'));
$trip->addCard(new TrainBoardingCard('Madrid', 'Barcelona', '45B', '78A'));
$trip->addCard(new BusBoardingCard('Barcelona', 'Gerona Airport'));

$trip->sortBoardingCards();

echo $trip->getBoardingCardHTMLList();
?>
