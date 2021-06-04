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
                     $get_stocks = new run_query("select * from stock where status >=2 and $search_column  like '%$search%'  ");
                   }else{
                     $get_stocks = new run_query("select * from stock  where currentLocation='$stock_location' and status >=2  and $search_column  like '%$search%'  ");
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
                 $btns = btns($id);

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









