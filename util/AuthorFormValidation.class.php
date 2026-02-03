<?php
/**
 * File: AuthorFormValidation.class.php
 * Description: Form validation utility class with regex patterns and field validation logic.
 * Validates author-related form inputs including ID, name, nationality, and birth year.
 * Returns validated Author object with error messages stored in session if validation fails.
 */

class AuthorFormValidation {

    const SEARCH_FIELDS = array('id');
    const ADD_FIELDS = array('name', 'nacionalitat', 'any_naixement');
    
    const NUMERIC = "/[^0-9]/";
    const YEAR = "/^(19|20)\d{2}$/";
    const TEXT = "/^[a-zA-ZÀ-ÿ\s]{1,150}$/";
    
    
    /**
     * Static method to validate form data and return Author object
     * Validates fields according to ADD_FIELDS or SEARCH_FIELDS constants
     * Stores validation error messages in $_SESSION['error'] array
     * Only validates ID, name, nationality and birth year fields
     * 
     * @param array $fields Array of field names to validate
     * @return Author Author object with validated data (name is always NULL)
     */
    public static function checkData($fields) {
        $id=NULL;
        $nom=NULL;
        $nacionalitat=NULL;
        $any_naixement=NULL;
        
        foreach ($fields as $field) {
            switch ($field) {
                case 'id':
                    $id=trim(filter_input(INPUT_POST, 'id'));
                    $idValid=!preg_match(self::NUMERIC, $id);
                    if ($id === '') {
                        array_push($_SESSION['error'], AuthorMessage::ERR_FORM['empty_id']);
                    }
                    else if ($idValid == FALSE) {
                        array_push($_SESSION['error'], AuthorMessage::ERR_FORM['invalid_id']);
                    }
                    break;
                case 'nom':
                    $nom=trim(filter_input(INPUT_POST, 'nom'));
                    $nomValid=preg_match(self::TEXT, $nom);
                    if (empty($nom)) {
                        array_push($_SESSION['error'], AuthorMessage::ERR_FORM['empty_nom']);
                    }
                    else if ($nomValid == FALSE) {
                        array_push($_SESSION['error'], AuthorMessage::ERR_FORM['invalid_nom']);
                    }
                    break;
                case 'nacionalitat':
                    $nacionalitat=trim(filter_input(INPUT_POST, 'nacionalitat'));
                    $nacionalitatValid=preg_match(self::TEXT, $nacionalitat);
                    if (empty($nacionalitat)) {
                        array_push($_SESSION['error'], AuthorMessage::ERR_FORM['empty_nacionalitat']);
                    }
                    else if ($nacionalitatValid == FALSE) {
                        array_push($_SESSION['error'], AuthorMessage::ERR_FORM['invalid_nacionalitat']);
                    }
                    break;
                case 'any_naixement':
                    $any_naixement=trim(filter_input(INPUT_POST, 'any_naixement'));
                    $any_naixementValid=preg_match(self::YEAR, $any_naixement);
                    if (empty($any_naixement)) {
                        array_push($_SESSION['error'], AuthorMessage::ERR_FORM['empty_any_naixement']);
                    }
                    else if ($any_naixementValid == FALSE) {
                        array_push($_SESSION['error'], AuthorMessage::ERR_FORM['invalid_any_naixement']);
                    }
            }
        }

        $author=new Author($id, $nom, $nacionalitat, $any_naixement);

        return $author;
    }
    
}
