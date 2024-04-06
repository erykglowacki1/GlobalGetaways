<?php
class finalSummary
{
    public static function displayBookingInformation() {
        global $connection;

        if(isset($_SESSION['product_id'])) {
            try {
                $sql = "SELECT 
                            User.FullName,
                            Destination.City AS Destination,
                            Activity.Equipment AS SelectedActivity,
                            Hotel.HotelName AS SelectedHotel,
                            (Activity.Price + Destination.Price + Hotel.Price) AS TotalPrice
                        FROM 
                            User
                        JOIN 
                            Payment ON User.id = Payment.User_id
                        JOIN 
                            Product ON Payment.Product_id = Product.id
                        JOIN
                            Destination ON Product.Destination_id = Destination.id
                        LEFT JOIN
                            Activity ON Product.Activity_id = Activity.id
                        LEFT JOIN
                            Hotel ON Product.Hotel_id = Hotel.id
                        WHERE
                            Product.id = :product_id";

                $stmt = $connection->prepare($sql);
                $stmt->bindParam(':product_id', $_SESSION['product_id']);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                if($row) {
                    echo "Full Name: " . $row['FullName'] . "<br>";
                    echo "Destination: " . $row['Destination'] . "<br>";
                    echo "Selected Activity: " . $row['SelectedActivity'] . "<br>";
                    echo "Selected Hotel: " . $row['SelectedHotel'] . "<br>";
                    echo "Total Price: $" . $row['TotalPrice'] . "<br><br>";
                } else {
                    echo "No transaction found for the current session.";
                }
            } catch (PDOException $error) {
                echo "An error occurred: " . $error->getMessage();
            }
        } else {
            echo "No transaction found for the current session.";
        }
    }
}
