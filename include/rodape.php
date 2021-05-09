                <div class="row">
                    <div class="col-sm-12 text-center bg-light">

                        <div id="rodape" style="font-size:12px; padding:10px">

                           
                            Copyright &copy; IDBRASIL. Todos os direitos reservados.
                            
                        </div>


                    </div>
                </div>    





                <!-- Modal -->
                <div class="modal fade" style="overflow:auto; width:100%" id="modalPagina" tabindex="-1" role="dialog" aria-labelledby="tituloModal" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">

                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="tituloModal">Título do modal</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                
                                </div>
                                
                                <div class="modal-body" id="conteudoModal">
                                </div>
                        
                                <div class="modal-footer" id="rodapeModal">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                                    <? if(false){?>
                                        <button type="button" class="btn btn-primary"><i class="fas fa-save"></i> Salvar</button>
                                    <?}?>
                                </div>

                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div data-backdrop="static" class="modal fade" id="aguardePagina" tabindex="-1" role="dialog" aria-labelledby="modalPaginaTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body" id="conteudoAguarde">
                                <center>
                                  <br>
                                  <img style="width:120px"  src="img/carregando4.gif">
                                  <br>
                                  <br>
                                  <div style="font-size:16px">
                                    Aguarde o processamento...
                                  </div>
                                  <br>                                
                                </center>
                            </div>
                        </div>
                    </div>
                </div>        
                <!-- /Modal -->   

                <!-- Modal confirm -->
                <div data-backdrop="static" class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="modalPaginaTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body" id="conteudoConfirm">       
                            </div>
                            <div class="modal-footer" id="rodapeConfirm">
                                <button type="button" class="btn btn-default" id="modal-btn-si">Sim</button>
                                <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                            </div>                        
                        </div>
                    </div>
                </div>        
                <!-- /Modal  confirm--> 




                <script>

                    function modalSair(){
                        $("#logoutModal").modal('show');
                    }  

                    function fecharAguarde(){
                        //$('#aguardePagina').modal('hide');
                        setTimeout(function(){ $('#aguardePagina').modal('hide');},900);
                    }


                    function fecharConfirmeModal(){
                        //$('#aguardePagina').modal('hide');
                        setTimeout(function(){ $('#confirmModal').modal('hide');},450);
                    }



                    function abrirModal(){
                        //$('#aguardePagina').modal('show');
                        
                        setTimeout(function(){ $("#modalPagina").modal('show');},450);
                    }

                    //abrirModal();

                    function abrirAguarde(){
                        $('#aguardePagina').modal('show');
                        //setTimeout(function(){ $('#aguardePagina').modal('hide');},300);
                    }



                </script> 


               