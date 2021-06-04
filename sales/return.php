<?php     

require "../script/php/connect.php";







	if(isset($_GET['stock_id']) && isset($_GET['invoice_id']))  {

								

								 $stock_id = addslashes(htmlentities($_GET['stock_id'])) ;

								 $invoice_id = addslashes(htmlentities($_GET['invoice_id'])) ;

								$update_stock = new run_query("update stock set status='3' where id='$stock_id'  and status='1' ");

								$update_invoice = new run_query("update sales  set status='RETURNED', balance_amt='0' where invoice_id='$invoice_id'  and amt_paid='0.00' ");

								

														 echo "<script>

																	alert('Laptop Returned! ');

																		window.location.replace(\"return.php\");

																													

																</script>"; 

														

														}

														

?>



<!doctype html>



<html>

	<head>



<?php     





$active= "search_stock";



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



   <title> RETURN ITEM - OYEMART COMPUTERS </title>

<style>

















</style>

	

	</head>



<body>

	<?php     

require "../script/php/header_sales.php";





$user_location20 =$user_location;

?>	

   <div class="container">

   <h1 style='font-family:arial' align='center' class=' tada blue-text'> <i class='fa fa-search'></i> RETURN AN ITEM </h1>

<br/>



     <div class="row">

	

	

		<div class="col m1 l1 s0"></div>

		

		<div class="col m10 l10 s12">

			<div class="card z-depth-1 blue-text" style='border-radius:30px; background-color:#fbe9e7;'>

            <div class="card-content">


            	<form method='post'>


<!-- row starts -->
<div class='row'>

  
  <div class="col m1 l1 s0"></div>


<!-- location select starts here -->
  <div class="input-field col m3 l3 s12">

          <select required name='stock_location'>

          <?php 

            $loca_selec= " disabled='disabled' ";
            if ($user_permission ==1){

             echo " <option value='all'   >All Location </option>";
              $loca_selec= "";
            }
            
                $sql_location = "select id as location_id, name as location_name from $db1.business_locations ";

          $get_locations = $connect ->query($sql_location); 

          while ($get_locations_data = $get_locations ->fetch(PDO::FETCH_BOTH)){

                extract($get_locations_data );

                if( $location_id == $user_location ){

                  echo "<option value='$location_id' selected > $location_name </option>";

                

                }else{

                    echo "<option value='$location_id' $loca_selec > $location_name </option>";

                  } 

                }

            ?>

        </select>

        <label> <b> Select Location </b> </label>

        </div>
        <!-- location select ends here -->



<!-- search type starts here -->
  <div class="input-field col m2 l2 s12">
     <select required name='search_column' required >
      <option value='model'   >Laptop Model </option>
      <option value='serial'   >Serial Number </option>
     </select>
  </div>
  <!-- search type ends here -->


<!-- search text starts here -->
  <div class="input-field col m3 l3 s12">
      <input id="email" type="text" required name='search'>  

          <label for="email"> <i class='fa fa-search'></i> From Stock  </label>

</div>
<!-- search text ends here -->


<!-- search btn starts here -->
  <div class="input-field col m1 l1 s12">
          <button type='submit' class='btn deep-orange pulse' name='view_stock'>   <i class='fa fa-search'></i></button>
</div>
<!-- search btn ends here -->
  


  </div>
  <!-- row closes -->




  <?php

              if( isset($_POST['view_stock']) ){ //btn isset starts here

                $stock_location = addslashes(htmlentities($_POST['stock_location']));
                $search_column = addslashes(htmlentities($_POST['search_column']));
                $search = addslashes(htmlentities($_POST['search']));
                 if( $stock_location ==='all'){
                     $get_stocks = new run_query("select * from stock where status=1 and $search_column  like '%$search%'  ");
                   }else{
                     $get_stocks = new run_query("select * from stock  where currentLocation='$stock_location' and status=1  and $search_column  like '%$search%'  ");
                 }

                   // num of rows starts 
                 if( $get_stocks->num_rows >= 1){  
                      $result_no = $get_stocks->num_rows;
                      echo "<h3 align='center'> $result_no Result(s) for $search ($search_column)</h3>";
                     $no =1;
                     while(  $get_stocks_data =  $get_stocks->result() ){ // the while loops starts
                      extract($get_stocks_data ); 
                      $price = number_format("$price",2,".",","); 

                    $sql_location = "select id as location_id, name as location_name from $db1.business_locations  where  id= '$currentLocation'  ";
                    $get_locations = $connect ->query($sql_location); 
                    $get_locations_data = $get_locations ->fetch(PDO::FETCH_BOTH);
                    extract($get_locations_data );  

                      $get_user = new run_query("select user_username as user_username1 from users where user_id= '$recordedBy' ");
                      $get_user_data =  $get_user->result();
                      extract($get_user_data );

                      $get_processor_type = new run_query("select * from laptop_processor_type where processor_id= '$processorType' ");
                      $get_processor_type_data =  $get_processor_type->result();
                      extract($get_processor_type_data );
                      
                        $get_scr = new run_query("select * from laptop_screen where screen_id= '$screenSize' ");
                      $get_scr_data = $get_scr->result();
                      extract($get_scr_data );

                        $status = "<div style='color:red; font-weight:bold'>Sold</div>";
                 $btns = "";

  echo "      
 <ul class='collapsible popout ' data-collapsible='accordion'>
    <li>
      <div class='collapsible-header deep-orange white-text'>$no |  $model  ($RAM  RAM ) ($HDD  HDD)   </div>
          <div class='collapsible-body'>
            <div class='z-depth-3 ' style='padding:15px;'>
               <table class='bordered striped' >
                <tr><td>STOCK ID:  </td><td> $id </td></tr>
                 <tr><td>MODEL:  </td><td> $model  </td></tr>
                  <tr><td>SERIAL/IMEI:   </td><td> $serial  </td></tr>
                  <tr><td>BATERY SERIAL:    </td><td> $battSerial  </td></tr>
                  <tr><td>HARD DRIVE SIZE:    </td><td> $HDD  </td></tr>
                  <tr><td>HARD DRIVE TYPE:</td><td>$HDDtype</td></tr> <tr><td>EXTRA HARD DRIVE SIZE:    </td>
                  <td> $extraHDD </td></tr>  <tr><td>EXTRA HARD DRIVE TYPE:    </td>
                  <td> $extraHDDtype </td></tr>
                  <tr><td>RAM SIZE:   </td><td> $RAM  </td></tr>
                  <tr><td>RAM TYPE:   </td><td> $RAMtype </td></tr>
                  <tr><td>DEDICATED VIDEO RAM:   </td><td> $VRAM </td></tr>
                  <tr><td>PROCESSOR TYPE:   </td><td> $processor_type </td></tr>
                  <tr><td>SCREEN SIZE:   </td><td> $screen_size </td></tr>
                  <tr><td>CURRENT LOCATION:   </td><td> $location_name </td></tr>
                  <tr><td>STATUS:   </td><td> $status </td></tr>
                   <tr><td>PRICE:  </td><td> $price  </td></tr>
                    <tr><td>RECORDED BY:  </td><td> $user_username  </td></tr>
                  <tr><td>DATE ADDED:   </td><td> $dateRecorded </td></tr>
                   <tr><td>LAST UPDATE:   </td><td> $lastUpdate </td></tr>
               </table>
              </div>
            <br/><br/><br/> <b>COMMENTS</b><hr/>
            $comments

            <br/> <br/><br/> <b>ISSUES</b> <br/>
            $issues 
            <hr/>

            $btns           ";



            	$no++;

													

								$get_invoice = new run_query("select * from sales where stock_id ='$id' order by invoice_id desc");

													

								if( $get_invoice->num_rows >= 1){	

								$no =1;								

										while(	$get_invoice_data =	$get_invoice->result() ){

										

											extract($get_invoice_data );

											

											

											 $sql_location = "select id as location_id, name as location_name  from $db1.business_locations where  id= '$locationId'   ";

											$get_locations = $connect ->query($sql_location);	

											$get_locations_data = $get_locations ->fetch(PDO::FETCH_BOTH);

											extract($get_locations_data );

											

											$get_user = new run_query("select * from users where user_id= '$soldBy' ");

											$get_user_data =	$get_user->result();

											extract($get_user_data );

											

											$get_stock = new run_query("select * from stock where id= '$stock_id' ");

											$get_stock_data =	$get_stock->result();

											extract($get_stock_data ); extract($get_invoice_data );

											


											

											$add_payment ="";

												if($amt_paid =='0.00' and $balance_amt >=1 and $locationId ==$user_location20 ){

													

													$add_payment ="<a class='btn green ' href='return.php?stock_id=$id&invoice_id=$invoice_id' title='RETURN ITEM'>RETURN ITEM</a>";

												}

													$amount = number_format("$amount",2,".",","); 

												$amt_paid = number_format("$amt_paid",2,".",","); 

												$balance_amt = number_format("$balance_amt",2,".",","); 

													echo "			

													

															 <div class='blue lighten-5' style='padding:20px;'>

																	<h1 align='center'>CUSTORMER DETAILS</h1>

																  <table class='bordered striped z-depth-3 ' >

																  <tr> <td> <b>CUSTOMER NAME: </b></td> <td>    $buyerName</td>  </tr>

																 <tr> <td> <b>CUSTOMER ADDRESS: </b></td> <td>    $buyerAddress</td>  </tr>

																 <tr> <td> <b>CUSTOMER PHONE </b></td> <td>    $buyerPhone </td>  </tr>

																

																 </table>

																

																	<h1 align='center'>INVOICE DETAILS</h1>

																  

																

																   <table class='bordered striped z-depth-3 ' >

																   <tr> <td> <b>INVOICE NUMBER: </b></td> <td>   $invoiceNumber </td>  </tr>

																	 <tr> <td> <b> PHYSICAL INVOICE NUMBER: </b></td> <td>   $physicalInvoiceNumber </td>  </tr><tr> <td> <b> STATUS: </b></td> <td>   $status </td>  </tr>

																 

																   

																  <tr> <td> <b>SALE LOCATION: </b></td> <td>    $location_name </td>  </tr>

																	<tr> <td> <b> DATE SOLD: </b></td> <td>   $dateSold </td>  </tr>

																	 <tr> <td> <b> PRICE SOLD: </b></td> <td>  <b> $amount </b></td>  </tr>

																	<tr> <td> <b> AMOUNT PAID: </b></td> <td>   $amt_paid </td>  </tr>

																	 <tr> <td> <b> BALANCE : </b></td> <td style='color:red;'>   $balance_amt </td>  </tr>

																	



																	<tr> <td> <b>SOLD BY: </b></td> <td>   $user_username </td>  </tr>

																

																

																  </table>

																  

																  

																  

															

																  <br/><br/><br/> <b>COMMENTS</b><hr/>

																  $invoice_comments

																	<br/> <br/><br/> 

																	

																	$add_payment	

																  </div>   <br/><br/>   <br/><br/>

																

		

													

													

													";

													

													

													$no++;	

												}

								 

								}else{

											echo "<h6 align='center'class='red-text'>

											<br/><br/><br/>

											NO INVOICE FOUND...

									</h6>";

								}

							

										

															echo "   </div>

																			</li>

																			

																		 </ul>

																	";		               

                      } // the while loops ends
                   }else{ //else for number of rows
                      echo "<h3 align='center'>No Resut Found!</h3>";
                   }
                   // num of rows ends
              }  //btn isset starts here
  ?>

</form>











			

   </div>
   </div>
   </div>
   </div>
   </div>





	



<br/><br/><br/><br/>



<?php

 

require "../script/php/footer_home.php";

require "../script/mlc/script_foot.php";

?>





</body>



</html>

































