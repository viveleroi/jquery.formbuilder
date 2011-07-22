<?php

require('Formbuilder/Formbuilder.php');

// At this stage, we want to pass in the POST value
// containing the form. In this example we simply
// pass POST directly, but DO NOT use POST without
// proper security in place.

$form_data = isset($_POST['frmb']) ? $_POST['frmb'] : false;
$form = new Formbuilder($form_data);
$for_db = $form->store();

// The store() method returns an array that should be
// used to store the values in the database. This array
// is also what's passed to the class when rendering
// or editing the form.

print_r($for_db);

/*
Outputs:
Array
(
    [form_structure] => a:4:{i:0;a:3:{s:8:"cssClass";s:10:"input_text";s:8:"required";s:9:"undefined";s:6:"values";s:4:"Name";}i:1;a:3:{s:8:"cssClass";s:10:"input_text";s:8:"required";s:7:"checked";s:6:"values";s:15:"E-mail Address?";}i:2;a:4:{s:8:"cssClass";s:8:"checkbox";s:8:"required";s:9:"undefined";s:5:"title";s:11:"Choose any:";s:6:"values";a:4:{i:2;a:2:{s:5:"value";s:3:"PHP";s:8:"baseline";s:7:"checked";}i:3;a:2:{s:5:"value";s:6:"jQuery";s:8:"baseline";s:7:"checked";}i:4;a:2:{s:5:"value";s:3:"XML";s:8:"baseline";s:7:"checked";}i:5;a:2:{s:5:"value";s:5:"Aspen";s:8:"baseline";s:9:"undefined";}}}i:3;a:4:{s:8:"cssClass";s:5:"radio";s:8:"required";s:7:"checked";s:5:"title";s:11:"Choose one:";s:6:"values";a:2:{i:2;a:2:{s:5:"value";s:3:"Yes";s:8:"baseline";s:7:"checked";}i:3;a:2:{s:5:"value";s:2:"No";s:8:"baseline";s:9:"undefined";}}}}
    [form_hash] => 360e29fdc91a4a1fa4664b43d914f4b34d4eee6f
)
 */

// Save the two fields above into the database, and provide them
// back to the formbuilder class when rendering/editing.

?>