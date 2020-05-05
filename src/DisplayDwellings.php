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
            $result .= "<div class=\"dwellingContainer\">"    
            . "<div class=\"dwellingImageContainer\">"
                    . "<img class=\"dwellingMainImage\" src=\"../../src/images/testpic.jpeg\">"
                    . $statusBox
            . "</div>"
       
            . "<div class=\"dwellingInfo\">"
                . "<div class=\"price\">£3000000</div>"
                . "<hr>"
                . "<div class=\"dwellingAddress info\">Mayden Academy, 1 Widcombe Crescent, Bath</div>"
                . "<div class=\"dwellingPostcode\" info>BA2 6AH</div>"
                . "<div class=\"dwellingStatus info\">SOLD</div>"
                . "<div class=\"dwellingBedrooms info\"><i class=\"fas fa-bed\"></i>5 bedrooms</div>"
                . "<!-- <button class=\"viewPropertyButton\"><a>View Property</a></button> -->"
            . "</div>"
        . "</div>";
        }

        return $result;
    }
}