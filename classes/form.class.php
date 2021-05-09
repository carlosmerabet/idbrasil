<?php
class form
{

    function criaInput($nome, $tipo, $tam='', $id='', $value='', $maximo='', $disable, $class)
    {
        if($id == '')
            $id = $nome;

        $resp = "<input style='margin-top:7px' class='$class' type='$tipo' name='$nome' id='$id' value='$value' ";

        if($tam != '')
            $resp .= " size='$tam' ";

        if($maximo != '')
            $resp .= " maxlength='$maximo' ";

        if ($disable)
            $resp .= " readonly='true' disabled ";

        $resp .= ">";
        return $resp;
    }


    function criaTextArea($nome, $id='', $value='', $row='', $col='', $resize)
    {

        $tamanho = "";

        ($id == '') ? $id = $nome:"";

        if($row != "")
            $tamanho .= "rows='".$row."'";

        if($col != "")
            $tamanho .= "cols='".$col."'";
        
        if($resize != "")
            $resize = 'resize: none;';
        
        return "<textarea style='margin-top:7px; $resize;' ".$tamanho." name='".$nome."' id ='".$id."'>".$value."</textarea>";
    }

    function criaRadio($nome, $valores, $selecionado="")
    {
        $resp = "";
        foreach ($valores as $valor){
             $rad = "<input style='margin-top:5px' type='radio' name = ".$nome." id = '".$nome."' value='".$valor['id']."'";
             if($selecionado == $valor['id'])
                $rad .= " checked='checked' ";
             $rad .= ">&nbsp; ".$valor['nome'];
             $resp .= $this->criaLabel($rad);
             $resp .= "<br>";
        }
        return $resp;
    }

    function tirarAcentos($string){
        return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
    }


    function criaNumberB($col, $label, $input='', $value="")
    {
        $resp = '
            <div class="col-sm-'.$col.'">
                <div class="form-group" style="margin-top:6px">
                    <label style="font-size:12px">'.$label.'</label><br>        
        ';

        $t = str_replace(" ", "", $label);
        $t = str_replace(":", "", $t);
        $t = str_replace("?", "", $t);

        if($input ==""){
            $name = "qtd".$t;
            $name = $this->tirarAcentos($name);
        }else{
            $name = $input;
        }

        $resp.='
            <input min="0" value="'.$value.'" type="number" style="width:100px" class="form-control"  name="'.$name.'" id="'.$name.'">           
        ';

        $resp .='
                </div> 
            </div>
        ';
        return $resp;
    }  


  function criaTextAreaB($col, $label, $input='', $value="")
  {
      $resp = '
          <div class="col-sm-'.$col.'">
              <div class="form-group" style="margin-top:6px">
                  <label style="font-size:12px">'.$label.'</label><br>        
      ';

      $t = str_replace(" ", "", $label);
      $t = str_replace(":", "", $t);
      $t = str_replace("?", "", $t);

      if($input ==""){
          $name = "txt".$t;
          $name = $this->tirarAcentos($name);
      }else{
          $name = $input;
      }

      $resp.='
        <textarea class="form-control" name="'.$name.'" id="'.$name.'" rows="3">'.$value.'</textarea>          
      ';

      $resp .='
              </div> 
          </div>
      ';
      return $resp;
  } 



    function criaTextB($col, $label, $input='', $value="", $func='')
    {


        $resp = '
            <div class="col-'.$col.'">
                <div class="form-group" style="margin-top:6px">
                    <label style="font-size:12px">'.$label.'</label><br>        
        ';

        $t = str_replace(" ", "", $label);
        $t = str_replace(":", "", $t);
        $t = str_replace("?", "", $t);

        if($input ==""){
            $name = "txt".$t;
            $name = $this->tirarAcentos($name);
        }else{
            $name = $input;
        }

        $resp.='
            <input '.$func.' value="'.$value.'" type="text" class="form-control"  name="'.$name.'" id="'.$name.'" placeholder="'.$label3.'">           
        ';

        $resp .='
                </div> 
            </div>
        ';
        return $resp;
    }  



