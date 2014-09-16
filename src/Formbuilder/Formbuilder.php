<?php

require('Form.php');

/**
 * @package 	formbuilder
 * @author 		Michael Botsko
 * @copyright 	2014 Helion3
 *
 * This PHP object is an example server-side component of the formbuilder
 * plugin. Formbuilder allows you to provide users with a way of
 * creating a form and saving that structure to the database.
 *
 * Using this class you can easily prepare the structure for storage,
 * rendering the json for the editor or html.
 *
 */

class Formbuilder {

    /**
     * Read the model from an incoming stream
     */
    public static function readFromStream(){
        $json = json_decode(file_get_contents('php://input'), true);
        return new Formbuilder\Form($json);
    }

    /**
     * Read the model json from a file
     * @param $file
     * @return \Formbuilder\Form
     * @throws Exception
     */
    public static function readFromFile( $file ){
        if( !file_exists($file) ){
            throw new Exception('File does not exist.');
        }
        $json = json_decode(file_get_contents($file), true);
        return new Formbuilder\Form($json);
    }
}