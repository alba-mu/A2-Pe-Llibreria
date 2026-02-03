<?php
/**
 * File: BookModel.class.php
 * Description: Business logic layer for book operations. Acts as intermediary between controller and database layer.
 * Provides methods for querying and modifying book data.
 */

require_once "model/persist/BookDbDAO.class.php";

/**
 * BookModel - Business Logic Layer
 * Manages book-related operations and delegates database operations to BookDbDAO
 */
class BookModel {

    private $dataBook;

    public function __construct() {        
        // Database
        $this->dataBook=BookDbDAO::getInstance();
    }

    /**
     * list all books
     * @param void
     * @return array of Book objects or array void
     */    
    public function listAll():array {
        $books=$this->dataBook->listAll();

        return $books;
    }
    
}
