<?php

class Categorized extends DataObjectDecorator{

	public function extraStatics() {
		return array(
			'has_one'	=>	array('Category'	=>	'Category')
		);
	}

	public function updateCMSFields(FieldSet $fields) {
		$categoryManager = new HasOneDataObjectManager($this->owner, 'Category', 'Category');
		if($this->owner instanceof Page){
			$fields->addFieldToTab("Root.Content.Meta", $categoryManager);
		}else{
			$fields->push($categoryManager);
		}
	}


}