    function criaSelectB($col, $label, $input='', $valores, $selecionado="", $complete='')
    {
        if($complete == '1'){
            $class = "form-control select2bs4";
        }else{
            $class = "form-control";
        }

        if($label == ""){
            $tagLabel = "";
        }else{
            $tagLabel = '<label style="font-size:12px">'.$label.'</label><br>';
        }

        $resp = '
            <div class="col-sm-'.$col.'">
                <div class="form-group" style="margin-top:6px">
                    '.$tagLabel.'  
                            
        ';

        $t = str_replace(" ", "", $label);
        $t = str_replace(":", "", $t);
        $t = str_replace("?", "", $t);

        if($input ==""){
            $name = "rd".$t;
            $name = $this->tirarAcentos($name);
        }else{
            $name = $input;
        }

        $resp .='
                    <select class="'.$class.'" name="'.$name.'" id="'.$name.'"> 
                        <option value="">Selecione</option>
        ';

        $cont = 1;
        foreach ($valores as $valor){
            $nome = $valor['nome'];
            $value = $valor['id'];
            $id = $id;

            if($selecionado != "" && $selecionado == $value){
                $check = "selected";
            }else{
                $check = "";
            }

            $resp.='                 
                <option '.$check .' value="'.$value.'">'.$nome.'</option>         
            ';
            $cont++;
        }

        $resp .='
                    </select>
                </div> 
            </div>
        ';
        return $resp;
    }    

    function criaRadioB($col, $label, $input='', $valores, $selecionado="")
    {
        $resp = '
            <div class="col-sm-'.$col.'">
                <div class="form-group" style="margin-top:6px">
        ';

        if($label !=""){
                $resp.='<label style="font-size:12px">'.$label.'</label><br>';        
        }

        $t = str_replace(" ", "", $label);
        $t = str_replace(":", "", $t);
        $t = str_replace("?", "", $t);

        if($input ==""){
            $name = "rd".$t;
            $name = $this->tirarAcentos($name);
        }else{
            $name = $input;
        }

        $cont = 1;
        foreach ($valores as $valor){
            $nome = $valor['nome'];
            $value = $valor['id'];
            $id = $id;

            if($selecionado != "" && $selecionado == $value){
                $check = "checked";
            }else{
                $check = "";
            }

            $resp.='
                <div class="form-check">
                    <input '.$check.' style="font-size: 9pt;" class="form-check-input" type="radio" name="'.$name.'" id="'.$name.$cont.'" value="'.$value.'">
                    <label style="font-size:12px; font-family: arial; margin-top:3px" class="form-check-label" for="'.$name.'">'.$nome.'</label>
                </div>            
            ';
            $cont++;
        }

        $resp .='
                </div> 
            </div>
        ';
        return $resp;
    }  

    function criaCheckB($col, $label, $input='', $valores, $selecionado="")
    {
        $resp = '
            <div class="col-sm-'.$col.'">
                <div class="form-group" style="margin-top:6px">
        ';

        if($label !=""){
                $resp.='<label style="font-size:12px">'.$label.'</label><br>';        
        }

        $t = str_replace(" ", "", $label);
        $t = str_replace(":", "", $t);
        $t = str_replace("?", "", $t);

        if($input ==""){
            $name = "rd".$t;
            $name = $this->tirarAcentos($name);
        }else{
            $name = $input;
        }

        $cont = 1;
        foreach ($valores as $valor){
            $nome = $valor['nome'];
            $value = $valor['id'];
            $id = $id;

            if( count($selecionado) > 0 ){
                foreach($selecionado as $v){
                    if($v == $value){
                        $check = "checked";
                        break;    
                    }else{
                        $check = "";    
                    }
                }
            }else{
                if($selecionado != "" && $selecionado == $value){
                    $check = "checked";
                }else{
                    $check = "";
                }
            }


            $resp.='
                <div class="form-check">
                    <input '.$check.' style="font-size: 9pt;" class="form-check-input" type="checkbox" name="'.$name.'" id="'.$name.$cont.'" value="'.$value.'">
                    <label style="font-size:12px; font-family: arial; margin-top:3px" class="form-check-label" for="'.$name.'">'.$nome.'</label>
                </div>            
            ';
            $cont++;
        }

        $resp .='
                </div> 
            </div>
        ';
        return $resp;
    }  

