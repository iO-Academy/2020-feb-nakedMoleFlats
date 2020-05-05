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
    }
}