<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>GPP-Edit Bill</title>
	
	<link rel='stylesheet' type='text/css' href='css/style.css' />
	<link rel='stylesheet' type='text/css' href='css/print.css' media="print" />
	<script type='text/javascript' src='js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='js/edit_ex.js'></script> 

</head>

<style>
#t1{
	border:3px;
}
</style>
<body>
<!--<form method="GET" action="#">
invoice:<input type="text" name="invoice" id="invoice">
	<input type="submit" name="submit" value="update"/>
</form>-->
<?php
   ob_start();
   session_start();
?>
<?php 
$con=mysqli_connect('localhost','root','','billing');
if($con==false)
{
	die("Error".mysqli_connect_error());	
}
$in=$_GET['invoice'];
$sql="SELECT * FROM customer WHERE invoice='$in'";
if($res=mysqli_query($con,$sql))
{	
if(mysqli_num_rows($res)>0)
{
while($row=mysqli_fetch_array($res))
{
	$customer=$row['customer_details'];
	$date=$row['date'];
	$tin=$row['customer_tin_number'];
}
}
}
?>
	<form method="post" action="update_bill.php">
	<div id="page-wrap">
	<table id="t1">
	<tr><td width="10%"><img src="images/geo_logo.png" style="height:100px;width:150px; align:center" alt="logo" /></td>
	<td><center><h1>Geo Poly Pack</h1>
	<h4>2/1, Thattangadu,			
		Pugalur, Karur-639113
		Ph no: 9865888425
		TIN No: 33733765715</h4></center>
	</td></tr></table><hr> <hr> <hr>
