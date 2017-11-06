<?php

class Login_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function run()
    {
        $sth = $this->db->prepare("SELECT * FROM user WHERE 
                username = :login AND password = :password");
        $sth->execute(array(
            ':login' => filter_input(INPUT_POST, 'login'),
            ':password' => md5(filter_input(INPUT_POST, 'password'))//Hash::create('sha256', $_POST['password'], HASH_PASSWORD_KEY)
        ));
        
        $data = $sth->fetch();
//        var_dump($data);exit();
        
       $count =  $sth->rowCount();
        if ($count > 0) {
            // login
            Session::init();
            Session::set('role', $data['groupid']);
            Session::set('loggedIn', true);
            Session::set('userid', $data['id']);
            Session::set('userProfileName', $data['name']);
            header('location:'.URL.'dashboard');
        } else {
            header('location:'.URL.'login');
        }
        
    }
    
}