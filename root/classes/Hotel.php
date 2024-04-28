<?php

class Hotel
{
    private int $HotelId;

    //primary key
    private string $hotelName;
    private int $numRooms;
    private int $price;

    private int $destinationid;

    //getters and setters

    /**
     * @param $hotelName
     * @param $numRooms
     * @param $price
     * @param $destinationid
     */
    public function __construct($hotelName, $numRooms, $price, $destinationid)
    {
        $this->hotelName = $hotelName;
        $this->numRooms = $numRooms;
        $this->price = $price;
        $this->destinationid = $destinationid;
    }

    public function getHotelId(): int
    {
        return $this->HotelId;
    }

    public function setHotelId(int $HotelId): void
    {
        $this->HotelId = $HotelId;
    }

    public function getHotelName(): string
    {
        return $this->hotelName;
    }

    public function setHotelName(string $hotelName): void
    {
        $this->hotelName = $hotelName;
    }

    public function getNumRooms(): int
    {
        return $this->numRooms;
    }

    public function setNumRooms(int $numRooms): void
    {
        $this->numRooms = $numRooms;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    public function getDestinationid(): int
    {
        return $this->destinationid;
    }

    public function setDestinationid(int $destinationid): void
    {
        $this->destinationid = $destinationid;
    }


    public function displayTestHotels()
    {
        echo "Hotel Name: " . $this->getHotelName() . "\n";
        echo "Number of Rooms: " . $this->getNumRooms() . "\n";
        echo "Price: " . $this->getPrice() . "\n";
    }

}

?>