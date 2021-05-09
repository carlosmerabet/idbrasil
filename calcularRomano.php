<?

error_reporting(1);
ini_set("display_errors", 1 );

require_once("classes/class.SQL.php");

$sql = new SQL();

$res = $sql->getRomano();
#print_r($res);exit;
#exit('as');
$seq = $_REQUEST['sequencia'];

$vetor = str_split($seq);

$tamanho = count($vetor);
$i = 0;
$total = 0;
$ativaMenor = 0;
foreach($vetor as $v){

    $v = strtoupper($v);

    
    foreach($res as $r){

        $ativaMenor = 0;

        if($v == $r['simbolo']){
            
            if($tamanho > $i){
                
                if( $v == "I" || $v == 'X' || $v == 'C' ){
                    
                    $registro = $sql->getRomanoSimbolo($v);
                    $registro = $registro[0];

                    $next = $sql->getRomanoSimbolo($vetor[$i +1]);
                    $next = $next[0];                    
                    #exit($next['valor']."asd");
                    if( $registro['valor'] < $next['valor']  ){
                        
                        $ativaMenor = 1;

                    }

                }

            }
            
            if( $ativaMenor == 1){
                $numero = $r['valor'] - $r['valor']*2;
            }else{
                $numero = $r['valor'];
            }
            

        }
       

    }

    $total = $total + $numero;
    $i++;

}

echo $total;
exit;


?>