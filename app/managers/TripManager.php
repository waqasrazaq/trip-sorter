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
        $html = "<ol>";
        foreach( $this->boardingCards as $card){
            $html .= '<li>' . $card->toString() . '</li>' ;
        }
        $html .= '<li>You have arrived at your final destination.</li> </ol>';

        return $html;
    }
}