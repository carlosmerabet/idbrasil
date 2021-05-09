

<html>
<head>
    <title>::. PROVA IDBRASIL .::</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">

    <? require_once("include/header.php"); ?> 
    
</head>
<body style="background-color:#5D7DB2;">

    <div id="wrapper" style="background-color:#5D7DB2;">

        <div id="page-wrapper" >
            
            <input type="hidden" value="1" name="setForm" id="setForm">
            <br>
            <?php  //echo $this->render("menu/menu-pss.phtml") ?>
            <div class="conteudo-total" style="background-color:#5D7DB2; ">

               

                <div class="container-fluid" style="max-width:1100px; background-color: #FFF;  border-radius:10px">	

                    <? require_once("include/topo.php"); ?>

                    <div class="row">
                        <div class="col-sm-12">



                            <div class="card card-indigo ">

                                <div class="card-header" style="font-size:12px; margin-bottom:-14px">
                                   
                                    <h3 class="card-title TEXT-CENTER">                    
                                            ATIVIDADES
                                    </h3>  
                                </div>


                                <div class="card-body" >

                        
                                    <table class="table table-hover table-borderless" width="100%" border="0" cellspacing="0" cellpadding="2" >
                                            
                                        <tbody>
                                            <tr>
                                                <th width="5%" align="center" valign="middle" style="cursor: pointer; " onClick="document.location='frmComposicao.php'">
                                                    <i class="fas fa-hard-hat"></i>
                                                </th>
                                                <th width="95%" style="cursor: pointer;" class="fontBold" onClick="document.location='teste1.php'">
                                                    <b>TESTE 1 – Números Romanos</b>
                                                </th>
                                            </tr> 
                                                                                     

                                            <tr>
                                                <th width="5%" align="center" valign="middle" style="cursor: pointer; " onClick="document.location='frmDisciplina.php'">
                                                    <i class="fas fa-bomb"></i>
                                                </th>
                                                <th width="95%" style="cursor: pointer;" class="fontBold" onClick="document.location='teste2.php'">
                                                    <b>Teste 2 - Campo Minado</b>
                                                </th>
                                            </tr> 


                                        </tbody>

                                    </table>


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
    $(function () {
        $("#divAnoSia").hide();
    });

</script>






</html>



