<?php

    //store user input into the variables
    $from = $_GET['from_acc_id'];
    $to = $_GET['to_acc_id'];
    $amount = $_GET['amount'];

    // test the transfer method
    $obj = new Transaction();

    // transfer 30K from from account 1 to 2
    $obj->transfer($from, $to, $amount);


    class Transaction{
        //creating connection to database
        

        const DB_HOST = 'localhost';
        const DB_NAME = 'banking';
        const DB_USER = 'root';
        const DB_PASSWORD = '';

    /**
     * Open the database connection
     */
        public function __construct() {
            // open database connection
            $conStr = sprintf("mysql:host=%s;dbname=%s", self::DB_HOST, self::DB_NAME);
            try {
                $this->pdo = new PDO($conStr, self::DB_USER, self::DB_PASSWORD);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        /**
        * PDO instance
        * @var PDO 
        */
        private $pdo = null;

        /**
        * Transfer money between two accounts
        * @param int $from
        * @param int $to
        * @param float $amount
        * @return true on success or false on failure.
        */
        public function transfer($from, $to, $amount) {

            try {

                $this->pdo->beginTransaction();

                $sql = "SELECT acc_balance FROM customers WHERE acc_id=:from";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute(array(":from"=> $from));
                $availableAmount = (int) $stmt->fetchColumn();
                $stmt->closeCursor();

                if($availableAmount < $amount){
                    echo "Insuficient amount to transfer";
                    return FALSE;
                }

                $sql_update_from = "UPDATE customers
                                    SET acc_balance = acc_balance - :amount 
                                    WHERE acc_id = :from";
                $stmt = $this->pdo->prepare($sql_update_from);
                $stmt->execute(array(":from" => $from, ":amount" =>$amount));
                $stmt->closeCursor();

                $sql_update_to = 'UPDATE customers
                                SET acc_balance = acc_balance + :amount
                                WHERE acc_id = :to';
                $stmt = $this->pdo->prepare($sql_update_to);
                $stmt->execute(array(":to" => $to, ":amount" => $amount));

                $insert_to_trasactions = "INSERT INTO `transactions`(`tran_from_acc_id`, `trans_to_acc_id`, `amount`) 
                                            VALUES (:from,:to,:amount) ";
                $stmt = $this->pdo->prepare($insert_to_trasactions);
                $stmt->execute(array(":from"=> $from, ":to" => $to, ":amount" => $amount));
                
                $this->pdo->commit();

                //echo 'The amount has been transferred successfully';

                header('location:money-transferred.php');

                return true;


            }
            catch(PDOException $e){
                $this->pdo->rollBack();
                die($e->getMessage());
            }

            
            // close the database connection
            $this->pdo = null;
            

        }

    }
?>