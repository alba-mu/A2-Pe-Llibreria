<?php
/**
 * File: BookDbDAO.class.php
 * Description: Data Access Object (DAO) for Book entity. Handles all database operations related to books.
 * Implements Singleton pattern to ensure single database connection instance.
 * Supports CRUD operations for books and retrieves associated authors.
 */

require_once "model/persist/ConnectDb.class.php";
require_once "model/Author.class.php";
require_once "model/Book.class.php";

/**
 * BookDbDAO - Data Access Object
 * Singleton pattern implementation for database operations on books
 */
class BookDbDAO {

    private static $instance = NULL;
    private $connect;

    public function __construct() {
        $this->connect = (new ConnectDb())->getConnection();
    }

    public static function getInstance(): BookDbDAO {
        if (self::$instance == NULL) {
            self::$instance = new self();
        }
        return self::$instance;
    }


    /**
     * Retrieves all books from the database
     *
     * @return array Array of Book objects, empty array if none found
     */
    public function listAll(): array {
        $result = array();

        if ($this->connect == NULL) {
            $_SESSION['error'] = "No s'ha pogut connectar amb la base de dades";
            return $result;
        };

        try {
            $sql = <<<SQL
                SELECT id,isbn,titol,any_publicacio,autor_id FROM llibres;
            SQL;

            $result = $this->connect->query($sql);

            $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Book');

            return $result->fetchAll();
        } catch (PDOException $e) {
            return $result;
        }

        return $result;
    }

}
