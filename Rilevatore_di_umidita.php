<?php
require_once ('Rilevatore.php');
class Rilevatore_di_umidita extends Rilevatore implements JsonSerializable
{
    protected $posizione;

    public function __construct($nome, $latitudine, $longitudine, $identificativo, $unitaDiMisura, $sogliaDiAllarme, $codiceSeriale, $posizione, $data, $valore)
    {
        parent::__construct($nome, $latitudine, $longitudine, $identificativo, $unitaDiMisura, $sogliaDiAllarme, $codiceSeriale, $data, $valore);
        $this->posizione = $posizione;
    }
    public function getPosizione()
    {
        return $this->posizione;
    }
    public function setPosizione($posizione)
    {
        $this->posizione = $posizione;
    }
    public function __toString()
    {
        return parent::__toString() . " Posizione: " . $this->posizione;
    }
    public function jsonSerialize()
    {
        return [
            'nome' => $this->getNome(),
            'latitudine' => $this->getLatitudine(),
            'longitudine' => $this->getLongitudine(),
            'identificativo' => $this->getIdentificativo(),
            'unitaDiMisura' => $this->getUnitaDiMisura(),
            'sogliaDiAllarme' => $this->getSogliaDiAllarme(),
            'codiceSeriale' => $this->getCodiceSeriale(),
            'posizione' => $this->getPosizione(),
            'misurazioni' => $this->getMisurazioni(),
            'data' => $this->getData(),
            'valore' => $this->getValore(),
        ];
    }
    public function getRilevatore($identificativo)
    {
        $rilevatori = [];
        foreach($this->rilevatore as $dispositivos){
            if($dispositivos->getIdentificativo() == $identificativo)
                $rilevatori[] = $dispositivos;
        }
        return !empty($rilevatori) ? $rilevatori : null;
    }
}