<?php

require '../../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use NMF\DisplayDwellings;
use NMF\Dwelling;

class FunctionTest extends TestCase {

    //success test
    public function testSuccessDisplayDwellings()
    {
        $fakeDwelling = $this->createMock(Dwelling::class);
        $fakeDwelling->expects($this->once())
        ->getAgentRef()
        ->willReturn('Alex M');
        $fakeDwelling->expects($this->once())
        ->getAddress1()
        ->willReturn('Mayden Academy');
        $fakeDwelling->expects($this->once())
        ->getAddress2()
        ->willReturn('1 Widcombe Crescent');
        $fakeDwelling->expects($this->once())
        ->getTown()
        ->willReturn('Bath');
        $fakeDwelling->expects($this->once())
        ->getPostcode()
        ->willReturn('BA2 6AH');
        //expected result
        //run test
    }
    //failure test
    public function testFailureDisplayDwellings()
    {
        //expected result
        //run test
    }
    //malformed code test
    public function testMalformedCodeDisplayDwellings()
    {
        //input
        //expect error
        //run test
    }
}