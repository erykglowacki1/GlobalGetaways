<?php
//require "../../connection/config.php";
//require "../../connection/connectionToDB.php";
require "../../common.php";
require "../Payment.php";

class PaymentFormPartitionEquivalence
{
    // Fake product and user IDs for testing
    public $product_id = 150;
    public $user_id = 1;

    public static function insertIntoPaymentTest($cardNum, $ownerName, $product_id, $user_id): string
    {
        require "../../connection/config.php";
        require "../../connection/connectionToDB.php";
        // Start the session
        session_start();

        try {

            // Create an instance of Payment with form data
            $payment = new Payment($cardNum, $ownerName, $product_id, $user_id);


            $sql = "INSERT INTO Payment (CardNum, ownerName, Product_id, User_id) VALUES (:cardNum, :ownerName, :product_id, :user_id)";
            $statement = $connection->prepare($sql);
            $statement->bindParam(':cardNum', $payment->getCardNum());
            $statement->bindParam(':ownerName', $payment->getOwnerName());
            $statement->bindParam(':product_id', $product_id);
            $statement->bindParam(':user_id', $user_id);
            $statement->execute();

            $_SESSION['useMileagePoints'] = isset($_POST['useMileagePoints']) && $_POST['useMileagePoints'] == 'yes';

            // Return success message
            return "Successfully added";
        } catch (PDOException $error) {
            return $sql . "<br>" . $error->getMessage();
        }
    }

    public function testingInsertedValues(): void
    {
//        //Self: call taken from this link https://stackoverflow.com/questions/151969/when-should-i-use-self-over-this
//        // Test  1: Valid card number and owner name
//        $result1 = self::insertIntoPaymentTest('1234567890123456', 'John Doe', $this->product_id, $this->user_id);
//        echo "Test case 1: $result1";

//        // Test  2: Invalid card number length and correct Owner name
//        $result2 = self::insertIntoPaymentTest('123456789012345', 'John Doe', $this->product_id, $this->user_id);
//        echo "Test case 2: $result2";
//
//        // Test  3: 3.	Valid Card Num and Empty Owner Name
//        $result3 = self::insertIntoPaymentTest('1234567890123456', '', $this->product_id, $this->user_id);
//        echo "Test case 3: $result3";
//////
//        // Test  4: Valid Card Num and Invalid Owner Name
//        $result4 = self::insertIntoPaymentTest('1234567890123456', 'John Doe123',$this->product_id, $this->user_id);
//        echo "Test  4: $result4";

//        // Test  5:	Empty Card Num and valid owner name
//        $result5 = self::insertIntoPaymentTest(, 'John Doe', $this->product_id, $this->user_id);
//        echo "Test case 5: $result5";
//
///        // Test  6:	Empty
//        $result6 = self::insertIntoPaymentTest('', 'John Doe', $this->product_id, $this->user_id);
//        echo "Test case 6: $result6";
//          ///        // Test  7:	Empty User ID
//        $result7 = self::insertIntoPaymentTest('1234567890123456', 'John Doe', $this->product_id, );
//        echo "Test case 7: $result7";
//          ///      // Test  8:	Empty Product ID
//        $result6 = self::insertIntoPaymentTest('1234567890123456', 'John Doe', , $this->user_id);
//        echo "Test case 6: $result6";

    }
}

$validationTest = new PaymentFormPartitionEquivalence();
$validationTest->testingInsertedValues();
