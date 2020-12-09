<?php


	class Modelo {

		private $CodMod;
		private $CodMar ;
		private $NomMod;
		private $Potencia;
		private $año;
		private $esClasico;
        private $Descripcion ;
        private $Precio ;

        /**
         * @return mixed
         */
        public function getCodMod()
        {
            return $this->CodMod;
        }

        /**
         * @param mixed $CodMod
         *
         * @return self
         */
        public function setCodMod($CodMod)
        {
            $this->CodMod = $CodMod;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getNomMod()
        {
            return $this->NomMod;
        }

        /**
         * @param mixed $NomMod
         *
         * @return self
         */
        public function setNomMod($NomMod)
        {
            $this->NomMod = $NomMod;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getPotencia()
        {
            return $this->Potencia;
        }

        /**
         * @param mixed $Potencia
         *
         * @return self
         */
        public function setPotencia($Potencia)
        {
            $this->Potencia = $Potencia;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getAño()
        {
            return $this->año;
        }

        /**
         * @param mixed $año
         *
         * @return self
         */
        public function setAño($año)
        {
            $this->año = $año;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getEsClasico()
        {
            return $this->esClasico;
        }

        /**
         * @param mixed $Clasico
         *
         * @return self
         */
        public function setEsClasico($esClasico)
        {
            $this->esClasico = $esClasico;

            return $this;
        }

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
        public function getDescripcion()
        {
            return $this->Descripcion;
        }

        /**
         * @param mixed $Descripcion
         *
         * @return self
         */
        public function setDescripcion($Descripcion)
        {
            $this->Descripcion = $Descripcion;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getPrecio()
        {
            return $this->Precio;
        }

        /**
         * @param mixed $Precio
         *
         * @return self
         */
        public function setPrecio($Precio)
        {
            $this->Precio = $Precio;

            return $this;
        }

        public static function mostrarClasicos() {
            $db = Database::getInstance() ;

            $db->query("SELECT * FROM modelo WHERE esClasico=1") ;

            $data = [] ;

            while($row = $db->getObject("Modelo")):
                //echo "<pre>".print_r($row, true)."</pre>" ;
                array_push($data, $row) ;
            endwhile;

            return $data ;
        }

        public static function mostrarModernos() {
            $db = Database::getInstance() ;

            
            $db->query("SELECT * FROM modelo WHERE esClasico=0") ;

            $data = [] ;

            while($row = $db->getObject("Modelo")):
                //echo "<pre>".print_r($row, true)."</pre>" ;
                array_push($data, $row) ;
            endwhile;

            return $data ;
        }

        public static function mostrarTodos() {
            $db = Database::getInstance() ;

            $db->query("SELECT * FROM modelo JOIN marca on (modelo.CodMar=marca.CodMar)") ;

            $data = [] ;

            while($row = $db->getObject("Modelo")):
                //echo "<pre>".print_r($row, true)."</pre>" ;
                array_push($data, $row) ;
            endwhile;

            return $data ;
        }

        public static function mostrarModelo($id) {
            $db = Database::getInstance() ;

            $db->query("SELECT * FROM modelo WHERE codMod=$id") ;

            $data = $db->getObject("Modelo") ;

            return $data ;

        }

        public function anadir() {

            $db = Database::getInstance() ;

            $data = [
                ":nom" => "{$this->NomMod}",
                ":pot" => "{$this->Potencia}",
                ":year" => "{$this->año}",
                ":mar" => "{$this->CodMar}",
                ":des" => "{$this->Descripcion}",
                ":pre" => "{$this->Precio}",
                ":cla" => "{$this->esClasico}"
            ] ;

            //echo "<pre>".print_r($db,true)."</pre><br/>" ;

            $sql = "INSERT INTO modelo (NomMod, CodMar, Potencia, año, Descripcion, Precio, esClasico) VALUES (:nom, :mar, :pot, :year, :des, :pre, :cla)" ;
            //echo $sql ;
            //die() ;
            $db->bindAll($sql, $data) ;

            //$db->query() ;
        }

        public function delete($id) {
            $db = Database::getInstance() ;
            $sql = "DELETE FROM modelo WHERE CodMod=$id ;" ;

            //echo $sql ;

            //die() ;
            $db->query($sql) ;
        }

        public function editar($id){
            $db = Database::getInstance() ;

            $data = [
                ":nom" => "{$this->NomMod}",
                ":pot" => "{$this->Potencia}",
                ":year" => "{$this->año}",
                ":mar" => "{$this->CodMar}",
                ":des" => "{$this->Descripcion}",
                ":pre" => "{$this->Precio}",
                ":cla" => "{$this->esClasico}"
            ] ;

            $sql = "UPDATE modelo SET NomMod=:nom, CodMar=:mar, Potencia=:pot, año=:year, Descripcion=:des, Precio=:pre, esClasico=:cla WHERE CodMod={$this->CodMod} ;" ;

            $db->bindAll($sql, $data) ;
        }
}


?>