<?php

//dtatbase connection_aborted

session_start(); 


class connect{

		public  $host = 'localhost';
		public  $username = 'chotayac';
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


						
?>