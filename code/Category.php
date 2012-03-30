<?php

class Category extends DataObject{

	static $db = array (
		'Name'	=>	'Varchar',
		'Description'	=>	'Varchar',
	);

	static $summary_fields = array(
		'Name',
		'Description',
	);

	static $searchable_fields = array(
		'Name',
		'Description',
	);
	public static $singular_name = 'Category';
	public static $plural_name = 'Categories';

	public function forTemplate(){
		return $this->Name;
	}

	public function getCMSFields($params = null){
		$fieldSet = $this->getCMSFields_forPopup();
		return $fieldSet;
	}

	public function getCMSFields_forPopup(){
		$fieldSet = new FieldSet();
		$fields = new FieldSet();
		$fieldSet->push(new TabSet('Root','Root',new TabSet('Content')),'Root');
		$fields->push(new TextField('Name','Category Name'));
		$fields->push(new TextField('Description','A short description of the category'));
		$fieldSet->addFieldsToTab('Root.Content.Main', $fields);
        return $fieldSet;
	}

	public function canCreate($member = null) {return true;}
	public function canEdit($member = null) {return true;}
	public function canView($member = null) {return true;}

}