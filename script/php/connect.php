<?php

//dtatbase connection_aborted

session_start(); 


class connect{
		public  $host = 'localhost';
			public  $username = 'chotayac';
			// public  $username = 'ben';
		// public  $password = '1991';
		public  $password = 'oyemart1145';
		
		public  $db ='chotayac_laptop';	
		
	}
	

	
		class run_query extends connect{
		
		public function __construct( $query_mlc){
			$this->connect_db = new PDO("mysql:host=$this->host;dbname=$this->db",$this->username,$this->password);

			$this->query_run = $this->connect_db ->query($query_mlc);
			$this->num_rows = $this->query_run->rowCount();
			
			
			}


			public	 function result(){
			$this->result =  $this->query_run ->fetch(PDO::FETCH_BOTH);
			
			return $this->result;
			}
		
	
	}


//site variables
$reg_Date = date('Y-m-d');



//login function

function loggedin(){
    if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
        return true;
    }else{
     return false;
    }
}



	  $username1 = 'chotayac';
	//   $username1 = 'ben';
		//   $password1 = '1991';
		  $password1 = 'oyemart1145';

$host1 = 'localhost';
$db1 ='chotayac_inventroy';


 $connect = new PDO("mysql:host=$host1;dbname=$db1",$username1,$password1);



						
?>