<?php

ini_set('display_errors', 0 );
error_reporting(0);

class SQL{

	var $conexao;

	function __construct(){ 

		$conexao =    mysqli_connect('127.0.0.1','root','') or die("Erro ccon");
		$banco = mysqli_select_db($conexao,'provaid');
		mysqli_set_charset($conexao,'utf8');
		$this->conexao = $conexao;

	}

	function execute($sql){


		$res = mysqli_query($this->conexao,$sql) or die("Erro");

		$ar = array();
		while($dados=mysqli_fetch_assoc($res))
		{
			$ar[]= $dados;
			//echo $dados['nome'].'<br>';
		}

		return $ar;
		$query = $this->conexao->query($sql);
		
		$result = $query->fetch_all(MYSQLI_ASSOC);
		
		$ar = array();
		foreach ($result as $row) {
			$ar[]= $row;
		}

		return $ar;
	}

	function trataNull($var,$t=FALSE){
		if(!$var) return "null";
		else return ($t)?"'".$var."'":$var;
	}
	
	function getmatriz(){
		$sql="
			select * from matriz
		";

        $res = $this->execute($sql);
		return $res;
	}

	function getRomano(){
		$sql="
			select * from numero_romano
		";

        $res = $this->execute($sql);
		return $res;		
	}

    function getRomanoSimbolo($simbolo){
		$sql="
			select * from numero_romano
            where
                simbolo = '".$simbolo."'
		";
        #exit($sql);
        $res = $this->execute($sql);
		return $res;
       
    }


}
?>
