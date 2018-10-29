<?php

class Login_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function run()
    {
        $sth = $this->db->prepare("SELECT * FROM tblUsers WHERE 
                login = :login AND pwd = :password and userid is not null");
        $sth->execute(array(
            ':login' => filter_input(INPUT_POST, 'login'),
            ':password' => md5(filter_input(INPUT_POST, 'password'))//Hash::create('sha256', $_POST['password'], HASH_PASSWORD_KEY)
        ));
        
        $data2 = $sth->fetch();
        $sth2 = $this->db->prepare("SELECT * FROM employee WHERE 
                id='$data2[userid]'");
        $sth2->execute();
        $data = $sth2->fetch();
       $count =  $sth2->rowCount();
        if ($count > 0) {
            // login
            Session::init();
            Session::set('role', $data['groupID']);
            Session::set('loggedIn', true);
            Session::set('userid', $data['id']);
            Session::set('userProfileName', $data['fullName']);
            header('location:'.URL.'dashboard');
        } else {
            header('location:'.URL.'login');
        }
        
    }
    
}