<?php

class ItemModel
{
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getItems(){
        $sql = "SELECT * FROM item";

        try{
            $result = $this->db->query($sql,PDO::FETCH_ASSOC);
            $result=$this->db->prepare($sql);
            $result->execute();
            return $result ;

        }catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function addItem($data){
        $image = $this->upload_file($_FILES["image"]); // se proceseaza imaginea si este afisata in tabel
        $sql = "INSERT INTO item (title,text,category,image) VALUES(:title,:text , :category , :image)";

        try{//ne asiguram ca datele sunt valide si nu contin SQL injection
            $statement = $this->db->prepare($sql);
            $statement->bindParam(':title',$data['title'],PDO::PARAM_STR,256 );
            $statement->bindParam(':text',$data['text'],PDO::PARAM_STR,256);
            $statement->bindParam(':category',$data['category'],PDO::PARAM_STR,256);
            $statement->bindParam(':image',$image);
            $statement->execute();

        }catch (PDOException $e){
            echo $e->getMessage();
        }

    }

    public function deleteItem($data){
        $sql = "DELETE FROM item WHERE id='{$data['id']}';";
        try {
            $this->db->query($sql);
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function editItem($data){
        $image = $this->upload_file($_FILES["image"]);
        $sql = "UPDATE item SET title='{$data['title']}',text='{$data['text']}',category='{$data['category']}',image='$image' WHERE id='{$data['id']}'";

        try {
            $this->db->query($sql);
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function upload_file($file)
    {
        if(isset($file))
        {
            $extension = explode('.', $file["name"]);
            $new_name = rand() . '.' . $extension[1];
            $destination = 'images/' . $new_name;
            move_uploaded_file($file['tmp_name'], $destination);
            return $new_name;
        }
    }


}