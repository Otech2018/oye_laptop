<?php     

require "../script/php/connect.php";


if ( !class_exists('NumbersToWords') ){
  /**
  * NumbersToWords
  */
  class NumbersToWords{
    
    public static $hyphen      = '-';
    public static $conjunction = ' and ';
    public static $separator   = ', ';
    public static $negative    = 'negative ';
    public static $decimal     = ' point ';
    public static $dictionary  = array(
      0                   => 'zero',
      1                   => 'one',
      2                   => 'two',
      3                   => 'three',
      4                   => 'four',
      5                   => 'five',
      6                   => 'six',
      7                   => 'seven',
      8                   => 'eight',
      9                   => 'nine',
      10                  => 'ten',
      11                  => 'eleven',
      12                  => 'twelve',
      13                  => 'thirteen',
      14                  => 'fourteen',
      15                  => 'fifteen',
      16                  => 'sixteen',
      17                  => 'seventeen',
      18                  => 'eighteen',
      19                  => 'nineteen',
      20                  => 'twenty',
      30                  => 'thirty',
      40                  => 'fourty',
      50                  => 'fifty',
      60                  => 'sixty',
      70                  => 'seventy',
      80                  => 'eighty',
      90                  => 'ninety',
      100                 => 'hundred',
      1000                => 'thousand',
      1000000             => 'million',
      1000000000          => 'billion',
      1000000000000       => 'trillion',
      1000000000000000    => 'quadrillion',
      1000000000000000000 => 'quintillion'
    );

    public static function convert($number){
      if (!is_numeric($number) ) return false;
      $string = '';
      switch (true) {
        case $number < 21:
            $string = self::$dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = self::$dictionary[$tens];
            if ($units) {
                $string .= self::$hyphen . self::$dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = self::$dictionary[$hundreds] . ' ' . self::$dictionary[100];
            if ($remainder) {
                $string .= self::$conjunction . self::convert($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = self::convert($numBaseUnits) . ' ' . self::$dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? self::$conjunction : self::$separator;
                $string .= self::convert($remainder);
            }
            break;
      }
      return $string;
    }
  }//end class
}//end if
/**
 * usage:
 */
 





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



   <title> INVOICE - OYEMART COMPUTERS </title>

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
   	<div>


<table >
   <tr>
      <td width="45%" > <a href="set_customer.php">  <img src="../script/img/logo.png" alt=" icon" height='45px' /></a> 
      <br/>
           <b> <i class="fa fa-globe"></i> www.oyemart.com <br/>
           <i class="fa fa-envelope"></i> sales@oyemart.com </b>
      
      </td>
      <td style="padding-left:70px; padding:10px;">
      <h2 align='center' style="color:#1565c0; line-height:2px; font-size:28px;;">OYEMART NIGERIA LTD.</h2>
      <center>
      <i style="font-size:13px;"><b>Information Technology Administrator and Merchants</b></i> <br/>
     
            <!-- <h3 style="color:orange; line-height:2px;">Head Office</h3> -->
            <p style="font-size:12px; font-weight:bold; line-height:15px;">
            76 TETOW ROAD OWERRI, IMO STATE  <br/>
            07010027465, 09094477365,  <i class="fa fa-whatsapp"></i> 08186318489 </p>
          
      </center>
      </td>
   </tr>
</table>

    <hr/>

     <table class="table-bordered table-stripped" widht="90%">
      <tr>
        <td width="65%"> 
        	 <span style="font-weight:bold; font-size:17px;"> <i class="fa fa-info-circle"></i> Customer Info</span> <br/>
            <div style="font-size:15px;">
            
        	 <span> <i class="fa fa-user"></i> <?php if(isset($_GET['customer_name']))  { echo  $_GET['customer_name']; } ?></span><br/>
        	 <span> <i class="fa fa-map-marker"></i>  <?php if(isset($_GET['customer_address']))  { echo  $_GET['customer_address']; } ?></span><br/>
        	 <span> <i class="fa fa-phone"></i>  <?php if(isset($_GET['customer_phone']))  { echo  $_GET['customer_phone']; } ?> </span>
            </div>
        </td>



        <td> 
        	 <span style="font-weight:bold; font-size:15px;">
              Invoice:  <?php echo $invoiceNumber; ?> <br/>
              Internal inventory #:  <?php echo $physicalInvoiceNumber; ?>
            
             <br/>Date: <?php echo $paymentDate; ?>
            </span>
        </td>
      </tr>
       

     </table>
     	<h3 align="center" style="font-weight:bold;">Description of Products/Services</h3><hr/>
     <div style="text-align: left; padding:14px; font-size:15px;">
     Model: 	<?php echo $model ; ?><br/>
     Serial:  <?php echo  $serial  ; ?> <br/>
     Battery Serial:  <?php echo  $battSerial ; ?> <br/>
     Ram:  <?php echo  $RAM  ; ?> <br/>
     Hard Disk:  <?php echo  $HDD ; ?> <br/>  
     Processor Type:  <?php echo  $processor_type ; ?> <br/>  

     Comments:  <?php echo  $invoice_comments ; ?> <br/>  

     <!-- Processor:  <?php echo  $processorType." ". $processorSpeed; ?>  <br/> -->

     </div> <hr/>

      <span style="font-weight:bold; font-size:17px;"> 
         Price:  &#8358;<?php echo number_format("$invoiceAmount",2,".",","); ; ?>, &nbsp;
         Paid: &#8358;<?php echo number_format("$totalAmountPaid",2,".",","); ; ?>, &nbsp;
         Amount due: &#8358;<?php echo number_format("$balance",2,".",","); ; ?>, &nbsp;
<br/>
Amount  in words: <i><?php echo NumbersToWords::convert($invoiceAmount);   ?> naira only </i>
      </span> 
 
           <center>
            <hr>
              <span style="font-size:13px;">
              <b> Bank Name:  </b> <?php echo  $bank_name ; ?>, &nbsp; 
              <b> Bank Account Number: </b>  <?php echo  $bank_acc_no ; ?>  <br/> 
              <b> Bank Account Name: </b>   <?php echo  $bank_acc_name ; ?> 
              </span>

        	</center>
<hr>
<i style="font-size:13px; font-weight:bold;">
By signing, the customer agrees to the following terms: <br/>
Products sold in good condition cannot be returned or exchanged after payment, 
except on warranty basis and stated on this invoice. <br/>
Customers have one week from the date on this invoice to report
 any issues with batteries. Used laptops/phones have a warranty of  
 two weeks from the date on this invoice. <br/>
Warranty for new products are based on the manufacturers' policies. <br/>
Oyemart reserves the right to cancel any transaction and issue a refund 
if payment is not received before the payment deadline stated here. <br/>
Products with physical damages/dents will not be accepted as returns. <br/>
Product screens, keyboards, touch pads and chargers/adapters are not 
covered by any warranty once tested ok. 


</i>


<br><br> <br> <br>

<table>
   <tr>
      <td style="padding-right:30px; text-align:center; font-size:16px;">
      <hr>
      Customer Sign<br/> &nbsp;
      
      </td>

      <td style="padding-left:30px; text-align:center; font-size:16px;">
      <hr>
      <?php echo $user_username; ?> <br/>(Oyemart LTD)

      
      </td>
   </tr>
</table>
 </div>


   </div>




<center>
	<br/>
<a href="#!" onclick="print();" class="btn no-print"><i class="fa fa-print"></i> Print</a>

</center>




<?php

 

require "../script/php/footer_home.php";

require "../script/mlc/script_foot.php";

?>





</body>



</html>

































