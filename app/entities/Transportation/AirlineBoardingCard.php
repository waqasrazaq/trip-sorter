<?php

namespace TripSorter\Entities\Transportation;


/**
 * Class AirlineBoardingCard
 * @package TripSorter\Entities\Transportation
 */
class AirlineBoardingCard extends AbstractBoardingCard {
    /**
     * @var
     */
    /**
     * @var
     */
    /**
     * @var null
     */
    private $flight, $gate, $counter;

    /**
     * AirlineBoardingCard constructor.
     * @param $fromLocation
     * @param $toLocation
     * @param null $seatNumber
     * @param $flight
     * @param $gate
     * @param null $counter
     */
    function __construct($fromLocation, $toLocation, $seatNumber, $flight, $gate, $counter=null) {
        parent::__construct($fromLocation, $toLocation, $seatNumber);

        $this->flight = $flight;
        $this->gate = $gate;
        $this->counter = $counter;
    }

    /**
     * @return string
     */
    public function toString() {
        return 'From ' . $this->getFromLocation() . ', take flight ' . $this->flight . ' to ' . $this->getToLocation() . '. Gate ' . $this->gate . ', seat ' . $this->seatNumber . '. ' . ($this->counter ? 'Baggage drop at ticket counter ' . $this->counter . '.' : 'Baggage will be automatically transferred from your last leg.');
    }
}