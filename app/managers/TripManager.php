<?php
namespace TripSorter\Managers;

use \TripSorter\Entities\Transportation\AbstractBoardingCard;
use \TripSorter\Helpers\CommonHelper;

/**
 * Class TripManager
 * @package TripSorter\Managers
 */
class TripManager {
    /**
     * @var
     */
    private $boardingCards;


    /**
     * TripManager constructor.
     */
    public function __construct() {

    }

    /**
     * @return mixed
     */
    public function getBoardingCards() {
        return $this->boardingCards;
    }

    /**
     * @param AbstractBoardingCard $boardingCard
     */
    public function addCard(AbstractBoardingCard $boardingCard) {
        $this->boardingCards[] = $boardingCard;
    }


    /**
     *
     */
    public function sortBoardingCards() {
         $this->boardingCards = CommonHelper::sortBoardingCardCollection($this->boardingCards);
    }

    /**
     * @return string
     */
    public function getBoardingCardHTMLList() {
        $html = "";
        foreach( $this->boardingCards as $card){
            $html .= $card->toString() . '<br/>' ;
        }
        $html .= 'You have arrived at your final destination.';

        return $html;
    }
}