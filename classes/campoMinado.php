<?
class CampoMinado{


    public function definirBombas($nBombas){

        $aBomba = array();
        
        for ($i = 0; $i < $nBombas; $i++ ){
            
            if($i == 0){
                $aBomba[] = rand(1, 225);
            }else{
        
                $sorteio = rand(1, 225);
        
                if (in_array($sorteio, $aBomba)) { 
                    $i--;
                }else{
                    $aBomba[] = $sorteio;
                    continue;
                }
        
            }                                            
            
        }        

        return $aBomba;
    }

    public function setarBombasMatriz($aMatriz,$aBomba){

        $cont=0;
        $verificaBomba = 0;
        foreach($aMatriz as $v){
        
            $verificaBomba = 0;
        
            if (in_array($v['num'], $aBomba)) { 
                $verificaBomba = 1;
            }
            
            $aMatriz[$cont]['bomba'] = $verificaBomba;
            $cont++;
        }

        return $aMatriz;
    }

    

    public function bombasPerto($vet, $row, $col){
        $nBomba = 0;
        
        $colunaEsquerda = $col - 1;
        $colunaDireita = $col + 1;
    
        #linha acima
        $linhaAcima = $row + 1;
        $nBomba   += $this->localiza($vet, $linhaAcima, $colunaEsquerda);
        $nBomba   += $this->localiza($vet, $linhaAcima, $col);
        $nBomba   += $this->localiza($vet, $linhaAcima, $colunaDireita);
       
        #linha registro
        $nBomba    += $this->localiza($vet, $row , $colunaEsquerda);
        $nBomba    += $this->localiza($vet, $row , $colunaDireita);
        
        #linha abaixo
        $linhaAbaixo = $row - 1;
        $nBomba     += $this->localiza($vet, $linhaAbaixo, $colunaEsquerda);
        $nBomba     += $this->localiza($vet, $linhaAbaixo, $col);
        $nBomba     += $this->localiza($vet, $linhaAbaixo, $colunaDireita);
    
    
        return $nBomba;
    }
    
    public function localiza($vet,$row,$col){
    
        foreach($vet as $v){
    
            if($v['row'] == $row && $v['col'] == $col){
                
                if($v['bomba'] == 1){
                    return 1;
                }
    
            }
        }
        return 0;
    }

    public function setarBotoes($aMatriz){

        $cont=0;
        $htmlCampo="";
        foreach ($aMatriz as $v){
            
            if($v['bomba'] == 0){
                $bombasPerto= $this->bombasPerto($aMatriz,$v['row'], $v['col']);
        
                switch ($bombasPerto) {
                    case 0:
                        $htmlCampo = "";
                        break;          
                    case 1:
                        $htmlCampo = "<font style='font-size:20px; font-weight:bold; color:#A020F0'>".$bombasPerto."</font>";
                        break;
                    case 2:
                        $htmlCampo = "<font style='font-size:20px; font-weight:bold; color:#0000FF'>".$bombasPerto."</font>";
                        break;
                    case 3:
                        $htmlCampo = "<font style='font-size:20px; font-weight:bold; color:#008000'>".$bombasPerto."</font>";
                        break;
                    case 4:
                        $htmlCampo = "<font style='font-size:20px; font-weight:bold; color:#FFFF00'>".$bombasPerto."</font>";
                        break;
                    case 5:
                        $htmlCampo = "<font style='font-size:20px; font-weight:bold; color:#FF8C00'>".$bombasPerto."</font>";
                        break;
                    case 6:
                        $htmlCampo = "<font style='font-size:20px; font-weight:bold; color:#FF0000'>".$bombasPerto."</font>";
                        break;         
                    case 7:
                        $htmlCampo = "<font style='font-size:2px; font-weight:bold; color:#8B008'>".$bombasPerto."</font>";
                        break;                                                    
                    case 8:
                        $htmlCampo = "<font style='font-size:20px; font-weight:bold; color:#800000'>".$bombasPerto."</font>";
                        break;             
                }   
        
            }else{
                $htmlCampo='<div style="font-size:20px" class="bombas"> <i class="fas fa-bomb"></i> </div>';
            }
            
            $aMatriz[$cont]['html2'] = $htmlCampo;
         
            if($v['bomba'] == 1){
                $aMatriz[$cont]['html'] = "
                <div onclick='setCampo(".$v['num'].",".$v['bomba'].")' class='fechadoBombas' id='fechado".$v['num']."'>
                    <font style='font-size:28px; cursor:pointer; color:#ADD8E6' class='fas fa-square'></font>
                </div>
            
                <div style='display:none' class='bombas' id='conteudo".$v['num']."'>
                    ".$htmlCampo."
                </div>
        
            ";
            }else{
                $aMatriz[$cont]['html'] = "
                <div onclick='setCampo(".$v['num'].",".$v['bomba'].")' id='fechado".$v['num']."'>
                    <font style='font-size:28px; cursor:pointer; color:#ADD8E6' class='fas fa-square'></font>
                </div>
            
                <div style='display:none' id='conteudo".$v['num']."'>
                    ".$htmlCampo."
                </div>
        
            ";
            }
        
        
          
        
            $cont++;
        }

        return $aMatriz;

    }



}


?>