<!DOCTYPE html>
<html>
	<head>
		<title>jQuery FormBuilder Demo (Output)</title>
		<meta charset="utf-8" />
		<link href="../../../css/jquery.formbuilder.css" media="screen" rel="stylesheet" />
	</head>
	<body>

<?php

require('Formbuilder/Formbuilder.php');

// At this stage, we simulate getting an array of the
// form_structure and hash from our database. This is
// how the form data would have been saved using
// the $form->get_encoded_form_array() method.
include('fake-form-db-vals.php');

$form = new Formbuilder($fake_db_vals);
$form->render_html('example-submit.php');

// OR to load a form saved to the db:

//require('Formbuilder/Formbuilder_pdo.php');
//$form = new Formbuilder_pdo();
//$form->connect();
//$form->render_html( 1, 'example-submit.php' );

?>

	</body>
</html>