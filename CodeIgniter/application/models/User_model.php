<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Account_activity_model class
 *
 * @package		Payments
 * @subpackage	Models
 * @category	Account activity
 * @author		Alejandro Hernandez
 */
class User_model extends CI_Model{

	/**
	 * Checks for statements to load them in the account activity page
	 *
	 * @param Integer $CID
	 * @return mixed
	 */
	public function register_user($name, $last_name, $other_name, $email, $cellphone, $password)
	{
		$data = array('id_user' => null,
					  'name' => $name,
					  'last_name'=> $last_name,
					  'other_name'=> $other_name,
					  'email' => $email,
					  'cellphone'=> $cellphone,
					  'password'=> $password
					  );
		$this->db->insert('user', $data);
		if ($this->db->affected_rows() > 0)
            {
                return true;
            }
            else
            {
               return false;
            }
	}

	public function validate_user($email, $password)
	{
		$query = $this->db->get_where('user', array('email' => $email, 'password' => $password));
		return $query->num_rows();

	}
	public function get_all(){
		$query = $this->db->get('user')->result();
		var_dump($query);
	}
}
