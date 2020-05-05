<?php

class Dwelling 
{
    private $agentRef;
    private $address1;
    private $address2;
    private $town;
    private $postcode;
    private $description;
    private $bedrooms;
    private $price;
    private $image;
    private $type;
    private $status;

    public function getAgentRef()
    {
        return $this->agentRef;
    }

    public function getAddress1()
    {
        return $this->address1;
    }

    public function getAddress2()
    {
        return $this->address2;
    }

    public function getTown()
    {
        return $this->town;
    }

    public function getPostcode()
    {
        return $this->postcode;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getBedrooms()
    {
        return $this->bedrooms;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getStatus()
    {
        return $this->status;
    }
}