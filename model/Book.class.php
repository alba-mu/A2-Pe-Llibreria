<?php
/**
 * File: Book.class.php
 * Description: Entity class representing a book with properties for id, isb, titol, author, and publication year.
 * Includes methods for managing book details.
 */

class Book {

    private $id;
    private $isbn;
    private $titol;
    private $any_publicacio;
    private $autor_id;

    /**
     * Constructor for Book class
     * 
     * @param int|null $id Book identifier
     * @param string|null $isbn Book ISBN
     * @param string|null $titol Book titol
     * @param int|null $any_publicacio Book publication year
     * @param int|null $autor_id Book author ID
     */
    public function __construct($id=NULL, $isbn=NULL, $titol=NULL, $any_publicacio=NULL, $autor_id=NULL) {
        $this->id=$id;
        $this->isbn=$isbn;
        $this->titol=$titol;
        $this->any_publicacio=$any_publicacio;
        $this->autor_id=$autor_id;
    }
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id=$id;
    }

    public function getIsbn() {
        return $this->isbn;
    }   

    public function setIsbn($isbn) {
        $this->isbn=$isbn;
    }   

    public function getTitol() {
        return $this->titol;
    }

    public function setTitol($titol) {
        $this->titol=$titol;
    }

    public function getAny_publicacio() {
        return $this->any_publicacio;
    }

    public function setAny_publicacio($any_publicacio) {
        $this->any_publicacio=$any_publicacio;
    }

    public function getAutorId() {
        return $this->autor_id;
    }

    public function setAutorId($autor_id) {
        $this->autor_id=$autor_id;
    }

    public function __toString() {
        return sprintf("%s;%s;%s;%s;%s\n", $this->id, $this->isbn, $this->titol, $this->any_publicacio, $this->autor_id);
    }

}