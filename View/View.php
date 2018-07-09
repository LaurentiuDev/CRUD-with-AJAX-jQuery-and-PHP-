<?php

class View{
    protected $results;

    public function setResults($results){
        $this->results = $results;
    }


    public function set($param, $value){
        $this->$param = $value;
    }

    public function render($layout) {
        return "Layouts/$layout.php"; // afisam tabelul actualizat
    }
}