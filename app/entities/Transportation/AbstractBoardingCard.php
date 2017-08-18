<?php
namespace TripSorter\Entities\Transportation;

/**
 * Class AbstractBoardingCard
 * @package TripSorter\Entities\Transportation
 */
abstract class AbstractBoardingCard {
    /**
     * @var
     */
    protected $fromLocation;
    /**
     * @var
     */
    protected $toLocation;
    /**
     * @var null
     */
    protected $seatNumber;

    /**
     * AbstractBoardingCard constructor.
     * @param $fromLocation
     * @param $toLocation
     * @param null $seatNumber
     */
    public function __construct($fromLocation, $toLocation, $seatNumber=null) {
        $this->fromLocation = $fromLocation;
        $this->toLocation = $toLocation;
        $this->seatNumber = $seatNumber;
    }

    /**
     * @return mixed
     */
    public abstract function toString();

    /**
     * @return mixed
     */
    public function getFromLocation() {
        return $this->fromLocation;
    }

    /**
     * @param $fromLocation
     */
    public function setFromLocation($fromLocation) {
        $this->fromLocation = $fromLocation;
    }

    /**
     * @return mixed
     */
    public function getToLocation() {
        return $this->toLocation;
    }

    /**
     * @param $toLocation
     */
    public function setToLocation($toLocation) {
        $this->toLocation = $toLocation;
    }

    /**
     * @return null
     */
    public function getSeatNumber() {
        return $this->seatNumber;
    }

    /**
     * @param $seatNumber
     */
    public function setSeatNumber($seatNumber) {
        $this->seatNumber = $seatNumber;
    }
}