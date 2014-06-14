<?php
/**
 * Created by PhpStorm.
 * User: botskonet
 * Date: 6/13/14
 * Time: 4:23 PM
 */

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
}