<input type="button" value="Home" class = "form-control" style="float:right; color:red" onclick="window.location.href='hl.html'">
<!--<input type="button" value="Refresh" class = "form-control" style="float:right; color:red" onclick="window.location.href='refresh.php'">-->
<input type="button" value="Logout" class = "form-control" style="float:right; color:red" onclick="window.location.href='logout.php'">
		<div style="clear:both"></div>
		<div id="customer">
				
          			<textarea id="address" name="address" placeholder="customer details" style="border:1px solid black;"><?php echo $customer;?></textarea>

			<br><br>
			
            <table id="meta">
                <tr>
                    <td class="meta-head">Invoice #</td>
                    <td><textarea id="invoice"  name="invoice" placeholder="88888888"><?php echo $in;?></textarea></td>
                </tr>
                <tr>

                    <td class="meta-head">Date</td>
					<td><input type="date" name="date" value="<?php echo $date;?>"></td>
                    <!-- <td><textarea id="date" name="date">December 15, 2009</textarea></td> -->
                </tr>
				
				<tr>

                    <td class="meta-head">Customer TIN Number</td>
                    <td><textarea id="tin" name="tin" placeholder="Tin-Number"><?php echo $tin;?></textarea></td>
                </tr>
               

            </table>
		
		</div>
		
		<table id="items">
		
		  <tr>
		      <th style="width:25%;" >Item-Name</th>
		      <th style="width:25%;">Unit Cost (₹)</th>
		      <th style="width:25%;">Quantity</th>
		      <th style="width:25%;">Price (₹)</th>
		  </tr>
		  <?php		  
			$i=0;$taxpercent=0;$taxpercent1=0;
			$sql="SELECT DISTINCT tax,tax1 FROM demo WHERE invoice='$in' and item_name!=''";
			if($res=mysqli_query($con,$sql))
			{
				if(mysqli_num_rows($res)>0)
				{
					while($row=mysqli_fetch_array($res))
					{
						$taxpercent=$row['tax'];
						$taxpercent1=$row['tax1'];
					}
				}
			}
			$sql="SELECT * FROM demo WHERE invoice='$in'";
			if($res=mysqli_query($con,$sql))
			{
				if(mysqli_num_rows($res)>0)
				{
					while($row=mysqli_fetch_array($res))
					{
						//if(!empty(trim($row['item_name']))){
							$i++;
							echo "<tr class='item-row'>";
							echo "<input type='hidden' name='invoice".$i."' value='".$in."'/>";
							echo "<td class='item-name' ><textarea name='item_name".$i."' class='itemname' placeholder='item_name' style='text-align:center;'>".$row['item_name']."</textarea></td>";
							echo "<td><textarea name='cost".$i."' class='cost' placeholder='0.00'>".$row['cost']."</textarea></td>";
							echo "<td><textarea name='quantity".$i."' class='qty'>".$row['quantity']."</textarea></td>";
							echo "<td><textarea name='price".$i."' class='price'>".$row['price']."</textarea></td>";
							echo"<input type='hidden' class='total1' name='total".$i."' id='total1' value=".$row['total'].">";
							echo"<input type='hidden' class='tax2' name='tax1".$i."' value=".$taxpercent1.">";
							echo"<input type='hidden' class='tax1' name='tax".$i."' value=".$taxpercent.">";
							echo"<input type='hidden' class='due1' name='balance".$i."' value=".$row['balance'].">";
							echo "</tr>";
							echo "</form>";
						//}else{
							//echo "<tr class='item-row'>";
							echo"<input type='hidden' name='productcount' value='".$i."'/>";
							//echo "</tr>";
							//break;
						//}
					}
				}
			}
			?>
	<!--	<tr>
		      <td colspan="2"  class="blank" style="color:black; font:12px Helvetica; text-align:justify;"><b><u>DECLARATION</u>:</b> Certified that particular given are true and correct and the amount indicated represents actually charged and that there is no flow additional consideration directly from the buyer.</td>
		      <td   class="total-line balance">Total</td>
		      <td class="total-value"><textarea name="total" class="total" id="total">0.00</textarea></td>
		  </tr>
		  <tr>	
	          <td  colspan="2" class="blank" style="color:black; font:12px Helvetica;"><b><u> TERMS & CONDITIONS</u>:</b></td>
		      <td   class="total-line balance">Tax %</td>
		      <td class="total-value"><textarea name="paid" id="paid" placeholder="0"><?php echo $taxpercent;?></textarea></td>
		  </tr>
		  <tr>
		      <td  colspan="2" class="blank" style="color:black; font:12px Helvetica;">1.Subject to Karur jurisdication</td>
		      <td   class="total-line balance">Tax Value</td>
		      <td class="total-value"><textarea name="tax" class="tax" id="tax">0.00</textarea></td>	  
		  </tr>
		  <tr>
		      <td colspan="2"  class="blank" style="color:black; font:12px Helvetica;text-align:justify;">2.Interest at rate of 20% will be charged from the due date of payment is not then effected</td>
              <td   class="total-line balance"><textarea></textarea></td>
		      <td class="total-value"><textarea name="extra"  id="extra" placeholder="0"></textarea></td>	  
		  </tr>
		  <tr>		    
     		  <td colspan="2"  class="blank" style="color:black; font:12px Helvetica;text-align:justify;">3.Our Responsibility ceases after goods leaves our factory </td>
		      <td   class="total-line balance">Balance Due</td>
		      <td class="total-value"><textarea name="due" class="due" id="due">0.00</textarea></td>	  
		  </tr>
		-->
		   
		  
		  
		   <tr>
		      <td colspan="2"  class="blank" style="color:black; font:12px Helvetica; text-align:justify;"><b><u>DECLARATION</u>:</b> </td>
		      <td   class="total-line balance">Total</td>
		      <td class="total-value"><textarea name="total" class="total" id="total" readonly>0.00</textarea></td>
		  </tr>
		  <tr>
			<td colspan="2" class="blank" style="color:black;font:12px helvetica;text-align:justify;">
			Certified that particular given are true and correct and the amount indicated represents </td>
			<td class="total-line balance">Tax (12.5%)</td>
			<td class="total-value"><textarea name="paid1" id="paid1" placeholder="0"><?php echo $taxpercent1;?></textarea></td>
		  </tr>
		  <tr>	
	          <td colspan="2" class="blank" style="color:black; font:12px Helvetica;text-align:justify;">
			  actually charged and that there is no flow additional consideration directly from the buyer.</td>
		      <td   class="total-line balance">Tax (5%)</td>
		      <td class="total-value"><textarea name="paid" id="paid" placeholder="0"><?php echo $taxpercent;?></textarea></td>
		  </tr>
		  <tr>
		      <td  colspan="2" class="blank" style="color:black; font:12px Helvetica;"><u><b> TERMS & CONDITIONS </u>:</b></td>
		      <td class="total-line balance">Tax Value(12.5)</td>
		      <td class="total-value"><textarea name="tax1" class="tax1" id="tax1" readonly>
			  </textarea></td>	  
		  </tr>
		  <tr>
				<td  colspan="2" class="blank" style="color:black; font:12px Helvetica;"> 1.Subject to Karur jurisdication </td>
		      <td   class="total-line balance">Tax Value(5)</td>
		      <td class="total-value"><textarea name="tax" class="tax" id="tax" readonly>
			  </textarea></td>
		  </tr>
		  <tr>
		      <td colspan="2"  class="blank" style="color:black; font:12px Helvetica;text-align:justify;">2.Interest at rate of 20% will be charged from the due date of payment is not then effected</td>
              <td   class="total-line balance"><textarea></textarea></td>
		      <td class="total-value"><textarea name="extra"  id="extra" placeholder="0"></textarea></td>	  
		  </tr>
		  <tr>		    
     		  <td colspan="2"  class="blank" style="color:black; font:12px Helvetica;text-align:justify;">3.Our Responsibility ceases after goods leaves our factory </td>
		      <td   class="total-line balance">Balance Due</td>
		      <td class="total-value"><textarea name="due" class="due" id="due" readonly>0.00</textarea></td>	  
		  </tr>
		  <tr rowspan="2">		    
     		  <td colspan="2"  class="total-value" style="text-align:justify;"><center><pre style="color:black; font:12px Helvetica;">Recieved the above materials in good condition
		  
			  
Customer Signarure<pre></center></td>
     		  <td colspan="2"  class="total-value" style="text-align:justify;"><center><pre style="color:black; font:12px Helvetica;">For <b>GEO POLY PACK<p>
			  
			  
Proprietor/Authority Signature</center> </td>		 	  
		  </tr>
		  
		  
		</table>
		
		
		<!--<div id="terms">
		  <h5>Terms</h5>
		  <label>NET 30 Days. Finance Charge of 1.5% will be made on unpaid balances after 30 days.</label>
		</div>-->
	
	</div>
	<br>
		<center><button onclick="myFunction()" style="background-color:green; color:white; width:10%; padding:12px 15px;">PRINT</button>
			<input type="submit" value="SUBMIT"  style="background-color:green;color:white; width:10%; padding:12px 15px;"/></center>

		</form>
		<br><br>

	<script>
	
	function myFunction(){
		window.print();
	}
	
	

	
	</script>
	
</body>

</html>