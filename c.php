<?php
require_once ('Dispositivo_di_allarme.php');
require_once ('Rilevatore_di_pressione.php');
require_once ('Rilevatore_di_umidita.php');
class c implements JsonSerializable
{
    public $dispositivo = [];
    public $rilevatore = [];
    public $umidita = [];
    public $impianto= [] ;

    public function __construct()
    {
        $impianto= new impianto("a", 2, 3);
        $impianto2= new impianto("b", 2, 3);
        $impianto3= new impianto("c", 2, 3);
        array_push($this->impianto, $impianto);
        array_push($this->impianto, $impianto2);
        array_push($this->impianto, $impianto3);
        $dispositivoDiAllarme1= new Dispositivo_di_allarme('nome', 1, 2, 'identificativo', '123456789');
        $dispositivoDiAllarme4= new Dispositivo_di_allarme('nome', 2, 2, 'identificativo', '123456789');
        $dispositivoDiAllarme2= new Dispositivo_di_allarme('nome', 1, 2, 'identificativo3', '123456789');
        $dispositivoDiAllarme3= new Dispositivo_di_allarme('nome', 1, 2, 'identificativo2', '123456789');
        array_push($this->dispositivo, $dispositivoDiAllarme1);
        array_push($this->dispositivo, $dispositivoDiAllarme2);
        array_push($this->dispositivo, $dispositivoDiAllarme3);
        array_push($this->dispositivo, $dispositivoDiAllarme4);
        $rilevatore_di_pressione1 = new Rilevatore_di_pressione("a",1,2,"id",1,2,1,"acqua", 2023-12-12, 12);
        $rilevatore_di_pressione2 = new Rilevatore_di_pressione("b",1,2,"id2",1,2,1,"acqua", 2023-12-12, 13);
        $rilevatore_di_pressione3 = new Rilevatore_di_pressione("c",1,2,"id3",1,2,1,"acqua", 2023-12-12, 14);
        array_push($this->rilevatore, $rilevatore_di_pressione1);
        array_push($this->rilevatore, $rilevatore_di_pressione2);
        array_push($this->rilevatore, $rilevatore_di_pressione3);
        $rilevatore_di_umidita1 = new Rilevatore_di_umidita("a",1,2,"id",1,2,1,"terra", 2023-12-12, 12);
        $rilevatore_di_umidita2 = new Rilevatore_di_umidita("b",1,2,"id2",1,2,1,"aria", 2023-12-12, 13);
        $rilevatore_di_umidita3 = new Rilevatore_di_umidita("c",1,2,"id3",1,2,1,"terra", 2023-12-13, 14);
        $rilevatore_di_umidita4 = new Rilevatore_di_umidita("c",1,2,"id3",1,2,1,"terra", 2023-12-11, 14);
        array_push($this->umidita, $rilevatore_di_umidita1);
        array_push($this->umidita, $rilevatore_di_umidita2);
        array_push($this->umidita, $rilevatore_di_umidita3);
        array_push($this->umidita, $rilevatore_di_umidita4);
    }

    public function getDispositivo($identificativo)
    {
        foreach($this->dispositivo as $dispositivo){
            if($dispositivo->getIdentificativo() == $identificativo)
                return  $dispositivo;
        }
        return null;
    }
    public function jsonSerialize() {
        $attrs = [];
        $class_vars = get_class_vars(get_class($this));
        foreach ($class_vars as $name => $value) {
            $attrs[$name]=$this->{$name};
        }
        return $attrs;
    }
    public function getRilevatore($identificativo)
    {
        foreach($this->rilevatore as $dispositivos){
            if($dispositivos->getIdentificativo() == $identificativo)
                return  $dispositivos;
        }
        return null;
    }
    public function jsonumidita() {
        return $this->umidita;
    }
    public function jsondispotivi() {
        return $this->dispositivo;
    }
    public function jsonrilevatore() {
        return $this->rilevatore;
    }
    public function jsonimpianto() {
        return $this->impianto;
    }
}