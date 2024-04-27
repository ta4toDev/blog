<?php
class Eintrag
{
    private $titel = '';
    private $inhalt = '';
    private $datum = '';


    public function __construct($titel, $inhalt)
    {
        $this->titel = $titel;
        $this->inhalt = $inhalt;
        $this->datum = date("d-m-Y H:i:s");
    }

    public function __destruct()
    {
    }


    public function setTitel(string $titel): void
    {
        $this->titel = $titel;
    }

    public function setInhalt(string $inhalt): void
    {
        $this->inhalt = $inhalt;
    }
    public function setDatum($datum): void
    {
        $this->datum = date("d-m-Y H:i:s");
    }

    public function getDatum()
    {
        return $this->datum;
    }
    public function getTitel()
    {
        return $this->titel;
    }
    public function getInhalt()
    {
        return $this->inhalt;
    }
    public function getInhaltKurz($inhalt)
    {
        printf("[%-10.9s]\n", $inhalt);
    }

    public function getDeDatum()
    {
    }
}
