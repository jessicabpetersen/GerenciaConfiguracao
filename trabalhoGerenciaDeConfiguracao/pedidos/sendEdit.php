<?php 	  
require_once './functionsPedido.php'; 	
  if (isset($_GET['id'])){
      edit();
  }else {	    
      die("ERRO: ID não definido.");	  
      
  }