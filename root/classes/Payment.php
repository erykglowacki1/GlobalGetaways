<?php

class Payment
{

    private string $cardNum;
    private string $ownerName;

    private int $user_id;
    private int $product_id;

    /**
     * @param $cardNum
     * @param $ownerName
     * @param $user_id
     * @param $product_id
     */
    public function __construct($cardNum, $ownerName, $user_id, $product_id)
    {
        $this->cardNum = $cardNum;
        $this->ownerName = $ownerName;
        $this->user_id = $user_id;
        $this->product_id = $product_id;
    }

    public function displayPaymentInfo()
    {
        echo "Card Number: " . $this->getCardNum() . "\n";
        echo "Owner Name: " . $this->getOwnerName() . "\n";
        echo "User ID: " . $this->getUserId() . "\n";
        echo "Product ID: " . $this->getProductId() . "\n";
    }

    public function getCardNum(): int
    {
        // Check if the card number is empty or contains non-numeric characters
        if ($this->cardNum === 0 || !is_numeric($this->cardNum)) {
            throw new InvalidArgumentException('Card number must be a non-empty numeric value');
        }

        // Check if the length of the card number is exactly 16 characters
        if (strlen((string) $this->cardNum) !== 16) {
            throw new InvalidArgumentException('Card number must be exactly 16 characters');
        }

        return $this->cardNum;
    }

    public function setCardNum(int $cardNum): void
    {
        $this->cardNum = $cardNum;
    }

    public function getOwnerName(): string
    {
        // Check if the owner name is empty
        if (empty($this->ownerName)) {
            throw new InvalidArgumentException('Owner name cannot be empty');
        }

        // Check if the owner name contains numbers
        if (is_numeric($this->ownerName)) {
            throw new InvalidArgumentException('Owner name cannot contain numbers');
        }

        return $this->ownerName;
    }

    public function setOwnerName(string $ownerName): void
    {
        $this->ownerName = $ownerName;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
    }

    public function getProductId(): int
    {
        return $this->product_id;
    }

    public function setProductId(int $product_id): void
    {
        $this->product_id = $product_id;
    }



    public static function settingPaymentInformation()
    {
        if (isset($_POST['submit'])) {

           require "common.php";
            try {
                require_once 'connection/connectionToDB.php';

                // Assuming user and product IDs are stored in the session
                $product_id = $_SESSION['product_id'];
                $user_id = $_SESSION['user_id'];

                // Create an instance of Payment with form data
                $payment = new Payment($_POST['CardNum'], $_POST['ownerName'], $product_id, $user_id);


                $sql = "INSERT INTO Payment (CardNum, ownerName, Product_id, User_id) VALUES (:cardNum, :ownerName, :product_id, :user_id)";
                $statement = $connection->prepare($sql);
                $statement->bindParam(':cardNum', $payment->getCardNum());
                $statement->bindParam(':ownerName', $payment->getOwnerName());
                $statement->bindParam(':product_id', $product_id);
                $statement->bindParam(':user_id', $user_id);
                $statement->execute();


                $_SESSION['useMileagePoints'] = isset($_POST['useMileagePoints']) && $_POST['useMileagePoints'] == 'yes';


                header("Location: final.php");
                exit();
            } catch(PDOException $error) {
                echo $sql . "<br>" . $error->getMessage();
            }
        }
    }

    public static function checkForPassedIds()
    {
        // Check if the product_id is set in the session
        if (isset($_SESSION['product_id'])) {
            $product_id = $_SESSION['product_id'];
            echo "Product ID: $product_id";
        } else {
            echo "Product ID not found in session.";
        }

// Check if the user_id is set in the session
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            echo "User ID: $user_id";
            // Now you can use $user_id on this page
        } else {
            echo "User ID not found in session.";
        }
    }


}
?>