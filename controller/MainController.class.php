<?php
/**
 * File: MainController.class.php
 * Description: Main entry point controller that routes requests to appropriate sub-controllers.
 * Handles menu navigation and delegates to AuthorController or BookController for author or book-related operations.
 */

require_once "controller/AuthorController.class.php";
require_once "controller/BookController.class.php";

/**
 * MainController - Primary Request Router
 * Routes menu requests to appropriate controllers (Author, Book, etc.)
 */
class MainController {

    /**
     * Processes incoming requests and routes to appropriate controller
     * Retrieves menu selection from GET parameter and delegates to corresponding controller
     * Default route displays home page through AuthorController
     * 
     * @return void
     */
    public function processRequest() {

        $request=NULL;
        if (filter_has_var(INPUT_GET, 'menu')) {
            $request=filter_input(INPUT_GET, 'menu');
        }

        $controlLogin=NULL;
        switch ($request) {
            case "author":
                $controlAuthor=new AuthorController();
                $controlAuthor->processRequest();
                break;

            case "book":
                $controlBook=new BookController();
                $controlBook->processRequest();
                break;

            default:
                $controlAuthor=new AuthorController();
                $controlAuthor->showHome();
                break;
        }

    }
    
}
