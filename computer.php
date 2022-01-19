<?php

/**
 *      
 *      Definire classe Computer:
 *          ATTRIBUTI:
 *          - codice univoco
 *          - modello
 *          - prezzo
 *          - marca
 * 
 *          METODI:
 *          - costruttore che accetta codice univoco e prezzo
 *          - proprieta' getter/setter per tutte le variabili d'istanza
 *          - printMe: che stampa se stesso (come quella vista a lezione)
 *          - toString: "marca modello: prezzo [codice univoco]"
 * 
 *          ECCEZIONI:
 *          - codice univoco: deve essere composto da esattamente 6 cifre (no altri caratteri)
 *          - marca e modello: devono essere costituiti da stringhe tra i 3 e i 20 caratteri
 *          - prezzo: deve essere un valore intero compreso tra 0 e 2000
 * 
 *      Testare la classe appena definita con tutte le casistiche interessanti per verificare
 *      il corretto funzionamento dell'algoritmo
*/

    class Computer {

        private $uniqueCode;
        private $model;
        private $price;
        private $brand;

        public function __construct($uniqueCode, $price) {
            
            $this->setUniqueCode($uniqueCode);
            $this->setPrice($price);
        }

        public function getUniqueCode() {

            return $this->uniqueCode;
        }

        public function setUniqueCode($uniqueCode) {

            if(strlen($uniqueCode) < 6 || strlen($uniqueCode) > 6 || !is_numeric($uniqueCode)) {
                throw new Exception("Il codice univoco deve essere composto da esattamente 6 cifre." . '<br>' . 'Esempio: 123456');
            }
            $this->uniqueCode = $uniqueCode;
        }

        public function getModel() {

            return $this->model;
        }

        public function setModel($model) {

            if(strlen($model) < 3 || strlen($model) > 20) {
                throw new Exception("Attenzione! il modello deve essere costituto da una stringa tra i 3 e i 20 caratteri");
            }
            $this->model = $model;
        }

        public function getPrice() {

            return $this->price;
        }

        public function setPrice($price) {

            if(!is_int($price) || $price > 2000 || $price < 0) {
                throw new Exception("Attenzione! il prezzo deve essere un numero intero e compreso tra 0 e 2000");
            }
            $this->price = $price;
        }

        public function getBrand() {

            return $this->brand;
        }

        public function setBrand($brand) {

            if(strlen($brand) < 3 || strlen($brand) > 20) {
                throw new Exception("Attenzione! il brand deve essere costituto da una stringa tra i 3 e i 20 caratteri");
            }
            $this->brand = $brand;
        }

        public function printMe() {

            echo $this . '<br>';
        }

        public function __toString() {
            
            return $this->getBrand() . ' ' . $this->getModel() . ': ' . $this->getPrice() . ' [' . $this->getUniqueCode() . ']';
        }

    }

    try {

        // Inizializzazione istanze computer
        $comp1 = new Computer(100001, 2000);
        $comp2 = new Computer(100002, 850);
        $comp3 = new Computer(100003, 1845);
        $comp4 = new Computer(100004, 615);
        $comp5 = new Computer(100005, 1300);

        // Model computer
        $comp1->setModel("OMEN Gaming Desktop"); 
        $comp2->setModel("Legion Tower 5");
        $comp3->setModel("MacBook Pro 16''"); 
        $comp4->setModel("ProArt Studiobook 17");
        $comp5->setModel("Chromebook Spin 311"); 

        // Brand computer
        $comp1->setBrand("Dell"); 
        $comp2->setBrand("Lenovo");
        $comp3->setBrand("Apple"); 
        $comp4->setBrand("Asus");
        $comp5->setBrand("Acer");

        // Test for exceptions
        // $comp6 = new Computer(1234567, 2001);
        // $comp6->setModel("Gaming Desktop 25KL Pro 24''"); 
        // $comp6->setBrand("HP");
        // $comp6->printMe();


        // Stampa computer
        echo $comp1 . '<br>' . $comp2 . '<br>' . $comp3 . '<br>' . $comp4 . '<br>' . $comp5; // Oppure => $comp1->printMe(); e così via per tutti gli altri pc.

    } catch(Exception $e) {

        echo '<div>' . $e->getMessage() . '</div>';
    }
    
?>