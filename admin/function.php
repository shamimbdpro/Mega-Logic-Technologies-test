<?php
 
   
   class myfunction{
	   public function getheader(){
		 include_once('header.php');   
		}
		
	   public function getfooter(){
		 include_once('footer.php');   
		} 
		
	
  
	 public function needLogged(){
	    session_start();
		error_reporting(0);
	  if(! $_SESSION['id']){
		  header('Location:../index.php');
	  }
	 
	 }
	
	
   }
   
   $ob=new myfunction;

   
   
?>