<?php
    /**
     * Object used to connect to database
     */
    class DatabaseConn{
        private $db_host = '';
        private $db_name = '';
        private $db_user = '';
        private $db_pass = '';
        private $db_connection = null;

        /**
         * Default constuctor. Assigns connection parameters
         * @param   string $host   assigns address of a database server
         * @param   string $name   assigns name of a database
         * @param   string $user   assigns name of a user on the database server
         * @param   string $pass   assigns password of a user on the database servers
         */
        public function __construct( $host, $name, $user, $pass ){
            $this->db_host = $host;
            $this->db_name = $name;
            $this->db_user = $user;
            $this->db_pass = $pass;
        }
        /**
         * method that established connection with a database server
         * @return  null     if connection fails
         * @return  PDO    if connection successful
         */
        public function getConnection(){
            if( isset($this->db_host) && isset($this->db_name) && isset($this->db_user) && isset($this->db_pass) ) {
                try{
                    $this->db_connection = new PDO( "mysql:host=" . $this->db_host . ";dbname=" . $this->db_name, $this->db_user, $this->db_pass);
                }
                catch( PDOException $exception ){
                    echo "Connection Failed: " . $exception->getMessage() . "<br>";
                }
                //echo "Connection Success<br>";
                return $this->db_connection;
            }
            else{
                echo "Connection parameter mission or invalid<br>";
                return null;
            }
        }
    }

    /**
     * Object that holds user information durign authentication process
     */
    class User{
        private $usr_uid;
        private $usr_name;
        private $usr_pass;


        /**
         * Fills user data
         * @param   int $uid        holds user ID
         * @param   string $name    holds user name
         * @param   string $pass    holds user password
         */
        public function __construct( $uid, $name, $pass ){
            $this->usr_uid = $uid;
            $this->usr_name = $name;
            $this->usr_pass = $pass;
        }

       /**
        * get user id
        * @return   int $usr_uid
        */
        public function getUID(){ return $this->usr_uid; }

        /**
        * get user name
        * @return   string $usr_name
        */
        public function getName(){ return $this->usr_name; }

        /**
        * get user password
        * @return   string $usr_pass
        */
        public function getPass(){ return $this->usr_pass; }


        /**
        * set user id
        * @param   int $usr_id
        */
        public function setUID( $uid ){ $this->usr_uid = $uid; }

        /**
        * set user name
        * @param   string $usr_name
        */
        public function setName( $name ){ $this->usr_name = $name; }

        /**
        * set user password
        * @param   int $usr_pass
        */
        public function setPass( $pass ){ $this->usr_pass = $pass; }


        /**
        * void function, prints contents of object variables
        */
        public function printUser(){ echo $this->getUID() . " " . $this->getName() . " " . $this->getPass() . "<br>"; }

        
        /**
         * method that compares this object's usr_name and usr_pass with another User object
         * @param   User $user  class User object to compare to
         * @return  true   if usr_name and usr_pass the same as passed User object
         * @return  false  if otherwise
         */
        public function compareTo( User $user ){
            if( $this->usr_name == $user->getName() && $this->usr_pass == $user->getPass() )
                return true;
            else
                return false;
        }
    }
?>