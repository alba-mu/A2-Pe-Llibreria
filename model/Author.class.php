<?php
/**
 * File: Author.class.php
 * Description: Entity class representing an author with properties for id, name, nationality, and birth year.
 * Includes methods for managing pets associated with the author.
 */

class Author {

    private $id;
    private $nom;
    private $nacionalitat;
    private $any_naixement;
    private $booksList; // array of Book objects

    /**
     * Constructor for Author class
     * 
     * @param int|null $id Author identifier
     * @param string|null $nom Author name
     * @param string|null $nacionalitat Author nationality
     * @param int|null $any_naixement Author birth year
     */
    public function __construct($id=NULL, $nom=NULL, $nacionalitat=NULL, $any_naixement=NULL) {
        $this->id=$id;
        $this->nom=$nom;
        $this->nacionalitat=$nacionalitat;
        $this->any_naixement=$any_naixement;
    }
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id=$id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom=$nom;
    }

    public function getNacionalitat() {
        return $this->nacionalitat;
    }

    public function setNacionalitat($nacionalitat) {
        $this->nacionalitat=$nacionalitat;
    }

    public function getAnyNaixement() {
        return $this->any_naixement;
    }

    public function setAnyNaixement($any_naixement) {
        $this->any_naixement=$any_naixement;
    }

    public function getBooksList() {
        return $this->booksList;
    }

    public function setBooksList($booksList) {
        $this->booksList=$booksList;
    }

    public function __toString() {
        return sprintf("%s;%s;%s;%s\n", $this->id, $this->nom, $this->nacionalitat, $this->any_naixement); // array of Book objects is excluded
    }

}