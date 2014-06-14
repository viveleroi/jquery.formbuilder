<?php

require('Formbuilder/Formbuilder.php');

// At this stage, we simulate loading JSON from the db. 
// Remove these few lines when you have a real DB in place
$form = Formbuilder::readFromFile( dirname(__FILE__).'/fake-form-db-vals.json' );
print $form;
exit;


/**
 * Load the JSON from a database, identified by a form_id
 * In these examples, we use MongoDB
 */

// The form id of the form we need to load
$form_id = 'frmb-1402703162109';

// Connect to a Mongo DB
$m = new MongoClient();
$forms_collection = $m->formbuilder->forms;

// Insert or update a record
$form = $forms_collection->findOne( array('form_id' => $form_id) );

if( $form ){
    print json_encode($form);
}

// anything other than a 200 will prevent loading