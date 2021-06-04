<?php     

require "../script/php/connect.php";







	if(isset($_GET['invoice_id']))  {
$invoice_id = $_GET['invoice_id'];

		$sql_invoice = "select * from payments where invoiceNumber ='$invoice_id' ";

		$get_user = new run_query($sql_invoice);	

		$get_user_data =	$get_user->result();

			extract($get_user_data );


			$get_seller = new run_query("select * from users where user_id =$recordedBy ");	

		$get_seller_data =	$get_seller->result();

			extract($get_seller_data );		




			$product_ifo = new run_query("select * from stock where id =$stockId ");	

		$product_ifo_data =	$product_ifo->result();

			extract($product_ifo_data );				
					
         $sales_nfo = new run_query("select * from sales where stock_id =$stockId ");	

         $sales_nfo_d =	$sales_nfo->result();
   
            extract($sales_nfo_d );	


            $get_processor_type = new run_query("select * from laptop_processor_type where processor_id= '$processorType' ");

            $get_processor_type_data =	$get_processor_type->result();

            extract($get_processor_type_data );


            $acc_details = new run_query("select * from bank_details where 1 ");

            $acc_details_data =	$acc_details->result();

            extract($acc_details_data );


														

}else{
	echo "<script>
	window.location.replace(\"set_customer.php\");
		</script>";
}

														

?>



<!doctype html>



<html>

	<head>



<?php     


require "../script/mlc/script_head.php";

?>





<!-------

	<meta name="viewport" content="width=1024">

   



   <meta name="viewport" content="width=device-width, initial-scale=1">

	

	--->

	

	 <meta name="viewport" content="width=device-width, initial-scale=1">

	

    <meta name="description" content=" FAST AND AMAZING ">

    <meta name="keywords" content=" OYEMART COMPUTERS  ">

 <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="msapplication-tap-highlight" content="no">

    

  <meta http-equiv="pragma" content="no-cache" />



   <title> Reciept - OYEMART COMPUTERS </title>

   <style type="text/css">
   	
   	@media print
{    
    .no-print
    {
        display: none !important;
    }
}
   </style>


	</head>



<body>

<br/><br/>

   <div class="container">
   	<div style="border:5px solid black; border-radius: 50px; padding:20px; font-size:20px;">
<center>

<table >
   <tr>
      <td width="30%" > <a href="set_customer.php">  <img src="../script/img/logo.png" alt=" icon" width='70%' /></a> </td>
      <td style="padding-left:70px; padding:10px;">
      <h2 align='center' style="color:#1565c0; line-height:2px; font-size:30px;;">OYEMART NIGERIA LTD.</h2>
      <center>
      <i style="font-size:15px;"><b>Information Technology Administrator and Mechants</b></i> <br/>
     
            <!-- <h3 style="color:orange; line-height:2px;">Head Office</h3> -->
            <span style="font-size:14px; font-weight:bold;">
            76 TETOW ROAD OWERRI, IMO STATE <br/>
            07010027465, 09094477365,  <i class="fa fa-whatsapp"></i> 08186318489 </span>
          
      </center>
      </td>
   </tr>
</table>

    <hr/>

     <table class="table-bordered table-stripped" widht="90%">
      <tr>
        <td width="50%"> 
        	 <span style="font-weight:bold; font-size:23px;"> <i class="fa fa-info-circle"></i> Customer Info</span> <br/>
        	 <span> <i class="fa fa-user"></i> <?php if(isset($_GET['customer_name']))  { echo  $_GET['customer_name']; } ?></span><br/>
        	 <span <i class="fa fa-map-marker"></i>  <?php if(isset($_GET['customer_address']))  { echo  $_GET['customer_address']; } ?></span><br/>
        	 <span> <i class="fa fa-phone"></i>  <?php if(isset($_GET['customer_phone']))  { echo  $_GET['customer_phone']; } ?> </span>
        </td>



        <td> 
        	 <span style="font-weight:bold; font-size:23px;"> <i class="fa fa-gear"></i> Invoice: </span>
        	 <span style="font-weight: bold; font-size: 30px;">  <?php echo $invoiceNumber; ?></span> <br/>
        	 <span style="font-weight: bold; font-size: 15px; padding:5px; border-radius: 7px;" class="orange white-text"> Date: <?php echo $paymentDate; ?></span>

        </td>
      </tr>
       

     </table>
     	<span style="font-weight:bold;">Descriptions of Product/Services</span>
     <div style="height:270px; border-radius: 22px; border:1px solid black; text-align: left; padding:20px; font-size:17px;">
     Model: 	<?php echo $model ; ?><br/>
     Serial:  <?php echo  $serial  ; ?> <br/>
     Battery Serial:  <?php echo  $battSerial ; ?> <br/>
     Ram:  <?php echo  $RAM  ; ?> <br/>
     Hard Disk:  <?php echo  $HDD ; ?> <br/>  
     Physical Invoice:  <?php echo  $physicalInvoiceNumber ; ?> <br/>  
     Processor Type:  <?php echo  $processor_type ; ?> <br/>  

     Comments:  <?php echo  $invoice_comments ; ?> <br/>  

     <!-- Processor:  <?php echo  $processorType." ". $processorSpeed; ?>  <br/> -->

     </div>

        </center><br/>

         <span style="font-weight:bold; font-size:23px;"> Price: </span>
        	 <span style="font-weight: bold; font-size: 32px;"> &#8358;<?php echo number_format("$invoiceAmount",2,".",","); ; ?></span> <br/>
        	  <span style="font-weight:bold; font-size:23px;"> Paid: &#8358;<?php echo number_format("$totalAmountPaid",2,".",","); ; ?> </span> <br/>
        	   <span style="font-weight:bold; font-size:23px;"> Balance: &#8358;<?php echo number_format("$balance",2,".",","); ; ?> </span> <br/><br/>

           <center>
        	   <span style="font-weight: bold; font-size: 14px; padding:5px; border-radius: 7px;" class="orange white-text">Prepared and Checked by: <?php echo $user_username; ?> </span>
              <hr/>
              <span style="font-size:17px; font-weight:bold;">
              Bank Name:  <?php echo  $bank_name ; ?> <br/>  
              Bank Account Number:  <?php echo  $bank_acc_no ; ?> <br/>  
              Bank Account Name:  <?php echo  $bank_acc_name ; ?> <br/>  
              </span>

        	</center>

 </div>


   </div>




<center>
	<br/><br/>
<a href="#!" onclick="print();" class="btn no-print"><i class="fa fa-print"></i> Print</a>

</center>
<br/><br/><br/><br/>



<?php

 

require "../script/php/footer_home.php";

require "../script/mlc/script_foot.php";

?>





</body>



</html>

































