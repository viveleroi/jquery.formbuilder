<?php

require('Formbuilder/Formbuilder.php');

// Grab the incoming form JSON
$form = Formbuilder::readFromStream();

/**
 * Save the JSON to a database, identified by $json['form_id']
 * In these examples, we use MongoDB
 */

// Connect to a Mongo DB
$m = new MongoClient();
$forms_collection = $m->formbuilder->forms;

// Insert or update a record
$json = $form->getJSON();
$forms_collection->update( array('form_id' => $json['form_id']), $json, array('upsert'=>true,'fsync' => true) );

// anything other than 200 ok will cause the formbuilder UI to show an error