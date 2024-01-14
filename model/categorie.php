<?php
// require_once './config.php';

class categorie{
    private $id_category;
    private $name_category;

    public function __construct($id_category, $name_category){
        $this->id_category = $id_category;
        $this->name_category = $name_category;
    }

    public function __get($prop){
        return $this->$prop;
    }

    public function __set($prop, $value){
        $this->$prop = $value;
    }

    public static function addcategory($name_category)
    {
        $sql = DBconnection::connection()->prepare("INSERT INTO categorie(name_category) VALUES(:name_category)");
        $sql->bindParam(':name_category', $name_category);
        $sql->execute();
    }

    public static function showcategory(){
        $sql = DBconnection::connection()->query("SELECT * FROM categorie");
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        $cat = array();
        
        foreach ($result as $row){
            $catobj = new categorie($row['id_category'], $row['name_category']);
            array_push($cat, $catobj);

        }
        return  $cat; 
    } 

    public static function deletecategory($id_category){
        
        $req = DBconnection::connection()->prepare("DELETE FROM categorie WHERE id_category = :id_category");
        $req->bindParam(':id_category', $id_category);
        $req->execute();    

    }
    public static function modifycategory($id_category, $name_category) {
        try {
            $req = DBconnection::connection()->prepare("UPDATE categorie SET name_category = :name_category WHERE id_category = :id_category");
            $req->bindParam(':name_category', $name_category);
            $req->bindParam(':id_category', $id_category);
            $req->execute();

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}


// $cat = categorie::showcategory();

// foreach($cat as $row){
//     echo $row->__get('name_category');
// }