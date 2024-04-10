<?php

class Payment
{

    private $cardNum;
    private $ownerName;

    private $user_id;
    private $product_id;

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

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->product_id;
    }



    /**
     * @param $cardNum
     * @param $ownerName

     */




    /**
     * @return mixed
     */
    public function getCardNum()
    {
        return $this->cardNum;
    }

    /**
     * @return mixed
     */
    public function getOwnerName()
    {
        return $this->ownerName;
    }

    public static function settingPaymentInformation()
    {
        if (isset($_POST['submit'])) {

            require "common.php";
            try {
                require_once 'connection/connectionToDB.php';

                // Assuming user and product IDs arestored in the session
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