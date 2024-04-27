<?php
require_once 'Eintrag.class.php';
class Blog
{
    private $filename = 'daten/blog.txt';
    private $eintraege = array();

    public function __construct()
    {
        $this->load();
    }
    public function __destruct()
    {
    }

    public function addEintrag($titel, $inhalt): void
    {

        //$this->eintraege[] = new Eintrag($titel, $inhalt, $datum);
        array_unshift($this->eintraege, new Eintrag($titel, $inhalt));
        $this->save();
    }

    /*public function getEintrag($key)
    {
        if (isset($this->eintraege[$key]) && is_numeric($key)) {
            $titel = $this->eintraege[$key]->getTitel();
            $inhalt = $this->eintraege[$key]->getInhalt();
            return ['titel' => $titel, 'inhalt' => $inhalt];
        }
        return null;
    }*/

    public function getEintrag($key)
    {
        if (isset($this->eintraege[$key]) && is_numeric($key)) {
            return $this->eintraege[$key];
        }
        return null;
    }

    public function delEintrag($key)
    {
        $erg = false;
        if (isset($this->eintraege[$key]) && is_numeric($key)) {
            unset($this->eintraege[$key]);
            $this->save();
            $erg = true;
        }
        return $erg;
    }

    public function editEintrag($key, $titel, $inhalt)
    {
        if (is_null($titel))
            return false;

        $erg = false;

        if (isset($this->eintraege[$key]) && is_numeric($key)) {
            $this->eintraege[$key]->setTitel($titel);
            $this->eintraege[$key]->setInhalt($inhalt);
            $this->save();
            $erg = true;
        }

        return $erg;
    }
    # to complete...
    public function isTitelVorhanden($titel)
    {
        $erg = false;
        foreach ($this->getEintraege() as $eintrag) {
            if ($eintrag->getTitel() === $titel) {
                $erg = true;
                break;
            }
        }
        return $erg;
    }

    public function countEintraege($eintraege)
    {
        return count($eintraege);
    }

    public function getEintraege()
    {
        return $this->eintraege;
    }

    private function load()
    {
        if (file_exists($this->filename))
            $this->eintraege = unserialize(file_get_contents($this->filename));
    }
    private function save()
    {
        file_put_contents($this->filename, serialize($this->eintraege));
    }
}
