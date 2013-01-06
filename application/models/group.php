<?php

/**
 * Group Class
 * Allows users to belong to one or more groups.
 *
 * @category	Models
 * @author  	Yarieldis Claro
 * @link    	http://www.yarieldis.com
 */
class Group extends DataMapper {

	// --------------------------------------------------------------------
	// Relationships
	// --------------------------------------------------------------------

	public $has_many = array("user");
	
	// --------------------------------------------------------------------
	// Validation
	// --------------------------------------------------------------------	
	public $validation = array(
		'name' => array(
			'rules' => array('required', 'trim', 'unique', 'min_length' => 3, 'max_length' => 20)
		)
	);
	
	// Default to ordering by name
	public $default_order_by = array('id' => 'desc');
	
	/**
	 * Returns the name of this status.
	 * @return $this->name
	 */
	function __toString()
	{
		return empty($this->name) ? $this->localize_label('unset') : $this->name;
	}
	
}

/* End of file group.php */
/* Location: ./application/models/group.php */