<?php
    class Rilevatore extends impianto implements JsonSerializable
    {
        protected $identificativo;
        protected $misurazioni = [];
        protected $unitaDiMisura;
        protected $sogliaDiAllarme;
        protected $codiceSeriale;
        protected $data;
        protected $valore;

        public function __construct($nome, $latitudine, $longitudine, $identificativo, $unitaDiMisura, $sogliaDiAllarme, $codiceSeriale, $data, $valore)
        {
            parent::__construct($nome, $latitudine, $longitudine);
            $this->identificativo = $identificativo;
            $this->unitaDiMisura = $unitaDiMisura;
            $this->sogliaDiAllarme = $sogliaDiAllarme;
            $this->codiceSeriale = $codiceSeriale;
            $this->data = $data;
            $this->valore = $valore;
        }

        public function addMisurazione($data, $valore)
        {
            $this->misurazioni[] = ['data' => $data, 'valore' => $valore];
        }

        public function getIdentificativo()
        {
            return $this->identificativo;
        }


        public function getUnitaDiMisura()
        {
            return $this->unitaDiMisura;
        }

        public function getSogliaDiAllarme()
        {
            return $this->sogliaDiAllarme;
        }

        public function getCodiceSeriale()
        {
            return $this->codiceSeriale;
        }


        public function getData()
        {
            return $this->data;
        }
        public function getValore()
        {
            return $this->valore;
        }
        public function getMisurazioni()
        {
            return $this->misurazioni;
        }
        public function setIdentificativo($identificativo)
        {
            $this->identificativo = $identificativo;
        }

        public function setUnitaDiMisura($unitaDiMisura)
        {
            $this->unitaDiMisura = $unitaDiMisura;
        }

        public function setSogliaDiAllarme($sogliaDiAllarme)
        {
            $this->sogliaDiAllarme = $sogliaDiAllarme;
        }

        public function setCodiceSeriale($codiceSeriale)
        {
            $this->codiceSeriale = $codiceSeriale;
        }

        public function setData($data)
        {
            $this->data = $data;
        }

        public function setValore($valore)
        {
            $this->valore = $valore;
        }
        public function __toString()
        {
            return "Identificativo: " . $this->identificativo . " Unità di misura: " . $this->unitaDiMisura . " Soglia di allarme: " . $this->sogliaDiAllarme . " Codice seriale: " . $this->codiceSeriale;
        }

        public function jsonSerialize()
        {
            return [
                'nome' => $this->nome,
                'latitudine' => $this->latitudine,
                'longitudine' => $this->longitudine,
                'identificativo' => $this->identificativo,
                'unitaDiMisura' => $this->unitaDiMisura,
                'sogliaDiAllarme' => $this->sogliaDiAllarme,
                'codiceSeriale' => $this->codiceSeriale,
                'misurazioni' => $this->misurazioni,
                'data' => $this->data,
                'valore' => $this->valore
            ];
        }
    }