<?php
namespace Formbuilder;

/**
 * Represents an individual form model
 * @package Formbuilder
 */
class Form {

    /**
     * @var Holds the complete json model for a single form
     */
    protected $json;

    /**
     * Init a new form with the JSON model
     */
    public function __construct( $json ){
        $this->json = $json;
    }

    /**
     * @return JSON
     */
    public function getJSON(){
        return $this->json;
    }

    /**
     * Prints the json
     * @return string [description]
     */
    public function __toString(){
        return json_encode($this->json);
    }
}