<?php
class Dispositivo_di_allarme extends impianto implements JsonSerializable
{
    protected $identificativo;
    protected $numero_telefono;
    protected $dispositivo = [];
    public function __construct($nome, $latitudine, $longitudine, $identificativo, $numero_telefono)
    {
        parent::__construct($nome, $latitudine, $longitudine);
        $this->identificativo = $identificativo;
        $this->numero_telefono = $numero_telefono;
    }
    public function getIdentificativo()
    {
        return $this->identificativo;
    }
    public function getNumero_telefono()
    {
        return $this->numero_telefono;
    }
    public function setIdentificativo($identificativo)
    {
        $this->identificativo = $identificativo;
    }
    public function setNumero_telefono($numero_telefono)
    {
        $this->numero_telefono = $numero_telefono;
    }
    public function setDispositivo($dispositivo)
    {
        $this->dispositivo = $dispositivo;
    }
    public function __toString()
    {
        return "Identificativo: " . $this->identificativo . " Numero_telefono: " . $this->numero_telefono;
    }

    public function jsonSerialize()
    {
        return [
            'nome' => $this->getNome(),
            'latitudine' => $this->getLatitudine(),
            'longitudine' => $this->getLongitudine(),
            'identificativo' => $this->getIdentificativo(),
            'numero_telefono' => $this->getNumero_telefono(),
        ];
    }
    public function getRilevatore($identificativo)
    {
        $rilevatori = [];
        foreach($this->dispositivi as $dispositivo){
            if($dispositivo->getIdentificativo() == $identificativo)
                $rilevatori[] = $dispositivo;
        }
        return !empty($rilevatori) ? $rilevatori : null;
    }
}