<?php
namespace TripSorter\Helpers;

/**
 * Class CommonHelper
 * @package TripSorter\Helpers
 */
class CommonHelper {

    /**
     * CommonHelper constructor.
     */
    function __construct() {

    }

    /**
     * @param array $items
     * @return array
     */
    public static function sortBoardingCardCollection(array $items) {
        $fromHash = self::createFromLocationHash($items);
        $toHash = self::createToLocationHash($items);

        $firstStartLocation = self::findFirstStartLocation($items, $toHash);

        $sortedCollection = array();
        $pointer = $firstStartLocation;

        for ($i=0; $i<sizeof($fromHash); $i++) {
            array_push($sortedCollection, $fromHash[$pointer]);
            $pointer = $fromHash[$pointer]->getToLocation();
            if ($pointer==null) {
                break;
            }
        }

        return $sortedCollection;
    }

    /**
     * @param $boardingCards
     * @return array
     */
    static function createFromLocationHash($boardingCards)
    {
        $fromLocations  = array();
        for ($i=0; $i<sizeof($boardingCards); $i++) {
            $fromLocations[$boardingCards[$i]->getFromLocation()] = $boardingCards[$i];
        }
        return $fromLocations;
    }

    /**
     * @param $boardingCards
     * @return array
     */
    static function createToLocationHash($boardingCards) {
        $toLocations  = array();
        for ($i=0; $i<sizeof($boardingCards); $i++) {
            $toLocations[$boardingCards[$i]->getToLocation()] = $boardingCards[$i];
        }
        return $toLocations;
    }

    /**
     * @param $boardingCards
     * @param $toHash
     * @return null
     */
    static function findFirstStartLocation($boardingCards, $toHash) {

        foreach($boardingCards as $boardingCard){
            $fromLocation = $boardingCard->getFromLocation();
            if (!array_key_exists($fromLocation, $toHash)) {
                return $fromLocation;
            }
        }
        return null;
    }
}
?>
