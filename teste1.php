<?

require_once("classes/form.class.php");
$form = new form();

?>


<html>
<head>
    <title>::. Prova IDBRASIL .::</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">

    
    <? require_once("include/header.php"); ?> 

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
                            <li class="breadcrumb-item active">Teste 1</li>
                        </ol>
                    </nav>

                    <div class="row">
                        <div class="col-sm-12">

                            <div class="card card-indigo"  >
                                <div class="card-header">
                                    Números Romanos<span style="float:right"><?= date("d/m/Y") ?></span>
                                </div>
                                <div class="card-body">                            
                                    

                                <div class="row">
    
                                    <?=
                                    $form->criaTextB(5,"Sequência romana:","sequencia","", 'onkeyup="formatar(this)"');
                                    ?>   


                                    <div class="col-2 text-center">
                                        <i style="margin-top:40px" class="fas fa-equals"></i>
                                    </div>

                                    <div class="col-5" >
                                        <label for="">&nbsp;</label>
                                        <br>
                                        <input disabled id="resultado"  value="" class="form-control" type="text" dyisabled>
                                    </div>                                    
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <button onclick="calcular()" type="button" class="btn btn-primary">
                                            <i class="fas fa-calculator"></i>
                                            &nbsp;Calcular
                                        </button>
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

    

    $(function() {
        //#224773
        //$("#resultado").val('3');

    });

    function calcular(){

        var seq = $("#sequencia").val();

        if(seq ==''){
            $("#tituloModal").html('Atenção');
            $("#conteudoModal").html("Informe um valor no campo sequência romana");     
            $('#modalPagina').modal('show');   
            return; 
        }

        $('#aguardePagina').modal('show');

        $.ajax({
            url: "calcularRomano.php",
            type: "POST",
            data:{
                sequencia: seq
            },
            success: function(resp){
                fecharAguarde();
                $("#resultado").val(resp);
                //$("#tablehtml").html(resp);
            },
            error: function(){
                fecharAguarde();
            }              
        }).complete(function() {
            fecharAguarde();
        });
    }

    var repete = 0;
    var temp = "";
    var cont = 0;
    function formatar(input) {

		var campo = input.value;

		if(campo==''){
			input.value = '';
			return;
		}

	
		var cont = 0;
		
		var v = campo.split("");
		var tam = campo.length;
		tam = tam - 1; 
	
		var permitido = ["I","V","X","L","C","D","M","i","v","x","l","c","d","m" ];
		var a = permitido.indexOf(v[tam]);
		if(a == -1){
			v[tam] = '';
		}
	
	
		var texto = ""; 
		//texto = v[0];
		
        repete = 0;
		for(i=0; i <= tam; i++){


			if(permitido.indexOf(v[i]) == -1){
				v[i] = '';
                texto = texto.concat(v[i]);
                input.value = texto;
                
                $("#tituloModal").html('Atenção');
                $("#conteudoModal").html("Caracteres permitidos: I,V,X,L,C,D,M");     
                $('#modalPagina').modal('show');   
                return;

			}else{


                str = v[i];
                str = str.toUpperCase();

                if(cont > 0){

                    if(str == 'I' || str == 'X' || str == 'C' || str == 'M'){
                        //alert('chegou');
                        if (str == temp){
                            repete++;                             
                        }else{
                            repete = 0;
                        }
                        
                    }
                }

                if(repete >= 3){

                    
                    v[i] = '';
  		

                    $("#tituloModal").html('Atenção');
                    $("#conteudoModal").html("O caractere '"+str+"' pode repetir no máximo 3 vezes");
                    $('#modalPagina').modal('show');   

                    ultimo = texto.substring(0, campo.length - 1)
                    input.value = ultimo;

                    repete--;
                    return;            
                }else{
                    
                }
                
                cont++;

			                   
            }

            temp = str; 
            texto = texto.concat(v[i].toUpperCase());	

			

			
		}
		
         
        
		
		input.value = texto;
		return;
	
	
	}


</script>



</html>
