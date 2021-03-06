<?php

class Application_Resource_Utente extends Zend_Db_Table_Abstract
{
    protected $_name    = 'UTENTE';
    protected $_primary  = 'username';
    protected $_rowClass = 'Application_Resource_Utente_Item';

    public function init()
    {
    }
	

    public function getUserbyUsername($username)
    {
       $select = $this->select()->where('username = ?', $username);  
       return $this->fetchRow($select);
    }
    
    public function getUser(){
        return $this->fetchRow();
    }
    
    public function updateUser($form){
        $where = $this->getAdapter()->quoteInto('username = ?',$form['username']);
        $this->update($form, $where);
    }
	
	public function controllaPsw($username, $password){
		$select = $this->select()->where('username = ?', $username)->where('password = ?', $password);  
       	return $this->fetchRow($select);
	}
	
}