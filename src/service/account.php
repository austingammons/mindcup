<?php

include('base.php');

class AccountService extends BaseService {

    function Login($email, $password) {

        $connection = $this->database->get_connection_pdo();
        $statement = $connection->prepare("SELECT * FROM tbl_users WHERE email = :email");
        $statement->execute(array(":email" => $email));
        $result = $statement->fetch();

        if ($result) {

            if (password_verify($password, $result["password"]))
            {
                session_start();

                session_regenerate_id();

                $_SESSION["user"] = $result;

                header("Location: ../../page/thought/index");

                exit;

            } else {

                echo "<br /><br /><b>login error: </b>";

                print_r($statement->errorInfo());

            }

        }
    }

    function Register($post_vars) {

        $this->get_form_validation_errors($post_vars);

        $password_hash = password_hash($post_vars["password"], PASSWORD_DEFAULT);
        $user_guid = Security::guid();

        $connection = $this->database->get_connection_pdo();
        $statement = $connection->prepare("INSERT INTO tbl_users (user_guid, username, email, password, date)VALUES (:user_guid, :username, :email, :password, :date)");
        $statement->execute(array(':user_guid' => $user_guid, ':username' => $post_vars['username'], ':email' => $post_vars['email'], ':password' => $password_hash, ':date' => date('Y/m/d')));

        if ($statement->rowCount() > 0) {
            header("Location: ../../page/account/login");
        }
    }

    public function get_form_validation_errors($post_vars) {

        $message = [];

        if (empty($post_vars["username"])) {
            $message[] = 'Username Required.<br />';
        }
        
        if ( ! filter_var($post_vars["email"], FILTER_VALIDATE_EMAIL))
        {
            $message[] = 'Email is not recognized as valid.<br />';
        }
        
        if (strlen($post_vars["password"]) < 8) {
            $message[] = 'Passwords must contain at least 8 characters.<br />';
        }
        
        if ( ! preg_match("/[a-z]/i", $post_vars["password"])) {
            $message[] = 'Password must contain at least one letter.<br />';
        }
        
        if ( ! preg_match("/[0-9]/i", $post_vars["password"])) {
            $message[] = 'Password must contain at least one number.<br />';
        }
        
        if ($post_vars["password"] !== $post_vars["password_confirmation"]) {
            $message[] = 'Passwords must match.<br />';
        }

        return $message;
    }
}