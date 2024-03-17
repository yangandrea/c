<?php
class impianto implements JsonSerializable
{
    protected $nome;
    protected $latitudine;
    protected $longitudine;

    public function __construct($nome, $latitudine, $longitudine)
    {
        $this->nome = $nome;
        $this->latitudine = $latitudine;
        $this->longitudine = $longitudine;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getLatitudine()
    {
        return $this->latitudine;
    }

    public function getLongitudine()
    {
        return $this->longitudine;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function setLatitudine($latitudine)
    {
        $this->latitudine = $latitudine;
    }
    public function setLongitudine($longitudine)
    {
        $this->longitudine = $longitudine;
    }

    public function __toString()
    {
        return "Nome: " . $this->nome . " Latitudine: " . $this->latitudine . " Longitudine: " . $this->longitudine;
    }

    public function jsonSerialize()
    {
        return [
            'nome' => $this->getNome(),
            'latitudine' => $this->getLatitudine(),
            'longitudine' => $this->getLongitudine(),
        ];
    }
}