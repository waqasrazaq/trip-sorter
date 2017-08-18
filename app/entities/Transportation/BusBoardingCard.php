<?php
namespace TripSorter\Entities\Transportation;

/**
 * Class BusBoardingCard
 * @package TripSorter\Entities\Transportation
 */
class BusBoardingCard extends AbstractBoardingCard
{

    /**
     * BusBoardingCard constructor.
     * @param $fromLocation
     * @param $toLocation
     */
    function __construct($fromLocation, $toLocation)
    {
        parent::__construct($fromLocation, $toLocation);
    }

    /**
     * @return string
     */
    public function toString()
    {
        return 'Take the airport bus from ' . $this->getFromLocation() . ' to ' . $this->getToLocation() . 'No seat assignment.';
    }
}



