<?

require_once("classes/class.SQL.php");
require_once("classes/form.class.php");
require_once("classes/campoMinado.php");
$form = new form();
$sql = new SQL();
$oCampoMinado = new CampoMinado();

$aMatriz = $sql->getMatriz();


$nBombas = 32;
$aBomba = array();
#definir bombas do jogo
$aBomba = $oCampoMinado->definirBombas($nBombas);

#seta as bombas na matriz
$aMatriz = $oCampoMinado->setarBombasMatriz($aMatriz,$aBomba);

#define os botões do jogo
$aMatriz = $oCampoMinado->setarBotoes($aMatriz);

?>




<html>
<head>
    <title>::. Prova IDBRASIL .::</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">

    
    <? require_once("include/header.php"); ?> 

    <style>
        .error{
            color:red;
        }
    </style>
</head>
<body style="background-color:#5D7DB2;">

    <div id="wrapper" style="background-color:#5D7DB2;">

        <div id="page-wrapper" >

            <br>
            <div class="conteudo-total" style="background-color:#5D7DB2;">

               

                <div class="container-fluid" style="max-width:1100px; background-color: #FFF;  border-radius:10px">	

                    <? require_once("include/topo.php"); ?>           

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Menu Principal</a></li>
                            <li class="breadcrumb-item active">Teste 2</li>
                        </ol>
                    </nav>

                    <div class="row">
                        <div class="col-sm-12">

                            <div class="card card-indigo"  >
                                <div class="card-header">
                                    Campo minado<span style="float:right"><?= date("d/m/Y") ?></span>
                                </div>
                                <div class="card-body">                            
                                    
                                    <div style="display:none" class="row" id="novamente">
                                        <div class="col-sm-12 text-right">

                                            <button onclick="jogarNovamente()" type="button" class="btn btn-primary">
                                                <i class="fas fa-gamepad"></i>
                                                &nbsp;Jogar Novamente
                                            </button>
                                            
                                        </div>
                                    </div>

                                    <div class="row justify-content-center">
                                        <div class="col-sm-12 text-center">
                                        
                                            <table class="table-responsive-sm text-center">

                                                <tbody>
                                                <? 
                                                
                                                $cont = 0;
                                                foreach($aMatriz as $v){
                                                    
                                                    if($cont == 0){
                                                        echo "
                                                            <tr>
                                                        ";
                                                    }

                                                    ?>
                                                    <td width="30">
                                                        <?=$v['html']?>
                                                    </td>

                                                    <?

                                                    if($v['row'] != $aMatriz[$cont+1]['row'] && $cont > 0){
                                                        //echo $cont; exit('po');
                                                        echo"
                                                            </tr>
                                                            <tr>
                                                        ";
                                                    }

                                                    $cont++;


                                                    if( count($aMatriz) == $cont){
                                                        echo "</tr>";

                                                    }                                            

                                                }

                                                ?>
                                                </tbody>
                                            </table>


                                        </div>
                                
                                    </div>




 
                                       
                                </div>  


                                <div class="card-footer">

                                    <div class="row">
                                        <div class="col-sm-12 text-center">
                                            

                                            <button type="button" name="btnMenu" id="btnMenu" 
                                            class="btn btn-default" tabindex="116" onclick="window.location='index.php';">
                                                <i class="fa fa-home"></i> Menu Principal
                                            </button>                                            

                                        </div>
                                    </div>
                                </div>                                

                            </div>  
                        </div>
                    </div>
                    
                    <? require_once("include/rodape.php"); ?>
                  
                </div>                            

        </div>
        <!-- /#page-wrapper -->
        <br> 
    </div>
    <!-- /#wrapper -->

</body>




<script>

    function jogarNovamente(){
        location.reload();
    }


    var jogoEncerrado = 0;
    $(function() {
        //#224773
        //$("#resultado").val('3');

    });

    function setCampo (id,bomba){
       
        if(jogoEncerrado == 1){
            $("#tituloModal").html('Game Over');
            $("#conteudoModal").html("Jogo encerrado.<br> Clique no botão 'Jogar Novamente' para reinicar o jogo.");     
            $('#modalPagina').modal('show'); 
            retur;
        }

        if(bomba == 1){
            //alert('bomba');
            jogoEncerrado = 1;

            $("#conteudo"+id).addClass("error");

            $(".bombas").show();
            $(".fechadoBombas").hide();

            $("#tituloModal").html('Game Over');
            $("#conteudoModal").html("Jogo encerrado.<br> Clique no botão 'Jogar Novamente' para reinicar o jogo.");     
            $('#modalPagina').modal('show'); 

            $("#novamente").show();
        }else{
            $("#fechado"+id).hide();
            $("#conteudo"+id).show();
        }

    }





</script>



</html>
