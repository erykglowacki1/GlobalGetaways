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
                            COALESCE(Activity.Equipment, 'None') AS SelectedActivity,
                            COALESCE(Hotel.HotelName, 'None') AS SelectedHotel,
                            (COALESCE(Activity.Price, 0) + Destination.Price + COALESCE(Hotel.Price, 0)) AS TotalPrice
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
                    $originalTotalPrice = $row['TotalPrice']; // Store the original total price
                    $useMileagePoints = isset($_SESSION['useMileagePoints']) && $_SESSION['useMileagePoints'];
                    $mileagePointsDiscount = 0;

                    if ($useMileagePoints) {
                        // Calculate the mileage points and discount
                        $percentage = rand(5, 10) / 100;
                        $mileagePointsValue = $originalTotalPrice * $percentage;
                        $mileagePointsDiscount = min($originalTotalPrice, $mileagePointsValue);
                    }

                    $finalTotalPrice = $originalTotalPrice - $mileagePointsDiscount; // Calculate final price after discount

                    echo "<p><span>Full Name:</span> " . htmlspecialchars($row['FullName']) . "</p>";
                    echo "<p><span>Destination:</span> " . htmlspecialchars($row['Destination']) . "</p>";
                    echo "<p><span>Selected Activity:</span> " . htmlspecialchars($row['SelectedActivity']) . "</p>";
                    echo "<p><span>Selected Hotel:</span> " . htmlspecialchars($row['SelectedHotel']) . "</p>";
                    echo "<p><span>Total Price:</span> €" . number_format($originalTotalPrice, 2) . "</p>";

                    if ($useMileagePoints) {
                        echo "<p><span>Mileage Points Used:</span> " . number_format($mileagePointsDiscount / 0.50, 0) . "</p>";
                        echo "<p><span>Mileage Points Discount:</span> €" . number_format($mileagePointsDiscount, 2) . "</p>";
                    }

                    echo "<p><span>Total Amount after Discount:</span> €" . number_format($finalTotalPrice, 2) . "</p>";
                } else {
                    echo "<p>No transaction found for the current session.</p>";
                }
            } catch (PDOException $error) {
                echo "<p>An error occurred: " . $error->getMessage() . "</p>";
            }
        } else {
            echo "<p>No transaction found for the current session.</p>";
        }
    }
}
?>
