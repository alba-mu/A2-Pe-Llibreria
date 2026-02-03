<?php
/**
 * File: Books.class.php
 * Description: Entity class representing a book with properties for id, isb, title, author, and publication year.
 * Includes methods for managing book details.
 */

class Book {

    private $id;
    private $isbn;
    private $title;
    private $publicationYear;
    private $author_id;

    /**
     * Constructor for Book class
     * 
     * @param int|null $id Book identifier
     * @param string|null $isbn Book ISBN
     * @param string|null $title Book title
     * @param int|null $publicationYear Book publication year
     * @param int|null $author_id Book author ID
     */
    public function __construct($id=NULL, $isbn=NULL, $title=NULL, $publicationYear=NULL, $author_id=NULL) {
        $this->id=$id;
        $this->isbn=$isbn;
        $this->title=$title;
        $this->publicationYear=$publicationYear;
        $this->author_id=$author_id;
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

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title=$title;
    }

    public function getPublicationYear() {
        return $this->publicationYear;
    }

    public function setPublicationYear($publicationYear) {
        $this->publicationYear=$publicationYear;
    }

    public function getAuthorId() {
        return $this->author_id;
    }

    public function setAuthorId($author_id) {
        $this->author_id=$author_id;
    }

    public function __toString() {
        return sprintf("%s;%s;%s;%s;%s\n", $this->id, $this->isbn, $this->title, $this->publicationYear, $this->author_id);
    }

}