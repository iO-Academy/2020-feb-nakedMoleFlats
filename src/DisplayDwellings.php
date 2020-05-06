<?php

namespace NMF;

class DisplayDwellings
{
    public static function loadAllDwellings(Array $dwellingsToDisplay)
    {
        if (!count($dwellingsToDisplay)) {
            return         
            '<div class="dwellingInfo">'
            . '<div class="noDwellingsFound">'
                . 'Uh-Oh! It looks like something\'s gone wrong on our end. We\'ll have this fixed as soon as possible. Please try again later.'
            . '</div>'
            . '</div>';
        }
        
        $result = '';

        foreach($dwellingsToDisplay as $dwelling) {
            if($dwelling->getStatus()==='Sold' || $dwelling->getStatus()==='Let Agreed') {
                $statusCapitalized = strtoupper($dwelling->getStatus());
                $statusBox = "<div class=\"imageStatusText\">$statusCapitalized</div>";
            } else {
                $statusBox = '';
            }
            $result .= '<div class="dwellingContainer">'    
            . '<div class="dwellingImageContainer">'
                    . '<img class="dwellingMainImage" src="https://dev.maydenacademy.co.uk/resources/property-feed/images/' . $dwelling->getImage() . '">'
                    . $statusBox
            . '</div>'
            . '<div class="dwellingInfo">'
                . '<div class="price">£' . $dwelling->getPrice() . '</div>'
                . '<hr>'
                . '<div class="dwellingAddress info">' . $dwelling->getAddress1() . ', ' . $dwelling->getAddress2() . ', ' . $dwelling->getTown() . '</div>'
                . '<div class="dwellingPostcode info">' . $dwelling->getPostcode() . '</div>'
                . '<div class="dwellingStatus info">' . $dwelling->getStatus() . '</div>'
                . '<div class="dwellingBedrooms info"><i class="fas fa-bed"></i>' . ' ' . $dwelling->getBedrooms() . ' bedrooms</div>'
            . '</div>'
        . '</div>';
        }

        return $result;
    }
}