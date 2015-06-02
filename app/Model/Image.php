<?php
class Image extends AppModel {
	
    public $name = 'Image';
	public $displayField = 'name';
	var $userid;
	public $hasMany = array(
				'UsersHasImages'
			);
	
	public $validate = array(
		
		'filename' => array(
			// http://book.cakephp.org/2.0/en/models/data-validation.html#Validation::uploadError
			'uploadError' => array(
				'rule' => 'uploadError',
				'message' => 'Something went wrong with the file upload',
				'required' => FALSE,
				'allowEmpty' => TRUE,
			),
			// http://book.cakephp.org/2.0/en/models/data-validation.html#Validation::mimeType
			'mimeType' => array(
				'rule' => array('mimeType', array('image/gif','image/png','image/jpg','image/jpeg')),
				'message' => 'Invalid file, only images allowed',
				'required' => FALSE,
				'allowEmpty' => TRUE,
			),
			// custom callback to deal with the file upload
			'processUpload' => array(
				'rule' => 'processUpload',
				'message' => 'Something went wrong processing your file',
				'required' => FALSE,
				'allowEmpty' => TRUE,
				'last' => TRUE,
			)
		)
    );
	
	/**
	 * Upload Directory relative to WWW_ROOT
	 * @param string
	 */
	public $uploadDir = 'img';

	/**
	 * Process the Upload
	 * @param array $check
	 * @return boolean
	 */
	public function processUpload($check=array()) {
		// deal with uploaded file
		$userid  = Configure::read('userid');
		$purposeid  = Configure::read('purposeid');
		if($purposeid == 1){
			if (!is_dir(WWW_ROOT . '/img/users/' . $userid)) 
			// is_dir - tells whether the filename is a directory
			{
				//mkdir - tells that need to create a directory
				mkdir(WWW_ROOT . '/img/users/' . $userid);
			}
		} else if ($purposeid == 2){
			if (!is_dir(WWW_ROOT . '/img/articles/' . $userid)) 
			// is_dir - tells whether the filename is a directory
			{
				//mkdir - tells that need to create a directory
				mkdir(WWW_ROOT . '/img/articles/' . $userid);
			}
		}
		if (!empty($check['filename']['tmp_name'])) {

			// check file is uploaded
			if (!is_uploaded_file($check['filename']['tmp_name'])) {
				return FALSE;
			}

			// build full filename
			if($purposeid == 1){
				$filename = WWW_ROOT . '/img/users/' . $userid . '/' . $this->DS . Inflector::slug(pathinfo($check['filename']['name'], PATHINFO_FILENAME)).'.'.pathinfo($check['filename']['name'], PATHINFO_EXTENSION);
			} else if ($purposeid == 2){
				$filename = WWW_ROOT . '/img/articles/' . $userid . '/' . $this->DS . Inflector::slug(pathinfo($check['filename']['name'], PATHINFO_FILENAME)).'.'.pathinfo($check['filename']['name'], PATHINFO_EXTENSION);				
			}
			// @todo check for duplicate filename

			// try moving file
			if (!move_uploaded_file($check['filename']['tmp_name'], $filename)) {
				return FALSE;

			// file successfully uploaded
			} else {
				// save the file path relative from WWW_ROOT e.g. uploads/example_filename.jpg
				$this->data[$this->alias]['filepath'] = str_replace(DS, "/", str_replace(WWW_ROOT, "", $filename) );
			}
		}

		return TRUE;
	}
	
	/**
	* Before Validation
	* @param array $options
	* @return boolean
	*/
	public function beforeValidate($options = array()) {
		// ignore empty file - causes issues with form validation when file is empty and optional
		if (!empty($this->data[$this->alias]['filename']['error']) && $this->data[$this->alias]['filename']['error']==4 && $this->data[$this->alias]['filename']['size']==0) {
			unset($this->data[$this->alias]['filename']);
			$message = "You did not upload a photo. Please select a photo to upload";
			echo "<script type='text/javascript'>alert('$message');</script>";
			return false;
		}

		parent::beforeValidate($options);
	}

	/**
	 * Before Save Callback
	 * @param array $options
	 * @return boolean
	 */
	public function beforeSave($options = array()) {
		// a file has been uploaded so grab the filepath
		if (!empty($this->data[$this->alias]['filepath'])) {
			$this->data[$this->alias]['filename'] = $this->data[$this->alias]['filepath'];
		}
		
		return parent::beforeSave($options);
	}
}