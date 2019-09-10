<?php
	$db="sevenforma";
	$server="localhost";
	$user="root";
	$pass="";
	
	//Funções
	//Faz a Ligação à Base de Dados
	
	$ligaçao=mysql_connect($server,$user,$pass);
	
	if (!$ligaçao) {
		print ("Problemas na ligação à base de dados");
	}
	
	function reduz($string){
		$count;
		$i=0;
		$ajuda=false;
		
		if(strlen($string)<=300)
		{
			return $string;
		}
		else
		{
			do
			{
				if($string[$i]==".")
				{
					$count=$i;
				}
				
				$i++;
				if($count>250)
				{
					$ajuda=true;
				}
			}while($ajuda==false);
		}
		return substr($string,0,$count+1);
	}
?>