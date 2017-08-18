<?php
namespace TripSorter\Helpers;

class CommonHelper {

    function __construct() {

    }

    public static function sortBoardingCardCollection(array $items) {
        $fromHash = self::createFromLocationHash($items);
        $toHash = self::createToLocationHash($items);

        //self::printHash($toHash);
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

    static function createFromLocationHash($boardingCards)
    {
        $fromLocations  = array();
        for ($i=0; $i<sizeof($boardingCards); $i++) {
            $fromLocations[$boardingCards[$i]->getFromLocation()] = $boardingCards[$i];
        }
        return $fromLocations;
    }

    static function createToLocationHash($boardingCards) {
        $toLocations  = array();
        for ($i=0; $i<sizeof($boardingCards); $i++) {
            $toLocations[$boardingCards[$i]->getToLocation()] = $boardingCards[$i];
        }
        return $toLocations;
    }

    private static function printHash($hash){
        foreach ($hash as $key => $value) {
            // $arr[3] will be updated with each value from $arr...
            echo "{$key}";

        }
    }

    private static function findFirstStartLocation($boardingCards, $toHash) {

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