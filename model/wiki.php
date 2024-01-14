<?php

    // require '../config.php';


class wiki{
    private $id_wiki;
    private $name_wiki;
    private $description_wiki;
    private  $category;
    private  $tags;
    private $status;
    private $image;
    private $date;
    private user $user;

    public function __construct($id_wiki,$name_wiki, $description_wiki, $category){
        $this->id_wiki= $id_wiki;
        $this->name_wiki= $name_wiki;
        $this->description_wiki= $description_wiki;
        $this->category= $category;

    }
    
    public function __get($prop){
        return $this->$prop;
    }

    public function __set($prop, $value){
        $this->$prop = $value;
    }

    public static function addwiki($name_wiki, $description_wiki, $category, $tags, $image, $date){
        $sql = DBconnection::connection()->prepare("INSERT INTO wikis(name_wiki, description_wiki, category, tags, status, image, date) VALUES(:name_wiki, :description_wiki, :category, :tags, 1, :image, :date)");
        $sql->bindParam(':name_wiki', $name_wiki);
        $sql->bindParam(':description_wiki', $description_wiki);
        $sql->bindParam(':category', $category);
        $sql->bindParam(':tags', $tags);
        $sql->bindParam(':image', $image);
        $sql->bindParam(':date', $date);


        $sql->execute();
    }

    public static function showwiki(){
        $sql = DBconnection::connection()->query("SELECT * FROM wikis where status = 1");
    
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            $wikis = array();
            
            foreach ($result as $row){
                $wik = new wiki($row['id_wiki'], $row['name_wiki'], $row['description_wiki'], $row['category'], $row['id_user']);
                array_push($wikis, $wik);
    
            }
            return  $wikis;
    }
    public static function deletewiki($id_wiki){
        
        $req = DBconnection::connection()->prepare("DELETE FROM wikis WHERE id_wiki = :id_wiki");
        $req->bindParam(':id_wiki', $id_wiki);
        $req->execute();    

    }

    public static function archivewiki($id_wiki){
        $req = DBconnection::connection()->prepare("UPDATE wikis set status = 0 WHERE id_wiki = :id_wiki");
        $req->bindParam(':id_wiki', $id_wiki);
        $req->execute();
    }

    public static function showwikicat($category){
        $req = DBconnection::connection()->prepare("SELECT * FROM wikis where category = :category and status = 1");
        $req->bindParam(':category', $category);
        $req->execute();

        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        $wikis = array();
        
        foreach ($result as $row){
            $wik = new wiki($row['id_wiki'], $row['name_wiki'], $row['description_wiki'], $row['category']);
            array_push($wikis, $wik);

        }
        return  $wikis;


    }

    public static function showwikiid($id_wiki){
        $req = DBconnection::connection()->prepare("SELECT * FROM wikis where id_wiki = :id_wiki and status = 1");
        $req->bindParam(':id_wiki', $id_wiki);
        $req->execute();

        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        $wikis = array();
        
        foreach ($result as $row){
            $wik = new wiki($row['id_wiki'], $row['name_wiki'], $row['description_wiki'], $row['category']);
            array_push($wikis, $wik);

        }
        return  $wikis;


    }

    public static function showLastWikis(){
        $req = DBconnection::connection()->query("SELECT * FROM wikis ORDER BY date DESC");

        
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        $wikis = array();
        
        foreach ($result as $row){
            $wik = new wiki($row['id_wiki'], $row['name_wiki'], $row['description_wiki'], $row['category']);
            array_push($wikis, $wik);

        }
        return  $wikis;
    }

    public static function CountWiki(){
        $req = DBconnection::connection()->query("SELECT COUNT(*) as totalWiki FROM wikis");
        $result = $req->fetchAll(PDO::FETCH_ASSOC);

        return $result['totalWiki'];

    }
}