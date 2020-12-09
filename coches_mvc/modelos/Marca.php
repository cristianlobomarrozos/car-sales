<?php
	
	class Marca {

		private $CodMar;
		private $NomMar;
		private $PaisMar;

		
	
        /**
         * @return mixed
         */
        public function getCodMar()
        {
            return $this->CodMar;
        }

        /**
         * @param mixed $CodMar
         *
         * @return self
         */
        public function setCodMar($CodMar)
        {
            $this->CodMar = $CodMar;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getNomMar()
        {
            return $this->NomMar;
        }

        /**
         * @param mixed $NomMar
         *
         * @return self
         */
        public function setNomMar($NomMar)
        {
            $this->NomMar = $NomMar;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getPaisMar()
        {
            return $this->PaisMar;
        }

        /**
         * @param mixed $PaisMar
         *
         * @return self
         */
        public function setPaisMar($PaisMar)
        {
            $this->PaisMar = $PaisMar;

            return $this;
        }
}
	

?>