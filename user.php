<?php

/**
 * 
 *      Definire classe User:
 *          ATTRIBUTI (private):
 *          - username 
 *          - password
 *          - age
 *          
 *          METODI:
 *          - costruttore che accetta username, e password
 *          - proprieta' getter/setter
 *          - printMe: che stampa se stesso
 *          - toString: "username: age [password]"
 * 
 *          ECCEZIONI:
 *          - scatenare eccezione quando username e' minore di 3 caratteri o maggiore di 16
 *          - scatenare eccezione se password non contiene un carattere speciale (non alpha-numerico)
 *          - scatenare eccezione se age non e' un numero
 * 
 *          NOTE:
 *          - per testare il singolo carattere di una stringa
 * 
 *      Testare la classe appena definita con dati corretti e NON corretti all'interno di un
 *      try-catch e eventualmente informare l'utente del problema
 * 
*/


    class User {

        private $username;
        private $password;
        private $age;

        public function __construct($username, $password) {
            
            $this->setUsername($username);
            $this->setPassword($password);
        }

        public function getUsername() {
            
            return $this->username;
        }

        public function setUsername($username) {

            if(strlen($username) < 3 || strlen($username) > 16) {
                throw new Exception("Lo username inserito non è valido! deve essere compreso tra i 3 e i 16 caratteri");
            }
            $this->username = $username;
        }

        public function getPassword() {
            
            return $this->password;
        }

        public function setPassword($password) {
            
            if (ctype_alnum($password)) { // OPPURE if (!preg_match("/[\'^£$%&*()}{@#~><>,|=_+¬-]/", $password))
                throw new Exception("La password non contiene un carattere speciale, attenzione!");
            }
            $this->password = $password;
        }

        public function getAge() {
            
            return $this->age;
        }

        public function setAge($age) {

            if(!is_numeric($age)) {
                throw new Exception("L'età inserita non è un numero, attenzione!");
            }
            $this->age = $age;
        }

        public function printMe() {

            echo $this . '<br>';
        }

        public function __toString() { // toString: "username: age [password]"
            
            return $this->getUsername() . ': ' . $this->getAge() . ' [' . $this->getPassword() . '] <br>';
        }

    }

    try {
        // Inizializzazione istanze User
        $user1 = new User("mariolombardo502", "lombardo123123_");
        $user2 = new User("lucarossi4", "rossi_1@");
        $user3 = new User("giuliabianchi0", "bianchi0!@");


        // TEST PER LE ECCEZIONI!!
        // $user1 = new User("mariolombardo5000000", "lombardo123123_!"); // USERNAME MAGGIORE DI 16 CARATTERI
        // $user1 = new User("mariolombardo50", "lombardo123123"); // PASSWORD NON CONTENENTE UN CARATTERE SPECIALE
        // $user1->setAge("test"); // ETA' CON VALORE DIVERSO DA NUMERO


        // Age User
        $user1->setAge(20);
        $user2->setAge(35);
        $user3->setAge(17);

        // Stampa User
        echo $user1 . '<br>' . $user2 . '<br>' . $user3 . '<br>'; // Oppure -> echo $user1->printMe(); e così via per ogni singolo utente

    } catch (Exception $e) {
        echo '<div>' . $e->getMessage() . '</div>';
    }

?>