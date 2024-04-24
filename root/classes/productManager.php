<?php

class ProductManager {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function fetchPurchasedProducts($userId) {
        $sql = "SELECT 
                    Product.id,
                    Activity.Equipment,
                    Hotel.HotelName,
                    Destination.City,
                    Destination.Description,
                    Destination.Price as DestinationPrice,
                    COALESCE(Activity.Price, 0) as ActivityPrice,
                    COALESCE(Hotel.Price, 0) as HotelPrice
                FROM Product
                JOIN Payment ON Product.id = Payment.Product_id
                LEFT JOIN Activity ON Product.Activity_id = Activity.id
                LEFT JOIN Hotel ON Product.Hotel_id = Hotel.id
                LEFT JOIN Destination ON Product.Destination_id = Destination.id
                WHERE Payment.User_id = :userId";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>