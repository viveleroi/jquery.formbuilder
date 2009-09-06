<?php

// please note, this class is currently in development. It will not work yet. We;re
// moving over custom code and changing it to be cleaner, more secure, and framework/site
// independent.


/**
 * 
 */


/**
 *
 */
class Formbuilder {



	// process:
	// - load form array (likely from POST, but up to user), validate it
	// - serialize it, hash it for user to save back to db
	// - render the xml necessary for the jquery plugin from the serialized input /(from user db)
	// - render the html for use within a web page
	// - process / validate the submitted data


	public function prepare_db(){

//		$form = serialize($form);
//		$hash = sha1($form);
//
//		return array('form_structure'=>$form,'form_hash'=>$hash);

	}



	public function to_xml(){

//		$editor = false;
//		if(sha1($form['structure']) == $form['hash']){
//			$editor = unserialize($form['structure']);
//		}
//
//		// begin forming the xml
		$xml = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'."\n";
//		$xml .= '<form>'."\n";
//
//		if(is_array($editor)){
//			foreach($editor as $field){
//
//				// input type="text"
//				if($field['class'] == "input_text"){
//					$xml .= sprintf('<field type="input_text" required="%s">%s</field>'."\n", $field['required'], $this->APP->xml->encode_for_xml($field['values']));
//				}
//
//				// textarea
//				if($field['class'] == "textarea"){
//					$xml .= sprintf('<field type="textarea" required="%s">%s</field>'."\n", $field['required'], $this->APP->xml->encode_for_xml($field['values']));
//				}
//
//				// input type="checkbox"
//				if($field['class'] == "checkbox"){
//					$xml .= sprintf('<field type="checkbox" required="%s" title="%s">'."\n", $field['required'], (isset($field['title']) ? $this->APP->xml->encode_for_xml($field['title']) : ''));
//					if(is_array($field['values'])){
//						foreach($field['values'] as $input){
//							$xml .= sprintf('<checkbox checked="%s">%s</checkbox>'."\n", $input['default'], $this->APP->xml->encode_for_xml($input['value']));
//						}
//					}
//					$xml .= '</field>'."\n";
//				}
//
//				// input type="radio"
//				if($field['class'] == "radio"){
//					$xml .= sprintf('<field type="radio" required="%s" title="%s">'."\n", $field['required'], (isset($field['title']) ? $this->APP->xml->encode_for_xml($field['title']) : ''));
//					if(is_array($field['values'])){
//						foreach($field['values'] as $input){
//							$xml .= sprintf('<radio checked="%s">%s</radio>'."\n", $input['default'], $this->APP->xml->encode_for_xml($input['value']));
//						}
//					}
//					$xml .= '</field>'."\n";
//				}
//
//				// select
//				if($field['class'] == "select"){
//					$xml .= sprintf('<field type="select" required="%s" multiple="%s" title="%s">'."\n", $field['required'], $field['multiple'], (isset($field['title']) ? $this->APP->xml->encode_for_xml($field['title']) : ''));
//					if(is_array($field['values'])){
//						foreach($field['values'] as $input){
//							$xml .= sprintf('<option checked="%s">%s</option>'."\n", $input['default'], $this->APP->xml->encode_for_xml($input['value']));
//						}
//					}
//					$xml .= '</field>'."\n";
//				}
//			}
//		}
//
//		$xml .= '</form>'."\n";
//
//		header("Content-Type: text/xml");
//		print $xml;


	}


//private function processSubmission(){
//
//		$results = false;
//		$error = '';
//
//		if($this->APP->params->post->getInt('form_id')){
//
//			if($form_db = $this->APP->model->quickSelectSingle('forms', $this->APP->params->post->getInt('form_id'))){
//
//				if(sha1($form_db['structure']) == $form_db['hash']){
//
//					$results 	= array();
//					$form 		= unserialize($form_db['structure']);
//
//					// Put together an array of all expected indices
//					if(is_array($form)){
//						foreach($form as $field){
//
//							$field['required'] = $field['required'] == 'true' ? true : false;
//
//							if($field['class'] == 'input_text' || $field['class'] == 'textarea'){
//
//								$val = $this->APP->params->post->getRaw( $this->elemId($field['values']));
//
//								if($field['required'] && empty($val)){
//									$error .= '<li>Please complete the ' . $field['values'] . ' field.</li>' . "\n";
//								} else {
//									$results[ $this->elemId($field['values']) ] = $val;
//								}
//
//							}
//							elseif($field['class'] == 'radio' || $field['class'] == 'select'){
//
//								$val = $this->APP->params->post->getRaw( $this->elemId($field['title']));
//
//								if($field['required'] && empty($val)){
//									$error .= '<li>Please complete the ' . $field['title'] . ' field.</li>' . "\n";
//								} else {
//									$results[ $this->elemId($field['title']) ] = $val;
//								}
//
//							}
//							elseif($field['class'] == 'checkbox'){
//								if(is_array($field['values'])){
//
//									$at_least_one_checked = false;
//
//									foreach($field['values'] as $item){
//
//										$val = $this->APP->params->post->getRaw( $this->elemId($item['value']));
//
//										if(!empty($val)){
//											$at_least_one_checked = true;
//										}
//
//										$results[ $this->elemId($item['value']) ] = $this->APP->params->post->getRaw( $this->elemId($item['value']) );
//									}
//
//									if(!$at_least_one_checked && $field['required']){
//										$error .= '<li>Please check at least one ' . $field['title'] . ' choice.</li>' . "\n";
//									}
//
//								}
//							} else { }
//						}
//					}
//
//					// if results is array, send email
//					if(!$error && is_array($results) && count($results)){
//						$this->emailFormResults_staff($results, $form_db);
//
//						if($form_db['email_to_user']){
//							$this->emailFormResults_user($results, $form_db);
//						}
//
//						$return = $this->APP->cms_lib->url($form_db['return_page']);
//						if($return){
//							header("Location: " . $return);
//							exit;
//						}
//					} else {
//
//						$this->validation_errors = $error;
//
//					}
//				}
//			}
//		}
//	}

//
//public function displaySection($section){
//
//		if(!empty($section['title']) && $section['show_title']){
//			print "\n" . '<h3>' . htmlentities($section['title'], ENT_QUOTES, 'UTF-8') . '</h3>' . "\n";
//		}
//
//		if(is_array($section['form'])){
//			if(sha1($section['form']['structure']) == $section['form']['hash']){
//
//				if($this->validation_errors){
//					print '<div class="frm-warning">' . "\n";
//					print '<ol>' . "\n";
//					print $this->validation_errors;
//					print '</ol>' . "\n";
//					print '</div>' . "\n";
//				}
//
//				print '<form class="frm-bldr" method="post" action="'.$this->APP->cms_lib->url().'">' . "\n";
//				printf('<input type="hidden" name="form_id" id="form_%s" value="%1$s" />'."\n", $section['form']['id']);
//				printf('<ol id="%s">'."\n", $this->APP->router->encodeForRewriteUrl(strtolower($section['form']['title'])));
//
//				$form = unserialize($section['form']['structure']);
//				if(is_array($form)){
//					foreach($form as $field){
//
//						print $this->loadField($field);
//
//					}
//				}
//
//				printf('<li class="btn-submit"><input type="submit" name="submit" value="%s" /></li>' . "\n", 'Submit');
//				print '</ol>' . "\n";
//				print '</form>' . "\n";
//
//			}
//		}
//	}
//
///**
//	 * @abstract Loads a new field based on its type
//	 * @param array $field
//	 * @return string
//	 * @access private
//	 */
//	private function loadField($field){
//
//		if(is_array($field) && isset($field['class'])){
//
//			switch($field['class']){
//
//				case 'input_text':
//					return $this->loadInputText($field);
//					break;
//				case 'textarea':
//					return $this->loadTextarea($field);
//					break;
//				case 'checkbox':
//					return $this->loadCheckboxGroup($field);
//					break;
//				case 'radio':
//					return $this->loadRadioGroup($field);
//					break;
//				case 'select':
//					return $this->loadSelectBox($field);
//					break;
//			}
//		}
//
//		return false;
//
//	}
//
//
//	/**
//	 *
//	 * @param <type> $key
//	 * @return <type>
//	 */
//	private function getPostValue($key){
//		return $this->APP->params->post->getRaw($key);
//	}
//
//
//	/**
//	 * @abstract Returns html for a textarea
//	 * @param array $field Field values from database
//	 * @return string
//	 * @access private
//	 */
//	private function loadTextarea($field){
//
//		$field['required'] = $field['required'] == 'true' ? ' required' : false;
//
//		$html = '';
//		$html .= sprintf('<li class="%s%s" id="fld-%s">' . "\n", $this->elemId($field['class']), $field['required'], $this->elemId($field['values']));
//		$html .= sprintf('<label for="%s">%s</label>' . "\n", $this->elemId($field['values']), $field['values']);
//		$html .= sprintf('<textarea id="%s" name="%s" rows="5" cols="50">%s</textarea>' . "\n",
//								$this->elemId($field['values']),
//								$this->elemId($field['values']),
//								$this->getPostValue($this->elemId($field['values'])));
//		$html .= '</li>' . "\n";
//
//		return $html;
//
//	}
//
//
//	/**
//	 * @abstract Returns html for an input type="text"
//	 * @param array $field Field values from database
//	 * @return string
//	 * @access private
//	 */
//	private function loadInputText($field){
//
//		$field['required'] = $field['required'] == 'true' ? ' required' : false;
//
//		$html = '';
//		$html .= sprintf('<li class="%s%s" id="fld-%s">' . "\n", $this->elemId($field['class']), $field['required'], $this->elemId($field['values']));
//		$html .= sprintf('<label for="%s">%s</label>' . "\n", $this->elemId($field['values']), $field['values']);
//		$html .= sprintf('<input type="text" id="%s" name="%s" value="%s" />' . "\n",
//								$this->elemId($field['values']),
//								$this->elemId($field['values']),
//								$this->getPostValue($this->elemId($field['values'])));
//		$html .= '</li>' . "\n";
//
//		return $html;
//
//	}
//
//
//	/**
//	 * @abstract Returns html for an input type="text"
//	 * @param array $field Field values from database
//	 * @return string
//	 * @access private
//	 */
//	private function loadCheckboxGroup($field){
//
//		$field['required'] = $field['required'] == 'true' ? ' required' : false;
//
//		$html = '';
//		$html .= sprintf('<li class="%s%s" id="fld-%s">' . "\n", $this->elemId($field['class']), $field['required'], $this->elemId($field['title']));
//
//		if(isset($field['title']) && !empty($field['title'])){
//			$html .= sprintf('<span class="false_label">%s</span>' . "\n", $field['title']);
//		}
//
//		if(isset($field['values']) && is_array($field['values'])){
//			$html .= sprintf('<span class="multi-row clearfix">') . "\n";
//			foreach($field['values'] as $item){
//
//				// set the default checked value
//				$checked = $item['default'] == 'true' ? true : false;
//
//				// load post value
//				$val = $this->getPostValue($this->elemId($item['value']));
//				$checked = !empty($val);
//
//				// if checked, set html
//				$checked = $checked ? ' checked="checked"' : '';
//
//				$checkbox 	= '<span class="row clearfix"><input type="checkbox" id="%s-%s" name="%s-%s" value="%s"%s /><label for="%s-%s">%s</label></span>' . "\n";
//				$html .= sprintf($checkbox, $this->elemId($field['title']), $this->elemId($item['value']), $this->elemId($field['title']), $this->elemId($item['value']), $item['value'], $checked, $this->elemId($field['title']), $this->elemId($item['value']), $item['value']);
//			}
//			$html .= sprintf('</span>') . "\n";
//		}
//
//		$html .= '</li>' . "\n";
//
//		return $html;
//
//	}
//
//
//	/**
//	 * @abstract Returns html for an input type="text"
//	 * @param array $field Field values from database
//	 * @return string
//	 * @access private
//	 */
//	private function loadRadioGroup($field){
//
//		$field['required'] = $field['required'] == 'true' ? ' required' : false;
//
//		$html = '';
//
//		$html .= sprintf('<li class="%s%s" id="fld-%s">' . "\n", $this->elemId($field['class']), $field['required'], $this->elemId($field['title']));
//
//		if(isset($field['title']) && !empty($field['title'])){
//			$html .= sprintf('<span class="false_label">%s</span>' . "\n", $field['title']);
//		}
//
//		if(isset($field['values']) && is_array($field['values'])){
//			$html .= sprintf('<span class="multi-row">') . "\n";
//			foreach($field['values'] as $item){
//
//				// set the default checked value
//				$checked = $item['default'] == 'true' ? true : false;
//
//				// load post value
//				$val = $this->getPostValue($this->elemId($field['title']));
//				$checked = !empty($val);
//
//				// if checked, set html
//				$checked = $checked ? ' checked="checked"' : '';
//
//				$radio 		= '<span class="row clearfix"><input type="radio" id="%s-%s" name="%1$s" value="%s"%s /><label for="%1$s-%2$s">%3$s</label></span>' . "\n";
//				$html .= sprintf($radio,
//										$this->elemId($field['title']),
//										$this->elemId($item['value']),
//										$item['value'],
//										$checked);
//			}
//			$html .= sprintf('</span>') . "\n";
//		}
//
//		$html .= '</li>' . "\n";
//
//		return $html;
//
//	}
//
//
//	/**
//	 * @abstract Returns html for an input type="text"
//	 * @param array $field Field values from database
//	 * @return string
//	 * @access private
//	 */
//	private function loadSelectBox($field){
//
//		$field['required'] = $field['required'] == 'true' ? ' required' : false;
//
//		$html = '';
//
//		$html .= sprintf('<li class="%s%s" id="fld-%s">' . "\n", $this->elemId($field['class']), $field['required'], $this->elemId($field['values']));
//
//		if(isset($field['title']) && !empty($field['title'])){
//			$html .= sprintf('<label for="%s">%s</label>' . "\n", $this->elemId($field['title']), $field['title']);
//		}
//
//		if(isset($field['values']) && is_array($field['values'])){
//			$multiple = $field['multiple'] == "true" ? ' multiple="multiple"' : '';
//			$html .= sprintf('<select name="%s" id="%s"%s>' . "\n", $this->elemId($field['title']), $this->elemId($field['title']), $multiple);
//
//			foreach($field['values'] as $item){
//
//				// set the default checked value
//				$checked = $item['default'] == 'true' ? true : false;
//
//				// load post value
//				$val = $this->getPostValue($this->elemId($field['title']));
//				$checked = !empty($val);
//
//				// if checked, set html
//				$checked = $checked ? ' checked="checked"' : '';
//
//				$option 	= '<option value="%s"%s>%s</option>' . "\n";
//				$html .= sprintf($option, $item['value'], $checked, $item['value']);
//			}
//
//			$html .= '</select>' . "\n";
//			$html .= '</li>' . "\n";
//
//		}
//
//		return $html;
//
//	}
//
//
//	/**
//	 * @abstract Generates an html-safe element id using it's label
//	 * @param string $label
//	 * @return string
//	 * @access private
//	 */
//	private function elemId($label){
//		return strtolower( ereg_replace("[^A-Za-z0-9_]", "", str_replace(" ", "_", $label) ) );
//	}

}

?>
