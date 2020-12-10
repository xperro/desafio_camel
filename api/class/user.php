<?php

    class User{

        private $conection;

        private $table = "user";

        public $id;
        public $email;
        public $name;
        public $lastname;
        public $user_pass;
        public $user_ip;
        public $admin_role;
        public $user_last_login;
        public $email_authorization;
        public $pass_authorization;
        public function __construct($db){
            $this->connection = $db;
        }
        //VALIDATE PERMISSIONS
        public function admin_Role($user,$pass){
            //HASH PASSWORD
            $query = "SELECT * FROM " . $this->table. " WHERE admin_role=1 and email = '".$user."'";
            $action = $this->connection->prepare($query);
            $action->execute();
            $result = $action -> fetchAll();
            foreach( $result as $row ) {

                if(password_verify($pass, $row["user_pass"])){
                    return true;
                }else{
                    return false;
                }
            }



        }
        //  Method--GET ALL USERS--
        public function getUsers(){
            $query = "SELECT id, email, name, lastname, admin_role, user_ip, user_last_login FROM " . $this->table;
            $action = $this->connection->prepare($query);
            $action->execute();
            return $action;
        }


        //  Method--CREATE USER--
        public function newUser(){
            $validation = $this->admin_Role($this->email_authorization,$this->pass_authorization);
                if ($validation){
                $query = "INSERT INTO
                             ". $this->table ."
                        SET 
                            email = :email, 
                            name = :name,
                            lastname = :lastname,
                            user_pass = :user_pass, 
                            user_ip = :user_ip, 
                            admin_role = :admin_role, 
                            user_last_login = :user_last_login";

                $action = $this->connection->prepare($query);
                //HASH PASSWORD
                $pass = password_hash($this->user_pass, PASSWORD_DEFAULT);
                //PREPARE ATTRIBUTES
                $this->email=htmlspecialchars(strip_tags($this->email));
                $this->name=htmlspecialchars(strip_tags($this->name));
                $this->lastname=htmlspecialchars(strip_tags($this->lastname));
                $this->user_pass=htmlspecialchars(strip_tags($pass));
                $this->admin_role=intval($this->admin_role);
                $this->user_last_login=htmlspecialchars(strip_tags($this->user_last_login));
                $this->user_ip =  htmlspecialchars(strip_tags($this->user_ip));

                //DATA TO ACTION

                $action->bindParam(":email", $this->email, PDO::PARAM_STR);
                $action->bindParam(":name", $this->name, PDO::PARAM_STR);
                $action->bindParam(":lastname", $this->lastname, PDO::PARAM_STR);
                $action->bindParam(":user_ip",$this->user_ip, PDO::PARAM_STR);
                $action->bindParam(":admin_role",$this->admin_role, PDO::PARAM_INT);
                $action->bindParam(":user_pass", $this->user_pass, PDO::PARAM_STR);
                $action->bindParam(":user_last_login", $this->user_last_login, PDO::PARAM_STR);
                if($action->execute()){
                    return 1;
                }
            }else{
                    http_response_code(401);

                    return -1;
                }
            http_response_code(406);
            return 0;
        }

    }

?>