<?php
/**
 * File: BookController.class.php
 * Description: Controller for book-related operations. Handles request routing and coordinates between
 * model (BookModel) and view (BookView). Manages database operations, and view rendering.
 */

require_once "view/BookView.class.php";
require_once "model/BookModel.class.php";
require_once "model/Book.class.php";
require_once "util/BookMessage.class.php";

/**
 * BookController - Controller for Book Entity
 * Manages book CRUD operations, and view rendering
 * Implements MVC pattern for book-related functionality
 */
class BookController {

    private $view;
    private $model;

    public function __construct() {
        $this->view=new BookView();
        $this->model=new BookModel();
    }

    /**
     * Main request processor - routes requests to appropriate action methods
     * Handles both POST (form actions) and GET (menu options) requests
     * Initializes session arrays for info and error messages
     * 
     * @return void
     */
    public function processRequest() {
        
        $request=NULL;
        $_SESSION['info']=array();
        $_SESSION['error']=array();
        
        // Get action from POST request
        if (filter_has_var(INPUT_POST, 'action')) {
            $request=filter_has_var(INPUT_POST, 'action')?filter_input(INPUT_POST, 'action'):NULL;
        }
        // Get menu option from GET request
        else {
            $request=filter_has_var(INPUT_GET, 'option')?filter_input(INPUT_GET, 'option'):NULL;
        }
        
        switch ($request) {
            case "list_all":
                $this->listAll();
                break;
            default:
                $this->view->display();
        }
    }

    /**
     * Displays list of all books from the database
     * Sets error message if no books found
     * 
     * @return void
     */
    public function listAll() {
        $books=$this->model->listAll();

        if (empty($books)) {
            $_SESSION['error'][]=BookMessage::ERR_FORM['not_found'];
        }

        $this->view->display("view/form/BookList.php", $books);
    }


        
    /**
     * Displays the home page view
     */
    public function showHome() {
        $this->view->display("view/HomePage.php");
    }

}
