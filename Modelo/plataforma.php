<?php
    class plataforma{
        private $codPlataforma;
        private $nomePlataforma;
        public function __construct($codPlataforma, $nomePlataforma) {
            $this->codPlataforma = $codPlataforma;
            $this->nomePlataforma = $nomePlataforma;
        }
        public function getCodPlataforma()
        {
            return $this->codPlataforma;
        }
        public function setCodPlataforma($codPlataforma)
        {
            $this->codPlataforma = $codPlataforma;
        }
        public function getNomePlataforma()
        {
            return $this->nomePlataforma;
        }
        public function setNomePlataforma($nomePlataforma)
        {
            $this->nomePlataforma = $nomePlataforma;
        }
    }
?>