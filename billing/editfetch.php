<?php
         $customer_details = "";
        $invoice = "";
         $date = "";
         $customer_tin_number = "";
         $item_name = "";
         $cost = "";
         $quantity ="";
         $price ="";
         $total ="";
         $tax ="";
         $balance = "";
        
 if(isset($_post['invoice']))
 {
     try {
         $pdoconnect = new PDO("mysql:host=localhost;dbname=billing","root","");
     } catch (PDOException $exc) {
         echo $exc->getMessage();
         exit();
     }
$invoice = $_post['invoice'];
$pdoQuery = "SELECT * from demo WHERE invoice=:invoice";
$pdoResult = $pdoconnect->prepare($pdoQuery);
$pdoExec = $pdoResult->execute(array(":invoice"=>$invoice));
if($pdoExec)
{
  if($pdoResult->rowcount()>0)
  {
      foreach($pdoResult as $row)
      {
         $customer_details = $row['customer_details'];
         $date = $row['date'];
         $customer_tin_number = $row['customer_tin_number'];
         $item_name = $row['item_name'];
         $cost = $row['cost'];
         $quantity = $row['quantity'];
         $price = $row['price'];
         $total = $row['total'];
         $tax = $row['tax'];
         $balance = $row['balance'];
      }
  }
  else
      {
      echo'No Data With This Id';
  }
 }else{
     echo'ERROR data not Inserted';
 }
 }
        ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title> PHP SEARCH DATA USING PDO</title>
    </head>
    <body>
        <form action="php_search_in_mysql_database_using_pdo.php"method="post">
            customer_details:  <input type="text" name="customer_details"value="<?php echo $customer_details;?>"><br><br>
                   invoice:  <input type="text" name="invoice"value="<?php echo $invoice;?>"><br><br>
   date:  <input type="text" name="date"value="<?php echo $date;?>"><br><br>
           customer_tin_number:  <input type="text" name="customer_tin_number"value="<?php echo $customer_tin_number;?>"><br><br>
           item_name:<input type="text" name="item_name"value="<?php echo $item_name;?>"><br><br>
             cost:<input type="text" name="cost"value="<?php echo $cost;?>"><br><br>
              quantity:<input type="text" name="quantity"value="<?php echo $quantity;?>"><br><br>
               price:<input type="text" name="price"value="<?php echo $price;?>"><br><br>
                total:<input type="text" name="total"value="<?php echo $total;?>"><br><br>
                  tax:<input type="text" name="tax"value="<?php echo $tax;?>"><br><br>
                    balance:<input type="text" name="balance"value="<?php echo $balance;?>"><br><br>
                         <input type="submit" name="find" value="find data">
                          
                    
        </form>