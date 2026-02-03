<?php
/**
 * File: AuthorModel.class.php
 * Description: Business logic layer for author operations. Acts as intermediary between controller and database layer.
 * Provides methods for querying and modifying author data.
 */

require_once "model/persist/AuthorDbDAO.class.php";

/**
 * AuthorModel - Business Logic Layer
 * Manages author-related operations and delegates database operations to AuthorDbDAO
 */
class AuthorModel {

    private $dataAuthor;

    public function __construct() {        
        // Database
        $this->dataAuthor=AuthorDbDAO::getInstance();
    }

    /**
     * list all authors
     * @param void
     * @return array of Author objects or array void
     */    
    public function listAll():array {
        $authors=$this->dataAuthor->listAll();
        
        return $authors;
    }

    /**
    * select an author by Id
    * @param $id string Author Id
    * @param $withBooks bool include books list
    * @return Author object or NULL
    */
    public function getAuthorById($id, bool $withBooks=false) {
        return $this->dataAuthor->findById($id, $withBooks);
    }

    /**
     * insert an author
     * @param $author Author object to insert
     * @return TRUE or FALSE
     */
    public function add($author):bool {
        $result=$this->dataAuthor->add($author);
        
        if ($result==FALSE) {
            $_SESSION['error']=AuthorMessage::ERR_DAO['insert'];
        }
        
        return $result;
    }

}
