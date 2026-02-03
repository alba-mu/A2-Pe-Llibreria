<?php
/**
 * File: AuthorController.class.php
 * Description: Controller for author-related operations. Handles request routing and coordinates between
 * model (AuthorModel) and view (AuthorView). Manages form validation, database operations, and view rendering.
 */

require_once "view/AuthorView.class.php";
require_once "model/AuthorModel.class.php";
require_once "model/Author.class.php";
require_once "util/AuthorMessage.class.php";
require_once "util/AuthorFormValidation.class.php";

/**
 * AuthorController - Controller for Author Entity
 * Manages author CRUD operations, form validation, and view rendering
 * Implements MVC pattern for author-related functionality
 */
class AuthorController {

    private $view;
    private $model;

    public function __construct() {
        $this->view=new AuthorView();
        $this->model=new AuthorModel();
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
            case "form_search":
                $this->formSearch();
                break;
            case "show_details":
                $this->showDetails();
                break;
            case "form_add":
                $this->formAdd();
                break;
            case "add":
                $this->add();
                break;
            case "search":
                $this->searchById();
                break;
            default:
                $this->view->display();
        }
    }

    /**
     * Displays list of all authors from the database
     * Sets error message if no authors found
     * 
     * @return void
     */
    public function listAll() {
        $authors=$this->model->listAll();

        if (empty($authors)) {
            // keep $_SESSION['error'] as an array and append the message
            $_SESSION['error'][]=AuthorMessage::ERR_FORM['not_found'];
        }

        $this->view->display("view/form/AuthorList.php", $authors);
    }

    /**
     * Displays the search form for finding authors' details by ID
     * 
     * @return void
     */
    public function formSearch() {
        $this->view->display("view/form/AuthorFormSearch.php");
    }


    /**
     * Executes action to search and display an author's details and books
     * Validates author ID and retrieves associated books
     * 
     * @return void
     */
    public function showDetails() {
        $authorInput=AuthorFormValidation::checkData(AuthorFormValidation::SEARCH_FIELDS);

        if (!empty($_SESSION['error'])) {
            $this->view->display("view/form/AuthorFormSearch.php");
            return;
        }

        $author=$this->model->getAuthorById($authorInput->getId(), true);

        if (is_null($author)) {
            $_SESSION['error'][]=AuthorMessage::ERR_FORM['not_found'];
        }

        $this->view->display("view/form/AuthorFormSearch.php", $author);
    }
    

    /**
     * Displays the author insertion form
     * Allows user to enter author information for adding to database
     *
     * @return void
     */
    public function formAdd() {
        $this->view->display("view/form/AuthorFormAdd.php");
    }
    

    /**
     * Executes action to add a new author to the database
     * Validates form fields, inserts into database, sets success or error messages
     * 
     * @return void
     */
    public function add() {
        $authorInput=AuthorFormValidation::checkData(array_merge(AuthorFormValidation::ADD_FIELDS));

        if (!empty($_SESSION['error'])) {
            $this->view->display("view/form/AuthorFormAdd.php", $authorInput);
            return;
        }

        $added=$this->model->add($authorInput);

        if ($added) {
            $_SESSION['info'][]=AuthorMessage::INF_FORM['insert'];
        } else {
            $_SESSION['error'][]=AuthorMessage::ERR_DAO['insert'];
        }

        $this->view->display("view/form/AuthorFormAdd.php", $authorInput);
    }


        
    /**
     * Displays the home page view
     */
    public function showHome() {
        $this->view->display("view/HomePage.php");
    }

}
