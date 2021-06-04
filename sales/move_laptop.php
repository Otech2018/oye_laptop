<?php     

require "../script/php/connect.php";



?>



<!doctype html>



<html>

	<head>



<?php     





$active= "laptop_mgt";



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



   <title> MOVE LAPTOP - OYEMART COMPUTERS </title>

<style>

















</style>

	

	</head>



<body>

	<?php     

require "../script/php/header_sales.php";

$tdate = date('mYd');

$batch_id = "OYE-$user_id-$tdate";





if( isset($_GET['stock_id'])){

	$stock_id = addslashes(htmlentities($_GET['stock_id']));

	

	$check_lap_serail  =new run_query("select * from movements where stockId='$stock_id' and  batch_id='$batch_id' and status_move='NOT_SET' ");

						if( $check_lap_serail->num_rows >= 1){

							echo "<script>

							alert(\"LAPTOP Already in the Cart! \");

							window.location.replace(\"move_laptop.php\");

					</script>"; 

					

						}else{

			$add_item  =new run_query("insert into movements set stockId='$stock_id', batch_id='$batch_id', status_move='NOT_SET',sender='$user_id'  ");

			$check_lap_serail  =new run_query("update stock set status='4'   where id='$stock_id' ");

	

				echo "<script>

							window.location.replace(\"move_laptop.php\");

					</script>"; 						

						}

}









if( isset($_GET['del_cart'])){

	$del_cart = addslashes(htmlentities($_GET['del_cart']));

	$stock_id = addslashes(htmlentities($_GET['stock_id1']));

	

	$check_lap_serail  =new run_query("delete from movements where move_id='$del_cart' ");

	$check_lap  =new run_query("update stock set status='3'   where id='$stock_id' ");

	

							echo "<script>

							window.location.replace(\"move_laptop.php\");

					</script>"; 

					

}





if( isset($_POST['move_laptop'])){

	$move_comment = addslashes(htmlentities($_POST['move_comment']));

	$receiver_id = addslashes(htmlentities($_POST['receiver_id']));

	

	

	$destinationId = new run_query("select  user_location   as destination_Id from users  where user_id='$receiver_id'  ");

	$destinationId_data =	$destinationId->result();

										

											extract($destinationId_data );

	

	$check_lap_serail  =new run_query("update movements  set  m_comments='$move_comment' ,

																								receiver='$receiver_id', 

																								sender='$user_id',

																								status_move='PENDING',

																								sourceId='$user_location', 

																								moveDate='$reg_Date', 

																								destinationId='$destination_Id' where batch_id='$batch_id'  and status_move='NOT_SET' and sender='$user_id'  ");

	

					if( $check_lap_serail->num_rows >= 1){		

						echo "<script>

							alert('Movement Was Successfull ');

							window.location.replace(\"move_laptop.php\");

					</script>"; 

					

					}else{

					

					echo "<script>

							alert('Nothing In the Cart! ');

							window.location.replace(\"move_laptop.php\");

					</script>"; 

					

					}

					

}









?>	

   <div class="container">

   <h1 align='center' class=' tada blue-text'><i class='fa fa-search'></i>   MOVE LAPTOP </h1>

<br/>

<form method='post'>

  



  

      <div class="row">

	

	

		<div class="col m12 l12 s12">

			<div class="card z-depth-1 blue-text" style='border-radius:30px; background-color:#e8eaf6;'>

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
                     $get_stocks = new run_query("select * from stock where status=3 and $search_column  like '%$search%'  ");
                   }else{
                     $get_stocks = new run_query("select * from stock  where currentLocation='$stock_location' and status=3  and $search_column  like '%$search%'  ");
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

                      if ( $status == 2 ){
                        $status = "Not For Sale";
                      }else if ( $status == 3 ){
                        $status = " For Sale";
                      }else  if ( $status == 4 ){
                        $status = "<div style='color:red; font-weight:bold'>On Transit</div>";
                      }
                 $btns = "<a  href='move_laptop.php?stock_id=$id' class='btn green pulse '>  <i class='fa fa-plus'></i>  </a>";

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

            $btns                         

        </div>

    </li>
</ul>";

$no++;
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



	

	 <div class="row">

	

	

		<div class="col m6 l6 s12">

			<div class="card z-depth-1 blue-text" style='border-radius:30px; background-color:#f0f4c3;'>

            <div class="card-content">

			

			<table class='bordered striped '>

			

			<tr>

			<th> S/N </th>

			<th> STOCK ID</th>

			<th>MODEL</th>

		<th>ACTION</th>

			</tr>

			

			<?php 

					 $get_cart = new run_query("select * from movements  where batch_id='$batch_id' and status_move='NOT_SET' and sender='$user_id' ");

								

								if( $get_cart->num_rows >= 1){	

								$no =1;								

									while(	$get_cart_data =	$get_cart->result() ){

										

											extract($get_cart_data );

											

											$get_stock = new run_query("select * from stock where id= '$stockId' ");

											$get_stock_data =	$get_stock->result();

											extract($get_stock_data );

											


											

											echo "

											

											<tr>

												<td> $no </td>

												<td> $stockId </td>

												<td> $model </td>

												<td>

																	

													<a  class='red-text modal-trigger' href='#modal$id' >   <i class='fa fa-trash'></i></a>

																

															  <div id='modal$id' class='modal'>

																<div class='modal-content'>

																  <h4 align='center'>Are you Sure You Want To Delete?</h4>

																  <p align='center' > $model  STOCK ID ($stockId)</p>

																	<a href='#!' class='modal-action modal-close  green-text'>  <i class='fa fa-close'></i></a>

																

																<a href='move_laptop.php?del_cart=$move_id&stock_id1=$stockId' class=' red-text right'>  <i class='fa fa-trash'></i></a>

																

																</div>

																

															  </div>

													</td>

												</tr>

											

											

											";

											$no++;

									}

									

								}

			

			

			?>

			</table>

				

			 

			

			<div class='row'>

			

				

			  </div>

	

			</div>

			</div>

		

		</div>

		

		

		<div class="col m6 l6 s12">

			<div class="card z-depth-1 blue-text" style='border-radius:30px; background-color:#e3f2fd;'>

            <div class="card-content">

			

			

			

			  

			  <form method='post'>

			  <div class="input-field col m12 l12 s12">

				<select required name='receiver_id' >

				    

				  <?php 

							$get_locations1 = new run_query("select * from users  where user_id !='$user_id' and user_permission='3' and  user_status='1' and user_location !='$user_location' ");

								

							while(	$get_locations_data1 =	$get_locations1->result() ){

							

								extract($get_locations_data1 );

								

								

							 	$sql_location = "select id as location_id, name as location_name  from $db1.business_locations  where  id='$user_location'  ";

								$get_locations = $connect ->query($sql_location);	

								$get_locations_data = $get_locations ->fetch(PDO::FETCH_BOTH);

								extract($get_locations_data );

								

								echo "<option value='$user_id'> $user_username  ( $location_name ) </option>";

									}	

						?>

				</select>

				<label> <b> RECIEVER</b> </label>

			</div>

				

			  <div class="input-field col m6 l6 s12">

				   <textarea id="textarea1" class="materialize-textarea" name='move_comment' ></textarea>

				  <label for="textarea1">Comments</label>

			   </div>

				

				  <div class="input-field col m6 l6 s12">

				  <br/><br/>

				<button type='submit' name='move_laptop' class='btn green'> SEND</button>

				</div>

			</form>

			<div class='row'>

			

				

			  </div>

	

			</div>

			</div>

		

		</div>

		



	</div>



	

</form>



   </div>





	



<br/><br/><br/><br/>



<?php

 

require "../script/php/footer_home.php";

require "../script/mlc/script_foot.php";

?>





</body>



</html>

































