<?php

class AppController{

    protected $models;
    protected $view;

    public function init(){
        $config = ObjectFactoryService::getConfig();

        $this->models =  ObjectFactoryService::getModel('ItemModel',$config) ;
        require './View/View.php';
        $this->view = new View();

        if(isset($_POST['add'])){
            $data = $_POST; // colectam datele din formular
            $this->models->addItem($data);
            $this->view->render('ShowItems'); //afisam tabelul actualizat

        }else if(isset($_POST['del']))
        {
            $data = $_POST;// colectam datele din formular
            $this->models->deleteItem($data);
            $this->view->render('ShowItems'); //afisam tabelul actualizat

        }else if(isset($_POST['edit'])){
            $data = $_POST;// colectam datele din formular
            $this->models->editItem($data);
            $this->view->render('ShowItems'); //afisam tabelul actualizat
        }
    }
}