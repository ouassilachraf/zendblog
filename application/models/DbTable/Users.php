<?php
class Model_DbTable_Users extends Zend_Db_Table_Abstract
{
	/*
	 * @var $_name table name : users
	 */
	protected $_name = 'users';
	
	public function findCredentials($username, $pwd)
	{
		$select = $this->select()->where('Username = ?', $username)
			->where('Password = ?', $this->hashPassword($pwd));
		$row = $this->fetchRow($select);
		if($row) {
			/*
			 * If success return the row
			 */
			return $row;
		}
		return false;
	}

	protected function hashPassword($pwd)
	{
		/*
		 * return an md5 hash
		 */
		return md5($pwd);
	}

}