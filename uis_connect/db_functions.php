<?php
 
class DB_Functions {
 
    private $db;
 
    //put your code here
    // constructor
    function __construct() {
        require_once 'db_connect.php';
        // connecting to database
        $this->db = new DB_CONNECT();
        $this->db->connect();
    }
 
    // destructor
    function __destruct() {
         
    }
 
    /**
     * Get user by email and password
     */
    public function getUserByEmailAndPassword($email, $password) {
        $result = mysql_query("SELECT * FROM user
		INNER JOIN student
		ON student.user_id=user.user_id where user.user_name='$email'") or die(mysql_error());
		
        // check for result 
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            $result = mysql_fetch_array($result);
            $db_password = $result['user_pass'];
            // check for password equality
            if ($db_password == $password) {
                // user authentication details are correct
                return $result;
            }
        } else {
            // user not found
            return false;
        }
    }
	
	public function logout($email) {
        
		$result = mysql_query("UPDATE user SET login = '1' WHERE user_name='$email'") or die(mysql_error());

        else {
            // user not found
            return false;
        }
    }
}
?>