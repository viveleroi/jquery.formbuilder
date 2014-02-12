<?php
/**
 * @package 	jquery.Formbuilder
 * @author 		Michael Botsko
 * @copyright 	2009, 2012 Trellis Development, LLC
 *
 * This PHP object is the server-side component of the jquery formbuilder
 * plugin. The Formbuilder allows you to provide users with a way of
 * creating a formand saving that structure to the database.
 *
 * Using this class you can easily prepare the structure for storage,
 * rendering the xml file needed for the builder, or render the html of the form.
 *
 * This package is licensed using the Mozilla Public License 1.1
 *
 * We encourage comments and suggestion to be sent to mbotsko@trellisdev.com.
 * Please feel free to file issues at http://github.com/botskonet/jquery.formbuilder/issues
 * Please feel free to fork the project and provide patches back.
 */


// Here is an example as how you could store the form data in a MySQL database using PDO

/**
 * @abstract This class is a database integration handler example
 * the jquery formbuilder plugin.
 * @package jquery.Formbuilder
 */
class Formbuilder_pdo extends Formbuilder {
	
	/**
	 * Contains PDO connection object
	 * @var object 
	 */
	private $_db;
	
	
	/**
	 * Connection statement
	 * @param type $url
	 * @param type $user
	 * @param type $pass
	 * @return boolean 
	 */
	public function connect($url = "mysql:host=127.0.0.1;dbname=formbuilder", $user = "root", $pass = ""){
		try {
			$this->_db = new PDO($url, $user, $pass);
			return true;
		} catch(PDOException $e) {
			trigger_error($e->getMessage(), E_USER_ERROR);
		}
		return false;
	}
	
	
	/**
	 * Save the data to the database, but still returns the $for_db array.
	 */
	public function save_form(){
		$for_db = parent::get_encoded_form_array();
		if($for_db['form_id']){
			$stmt = $this->_db->prepare("UPDATE fb_savedforms SET form_structure = :struct WHERE id = :id");
			$stmt->bindParam(':id', $for_db['form_id'], PDO::PARAM_INT);
		} else {
			$stmt = $this->_db->prepare("INSERT INTO fb_savedforms (form_structure) VALUES (:struct)");
		}
		$stmt->bindParam(':struct', $for_db['form_structure'], PDO::PARAM_STR);
		$stmt->execute();
	}
	
	
	/**
	 * Overrides the render json method to load the structure from the database
	 */
	public function render_json( $form_db_id = false ){
		if($form_db_id){
			$form = $this->loadFormRecord($form_db_id);
			if($form){
				header("Content-Type: application/json");
				$ret = array("form_id" => $form['id'], "form_structure" => json_decode($form['form_structure']) );
				print json_encode( $ret );
			}
		}
	}
	
	
	/**
	 *
	 * @param type $form_db_id
	 * @param type $form_action 
	 */
	public function render_html( $form_db_id = false, $form_action = "" ){
		if($form_db_id){
			$form = $this->loadFormRecord($form_db_id);
			if($form){
				parent::__construct($form);
			}
		}
		parent::render_html($form_action);
	}
	
	
	/**
	 * 
	 * @param type $form_db_id
	 * @return type 
	 */
	public function save_response( $form_db_id = false ){
		$results = $this->process($form_db_id);
		if($results['success']){
			$stmt = $this->_db->prepare("INSERT INTO fb_savedresponses (response_json,date_created) VALUES (:json,:date)");
			$stmt->bindParam(':json', json_encode($results['results']), PDO::PARAM_STR);
			$stmt->bindParam(':date', date("Y-m-d H:i:s"), PDO::PARAM_STR);
		$stmt->execute();
		}
		return $results;
	}
	
	
	/**
	 *
	 * @param type $form_db_id
	 * @param type $form_action 
	 */
	public function process( $form_db_id = false ){
		if($form_db_id){
			$form = $this->loadFormRecord($form_db_id);
			if($form){
				parent::__construct($form);
			}
		}
		return parent::process();
	}
	
	
	/**
	 * Query the database for the form
	 * @param type $form_db_id
	 * @return boolean 
	 */
	protected function loadFormRecord($form_db_id = false){
		if($form_db_id){
			$stmt = $this->_db->prepare("SELECT * FROM fb_savedforms WHERE id = :id");
			$stmt->bindParam(':id', $form_db_id, PDO::PARAM_INT);
			$stmt->execute();
			if($stmt->rowCount()){
				while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
					return $row;
					break;
				}
			}
			exit;
		}
		return false;
	}
}
?>