<?php
if(!defined('GXB_TRMCO_URL')){
  define('GXB_TRMCO_URL',plugins_url('/',GXB_TRMCO_FILE));
}

function trm_col_gxb_getArrayTRM(){
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://hiddenengine.co/trm/services/trm.json",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
));

$response = curl_exec($curl);

curl_close($curl);
return $response;

}

function trm_col_gxb_getBasic(){
  $fecha= date('d/m/Y');
  $json=trm_col_gxb_getArrayTRM();//echo $json;
  $array=json_decode($json,true);// print_r($array);
  for($i=0;$i<count($array);$i++){
    //echo $fecha."==".$array[$i]["day"];
    if($fecha==$array[$i]["day"]){
      $index=$i;
      $i=count($array);
    }
  }
  if($array[$index-1]['trm']<$array[$index]['trm']){$icon="up";}else{$icon="down";}
  $salida= "<span id='trm_col_gxb_trm' style='display: flex;'><img src='".GXB_TRMCO_URL."includes/".$icon.".png' alt='".$icon."' id='trm_col_gxb_trm_basicIcon' style='width: 17px; height:auto;' />$".$array[$index]['trm']."</span>";
  return $salida;
}

function trm_col_gxb_getAll(){
  $fecha= date('d/m/Y');
  $json=trm_col_gxb_getArrayTRM();//echo $json;
  $array=json_decode($json,true);// print_r($array);
  for($i=0;$i<count($array);$i++){
    //echo $fecha."==".$array[$i]["day"];
    if($fecha==$array[$i]["day"]){
      $index=$i;
      $i=count($array);
    }
  }
  if($array[$index-1]['trm']<$array[$index]['trm']){$icon="up";}else{$icon="down";}
  $salida= "<span id='trm_col_gxb_day'>".$fecha."</span><br>";
  $salida.= "<span id='trm_col_gxb_trm'><b>$".$array[$index]['trm']."</span><hr>";
  $salida.= "<img src='./includes/".$icon.".png' alt='".$icon."' id='trm_col_gxb_trm_fullIcon'><span id='trm_col_gxb_trm_yesterday'>ayer $.".$array[$index-1]['trm']."</span>";
  return $salida;
}