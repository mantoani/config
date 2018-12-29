<?php

namespace Config;

class Config{

  private $inc;

  function __construct($file = null){
    $this->inc = getcwd();
    $this->setConfig($file);
  }

  private function setConfig($file){

    if($file !== null){

      $config = json_decode(file_get_contents($this->inc."/.data/$file.json"));

      foreach($config as $k => $v){
        $this->$k = $v;
      }

    } else {
      $env = $this->getenv();
      $configJson = json_decode(file_get_contents($this->inc."/env/config.json"));

      if(json_last_error()){
        echo "[erro] erro no arquivo _config.json \n"; exit;
      }

      foreach($configJson->$env as $k => $v){
        $this->$k = $v;
      }
    }

  }

  private function getenv(){
    return trim(file_get_contents($this->inc."/env/.env"));
  }

}

?>
