<?php
/**
 * File: AuthorDbDAO.class.php
 * Description: Data Access Object (DAO) for Author entity. Handles all database operations related to authors.
 * Implements Singleton pattern to ensure single database connection instance.
 * Supports CRUD operations for authors and retrieves associated pets.
 */

require_once "model/persist/ConnectDb.class.php";

/**
 * AuthorDbDAO - Data Access Object
 * Singleton pattern implementation for database operations on authors
 */
class AuthorDbDAO {

    private static $instance = NULL;
    private $connect;

    public function __construct() {
        $this->connect = (new ConnectDb())->getConnection();
    }

    public static function getInstance(): AuthorDbDAO {
        if (self::$instance == NULL) {
            self::$instance = new self();
        }
        return self::$instance;
    }


    /**
     * Retrieves all authors from the database
     *
     * @return array Array of Author objects, empty array if none found
     */
    public function listAll(): array {
        $result = array();

        if ($this->connect == NULL) {
            $_SESSION['error'] = "No s'ha pogut connectar amb la base de dades";
            return $result;
        };

        try {
            $sql = <<<SQL
                SELECT id,nom,nacionalitat,any_naixement FROM autors;
            SQL;

            $result = $this->connect->query($sql);

            $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Author');

            return $result->fetchAll();
        } catch (PDOException $e) {
            return $result;
        }

        return $result;
    }


    /**
     * Finds an author by ID, optionally including their books
     * 
     * @param int $id Author identifier
     * @param bool $withBooks Whether to include the author's books
     * @return Author|null Author object if found, NULL otherwise
     */
    public function findById($id, bool $withBooks=false) {
        $author = $this->fetchAuthor($id);

        if ($author != NULL && $withBooks) {
            $books = $this->fetchBooks($id);
            $author->setBooksList($books);
        }

        return $author;
    }


    /**
     * Private method to fetch a single author from the database
     * 
     * @param int $id Author identifier
     * @return Author|null Author object if found, NULL otherwise
     */
    private function fetchAuthor($id) {
        try {
            $sql = <<<SQL
                SELECT id,nom,nacionalitat,any_naixement FROM autors WHERE id=:id;
            SQL;

            $stmt = $this->connect->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();

            if ($stmt->rowCount()) {
                $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Author');
                return $stmt->fetch();
            }

            return NULL;
        } catch (PDOException $e) {
            return NULL;
        }
    }

    /**
     * Private method to fetch all books belonging to an author
     * 
     * @param int $authorId Author identifier
     * @return array Array of Book objects associated with the author
     */
    private function fetchBooks($authorId): array {
        $books = array();
        try {
            $sql = <<<SQL
                SELECT id, isbn, títol, any_publicacio, autor_id FROM llibres WHERE autor_id=:authorId;
            SQL;

            $stmt = $this->connect->prepare($sql);
            $stmt->bindParam(":authorId", $authorId, PDO::PARAM_INT);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Book');
            $books = $stmt->fetchAll();
        } catch (PDOException $e) {
            return $books;
        }

        return $books;
    }

}
