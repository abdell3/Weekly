<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;


    // private $id;
    // private $nom;
    // private $slug;
    // private $annonces = [];


    // public function __construct($nom, $slug){
    //     $this->nom = $nom;
    //     $this->slug = $slug;
    // }

    // public function getId() {
    //   return $this->id;
    // }
    // public function setId($value) {
    //   $this->id = $value;
    // }


    // public function getNom() {
    //   return $this->nom;
    // }
    // public function setNom($value) {
    //   $this->nom = $value;
    // }

    // public function getSlug() {
    //   return $this->slug;
    // }
    // public function setSlug($value) {
    //   $this->slug = $value;
    // }

    // public function getAnnonces() {
    //   return $this->annonces;
    // }
    // public function setAnnonces($value) {
    //   $this->annonces = $value;
    // }

    

    public static function getCategory(){
        return self::latest()->paginate(10);
    }



    public static function createCategory($data){
        return self::create($data);
    }


    public function updateCaregory($data){
        return $this->update($data);
    }

    public function deletCategory(){
        return $this->delete();
    }

    public static function getBySlug($slug)
    {
        return self::where('slug', $slug)->first();
    }


}
