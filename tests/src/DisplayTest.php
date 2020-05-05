<?php

require 'vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use NMF\DisplayDwellings;
use NMF\Dwelling;

class FunctionTest extends TestCase {

    //success test
    public function testSuccessDisplayDwellings()
    {
        $fakeDwelling = $this->createMock(Dwelling::class);
        $fakeDwelling->expects($this->once())
        ->method('getAgentRef')
        ->willReturn('Alex M');
        $fakeDwelling->expects($this->once())
        ->method('getAddress1')
        ->willReturn('Mayden Academy');
        $fakeDwelling->expects($this->once())
        ->method('getAddress2')
        ->willReturn('1 Widcombe Crescent');
        $fakeDwelling->expects($this->once())
        ->method('getTown')
        ->willReturn('Bath');
        $fakeDwelling->expects($this->once())
        ->method('getPostcode')
        ->willReturn('BA2 6AH');
        $fakeDwelling->expects($this->once())
        ->method('getDescription')
        ->willReturn('This is a house');
        $fakeDwelling->expects($this->once())
        ->method('getBedrooms')
        ->willReturn(5);
        $fakeDwelling->expects($this->once())
        ->method('getPrice')
        ->willReturn(3000000);
        $fakeDwelling->expects($this->once())
        ->method('getImage')
        ->willReturn('../../src/images/testpic.jpeg');
        $fakeDwelling->expects($this->once())
        ->method('getType')
        ->willReturn('Sale');
        $fakeDwelling->expects($this->once())
        ->method('getStatus')
        ->willReturn('Sold');

        //expected result
        $expected = 
        '<div class="dwellingContainer">'    
             . '<div class="dwellingImageContainer">'
                     . '<img class="dwellingMainImage" src="../../src/images/testpic.jpeg">'
                     . '<div class="imageStatusText">SOLD</div>'
                    
             . '</div>'
        
             . '<div class="dwellingInfo">'
                 . '<div class="price">£3000000</div>'
                 . '<hr>'
                 . '<div class="dwellingAddress info">Mayden Academy, 1 Widcombe Crescent, Bath</div>'
                 . '<div class="dwellingPostcode" info>BA2 6AH</div>'
                 . '<div class="dwellingStatus info">SOLD</div>'
                 . '<div class="dwellingBedrooms info"><i class="fas fa-bed"></i>5 bedrooms</div>'
                 . '<!-- <button class="viewPropertyButton"><a>View Property</a></button> -->'
             . '</div>'
         . '</div>';
        
        //run test
        $testDwellings = [$fakeDwelling];

        $result = DisplayDwellings::loadAllDwellings($testDwellings);
        $this->assertEquals($expected, $result);
    }
    //failure test
    public function testFailureDisplayDwellings()
    {
        //expected result
        $expected = 
        '<div class="dwellingInfo">'
            . '<div class="noDwellingsFound">'
                . 'Uh-Oh! It looks like something\'s gone wrong on our end. We\'ll have this fixed as soon as possible. Please try again later.'
            . '</div>'
        . '</div>';
        //run test
        $result = DisplayDwellings::loadAllDwellings([]);
        $this->assertEquals($expected, $result);
    }
    //malformed code test
    public function testMalformedCodeDisplayDwellings()
    {
        //expect error
        $this->expectException(TypeError::class);
        //run test
        $result = DisplayDwellings::loadAllDwellings('Mayden Academy');
    }
}