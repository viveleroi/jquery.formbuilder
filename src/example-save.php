<?php

require('Formbuilder/Formbuilder.php');

// At this stage, we want to pass in the POST value
// containing the form. In this example we simply
// pass POST directly, but DO NOT use POST without
// proper security in place.

// The get_encoded_form_array() method returns an array that should be
// used to store the values in the database. This array
// is also what's passed to the class when rendering
// or editing the form.

$form_data = isset($_POST['frmb']) ? $_POST : false;
$form = new Formbuilder($form_data);
$for_db = $form->get_encoded_form_array();


//------------------------------------------------------------------------------

// OR, you could use our database object with some database connection
// information to automatically save everything to the database.
// You could do that like so:

//require('Formbuilder/Formbuilder_pdo.php');
//$form_data = isset($_POST['frmb']) ? $_POST : false;
//$form = new Formbuilder_pdo($form_data);
//$form->connect();
//$form->save_form();


//------------------------------------------------------------------------------

// Here's the example output of get_encoded_form_array()

print_r($for_db);
//Array
//(
//    [form_id] => 1
//    [form_structure] => [{"cssClass":"input_text","required":"undefined","values":"First Name"},{"cssClass":"input_text","required":"undefined","values":"Last Name"},{"cssClass":"textarea","required":"undefined","values":"Bio"},{"cssClass":"checkbox","required":"undefined","title":"What's on your pizza?","values":{"2":{"value":"Extra Cheese","baseline":"undefined"},"3":{"value":"Pepperoni","baseline":"undefined"},"4":{"value":"Beef","baseline":"undefined"}}}]
//)

?>