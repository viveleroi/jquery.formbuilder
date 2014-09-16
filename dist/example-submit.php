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

$form = new Formbuilder($fake_db_vals);
$results = $form->process();

// OR you can process form based on the one stored in the db

//require('Formbuilder/Formbuilder_pdo.php');
//$form = new Formbuilder_pdo();
//$form->connect();
//$results = $form->save_response(1);

// At this point though, there are a few choices to save this to a DB
// It's harder to store the values because the fields change and are more
// flexible than normal. You can hard-code a structure of a db,
// and override the save_response method to save the field data
// to a table, one field per column. This makes it much easier to query against
// but it makes it possible for the db and the form to loose sync.

// In this example method we're only saving the json encoded response but this
// makes it a lot harder to query against. I'd recommend using something more
// appropriate for this JSON structure, like MongoDB. Anyway, good luck!




print '<pre>';
var_dump($results);
print '</pre>';


// Here is an example printing the errors
if(!empty($results['errors'])){
	print '<ul>';
	foreach($results['errors'] as $err){
		printf("<li>%s</li>\n", $err);
	}
	print '</ul>';
}
?>

	</body>
</html>