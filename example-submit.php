<!DOCTYPE html>
<html>
	<head>
		<title>jQuery FormBuilder Demo (Submission)</title>
		<meta charset="utf-8" />
	</head>
	<body>

<?php

require('Formbuilder/Formbuilder.php');

// At this stage, we simulate getting an array of the
// form_structure and hash from our database. This is
// how the form data would have been saved using
// the $form->get_encoded_form_array() method.
include('fake-form-db-vals.php');

//$form = new Formbuilder($fake_db_vals);
//$results = $form->process();

// OR to process a form saved to the db:

require('Formbuilder/Formbuilder_pdo.php');
$form = new Formbuilder_pdo();
$form->connect();
$results = $form->process(1);

print '<pre>';
var_dump($results);
print '</pre>';

?>

	</body>
</html>