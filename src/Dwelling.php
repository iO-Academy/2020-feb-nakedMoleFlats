<?php

namespace NMF;

class Dwelling
{
    private $dwellingId;
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



    /**
     * Get the value of agentRef
     * 
     * @return string
     */
    public function getAgentRef(): string
    {
        return $this->agentRef;
    }

    /**
     * Get the value of address1
     * 
     * @return string
     */
    public function getAddress1(): string
    {
        return $this->address1;
    }

    /**
     * Get the value of address2
     * 
     * @return string
     */
    public function getAddress2(): string
    {
        return $this->address2;
    }

    /**
     * Get the value of town
     * 
     * @return string
     */
    public function getTown(): string
    {
        return $this->town;
    }

    /**
     * Get the value of postcode
     * 
     * @return string
     */
    public function getPostcode(): string
    {
        return $this->postcode;
    }

    /**
     * Get the value of description
     * 
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Get the value of bedrooms
     * 
     * @return string
     */
    public function getBedrooms(): string
    {
        return $this->bedrooms;
    }

    /**
     * Get the value of price
     * 
     * @return string
     */
    public function getPrice(): string
    {
        return number_format($this->price);
    }

    /**
     * Get the value of image
     * 
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * Get the value of type
     * 
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Get the value of status
     * 
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * Get the value of dwellingId
     * 
     * @return string
     */ 
    public function getDwellingId(): string
    {
        return $this->dwellingId;
    }
}
