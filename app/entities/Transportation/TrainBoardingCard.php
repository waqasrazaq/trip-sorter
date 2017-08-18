<?php
namespace TripSorter\Entities\Transportation;

/**
 * Class TrainBoardingCard
 * @package TripSorter\Entities\Transportation
 */
class TrainBoardingCard extends AbstractBoardingCard
{
    /**
     * @var
     */
    private $train;

    /**
     * TrainBoardingCard constructor.
     * @param $fromLocation
     * @param $toLocation
     * @param null $seatNumber
     * @param $train
     */
    function __construct($fromLocation, $toLocation, $seatNumber, $train)
    {
        parent::__construct($fromLocation, $toLocation, $seatNumber);
        $this->train = $train;
    }

    /**
     * @return string
     */
    public function toString()
    {
        return 'Take train ' . $this->train . ' from ' . $this->getFromLocation() . ' to ' . $this->getToLocation() . '. Sit in seat ' . $this->getSeatNumber() . '.';
    }
}