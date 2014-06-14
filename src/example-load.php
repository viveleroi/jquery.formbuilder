<?php

require('Formbuilder/Formbuilder.php');

// At this stage, we simulate getting an array of the
// form_structure and hash from our database. This is
// how the form data would have been saved using
// the $form->get_encoded_form_array() method.


// Grab the incoming form JSON
//$form = Formbuilder::readFromFile( 'fake-form-db-vals.json' );

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