<?php
require_once ('Rilevatore.php');
class Rilevatore_di_pressione extends Rilevatore implements JsonSerializable
{
    protected $tipologia;

    public function __construct($nome, $latitudine, $longitudine, $identificativo, $unitaDiMisura, $sogliaDiAllarme, $codiceSeriale, $tipologia, $data, $valore)
    {
        parent::__construct($nome, $latitudine, $longitudine, $identificativo, $unitaDiMisura, $sogliaDiAllarme, $codiceSeriale, $data, $valore);
        $this->tipologia = $tipologia;
    }

    public function getTipologia()
    {
        return $this->tipologia;
    }

    public function setTipologia($tipologia)
    {
        $this->tipologia = $tipologia;
    }

    public function __toString()
    {
        return parent::__toString() . " Tipologia: " . $this->tipologia;
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
            'tipologia' => $this->getTipologia(),
            'misurazioni' => $this->getMisurazioni(),
            'data' => $this->getData(),
            'valore' => $this->getValore(),
        ];
    }
    public function getMisurazioniMaggioreDi($value) {
        $misurazioniMaggioreDi = [];
        foreach($this->misurazioni as $misurazione){
            if($misurazione > $value)
                $misurazioniMaggioreDi[] = $misurazione;
        }
        return $misurazioniMaggioreDi;
    }
}