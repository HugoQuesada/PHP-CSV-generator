<?php

class CsvGenerator{
  private $struct = [];
  private $fileName = "data";
  private $activateDownload = false;

  public function activateDownload($activate){
    $this->activateDownload = $activate;
  }

  public function setFileName($name){
    $this->fileName = $name;
  }

  public function addColumn($columnName){
    $this->struct[$columnName] = [];
  }

  public function addLine($data){
    $struct = [];
    $i = 0;
    foreach($this->struct as $key => $value){
      $this->struct[$key][] = $data[$i];
      $i++;
    }
  }

  public function getColumnName(){
    $names = [];
    foreach($this->struct as $key => $value){
      $names[] = $key;
    }
    return $names;
  }

  public function generateStruct(){
    $myfile = fopen($this->fileName . ".csv", "w");
    fwrite($myfile, $this->getColumnTitle());
    $columnName = $this->getColumnName();
    for($i = 0; $i < count($this->struct[$columnName[0]]); $i++){
      $line = "";
      foreach($columnName as $column){
        $line .= $this->struct[$column][$i] . ";";
      }
      fwrite($myfile, "\r\n");
      fwrite($myfile, $line);
    }
    if($this->activateDownload){
      $this->downloadFile();
    }
  }

  public function downloadFile(){
    header('Location: ./' . $this->fileName . '.csv');
  }

  public function getColumnTitle(){
    $columnName = $this->getColumnName();
    $header = "";
    foreach($columnName as $name){
      $header .= $name . ";";
    }
    return $header;
  }
}