    function criaCheckbox($nome, $label, $valor, $selecionado="")
    {
    
        $resp = "<input type='checkbox' name = '".$nome."' id = '".$nome."' value='".$valor."'";

        if($selecionado == $valor){
         $resp .= " checked ";
        }

        $resp .= ">&nbsp;&nbsp;".$label;
        $resp = $this->criaLabel($resp);

        return $resp;
    }


    function criaCheckbox2($nome, $label, $valor, $selecionado="",$disable)
    {

        if($disable)
            $teste = "disabled='disabled'";
        else
            $teste = "";


        $resp = "<input style='margin-top:8px' type='checkbox' name = '".$nome."' id = '".$nome."' value='".$valor."'";

        if($selecionado != ""){
         $resp .= " checked ";
        }

        $resp .= $teste." >&nbsp;&nbsp;".$label;
        $resp = $this->criaLabel($resp);

        return $resp;
    }

    function criaSelect($idselect, $valores, $selecionado="", $disable, $class)
    {

        if($disable)
            $teste = "disabled='disabled'";
        else
            $teste = "";


        $option = "<select style='margin-top:5px'  class='".$class."' name='".$idselect."' id='".$idselect."' ".$teste.">";


        if(trim($selecionado) == ""){
            $option .= "<option value=''>Selecione um Item</option>";
		}
		
        if($valores){
            foreach ($valores as $valor)
            {
                $option .= "<option value='".$valor['id']."'";
                if (($valor['id'] == $selecionado) || ($valor['nome'] == $selecionado))
                {
                    $option .= " selected ";
                }
                $option .= ">".utf8_encode(ucfirst($valor['nome']))."</option>";
            }
        }
        $option .= "</select>";
        return $option;
    }

    function criaSelect2($idselect, $valores, $selecionado="", $disable, $class)
    {

        if($disable)
            $teste = "disabled='disabled'";
        else
            $teste = "";


        $option = "<select style='margin-top:5px'  class='".$class."' name='".$idselect."' id='".$idselect."' ".$teste.">";



        if(!$selecionado)
            $option .= "<option value=''>Selecione um Item</option>";

        if($valores){
            foreach ($valores as $valor)
            {
                $option .= "<option value='".$valor['id']."'";
                if (($valor['id'] == $selecionado) || ($valor['nome'] == $selecionado))
                {
                    $option .= " selected ";
                }
                $option .= ">".(ucfirst($valor['nome']))."</option>";
            }
        }
        $option .= "</select>";
        return $option;
    }

    function criaSelectAnoMenu($idselect, $valores, $selecionado="", $disable, $class)
    {

        if($disable)
            $teste = "disabled='disabled'";
        else
            $teste = "";


        $option = "<select style='margin-top:5px' class='".$class."' name='".$idselect."' id='".$idselect."' ".$teste.">";



        if(!$selecionado)
            $option .= "<option value=''>Selecione um Item</option>";

        foreach ($valores as $valor)
        {
            $option .= "<option value='".$valor['id']."'";
            if (($valor['id'] == $selecionado) || ($valor['nome'] == $selecionado))
            {
                $option .= " selected ";
            }
            $option .= ">".ucfirst($valor['nome'])."</option>";
        }
        $option .= "</select>";
        return $option;
    }

    function criaSelectFixo($idselect, $valores, $selecionado="", $class)
    {
        $option = "<select style='margin-top:5px' class='".$class."' name='".$idselect."' id='".$idselect."'>";
        $option .= "<option value=''>Selecione um Item</option>";

        foreach ($valores as $valor)
        {
            $option .= "<option value='".$valor['id']."'";
            if (($valor['id'] == $selecionado) || ($valor['nome'] == $selecionado))
            {
                $option .= " selected ";
            }
            $option .= ">".utf8_encode(ucfirst($valor['nome']))."</option>";
        }
        $option .= "</select>";
        return $option;
    }

    function criaLabel($label,$obr="")
    {
        $resp = "<label style='font-size:12px' >".ucfirst($label)."</label>";

        if($obr)
            $resp .= "<font color='#FF0000' size='2px'>*</font>";

        return $resp;
    }

    function criaInputFile($nome, $value='')
    {
        $resp = "<input type='file' name='$nome' id ='$nome'";

        if($value != '')
            $resp .= " value='$value' ";

        $resp .= ">";

        return $resp;
    }
}
?>
