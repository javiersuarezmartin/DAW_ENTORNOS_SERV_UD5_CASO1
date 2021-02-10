<?php
    class Dado {
        private $minNumDado;
        private $maxNumDado;

        // Constructor

        public function __construct($minNumDado, $maxNumDado) {
            $this->minNumDado = $minNumDado;
            $this->maxNumDado = $maxNumDado;
        }

        // Métodos Get

        public function getMinNumDado() {
            return $this->minNumDado;
        }

        public function getMaxNumDado() {
            return $this->maxNumDado;
        }
        
        // Métodos Set

        public function setMinNumDado($minNumDado) {           
            
            if ($this->comprobarValoresLimite($minNumDado)) {
                $this->minNumDado = $minNumDado;
            } else {
                echo ('El valor introducido como Mínimo no es válido (El mínimo permitido es 0)');
            };
            
        }

        public function setMaxNumDado($maxNumDado) {

            if ($this->comprobarValoresLimite($maxNumDado)) {
                $this->maxNumDado = $maxNumDado;
            } else {
                echo ('El valor introducido como Máximo no es válido (El máximo permitido es 12)');
            };
            
        }

        // Método para tirar el dado

        public function tirarDado() {

            // Para asegurarnos de que la tirada es válida revisamos si se han establecido los límites antes de tirar.            
            if (($this->comprobarValoresLimite($this->minNumDado)) && ($this->comprobarValoresLimite($this->maxNumDado))) {
                $tirada = rand($this->minNumDado, $this->maxNumDado);
                return $tirada;
            } else {
                return -1; // Devolvemos un valor que indique error.
            };          
        }

        // Método que comprueba los valores límite del dado (superior e inferior)

        public function comprobarValoresLimite($valor) {
            if (($valor >= 0) && ($valor <= 12)) {
                return true;
            } else {
                return false;
            };
        }
    };
?>