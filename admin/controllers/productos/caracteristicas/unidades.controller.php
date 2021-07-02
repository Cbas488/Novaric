<?php
    require_once('controllers/sistema.controller.php');

    /*
     * Clase principal para unidades
     */
    class Unidad extends Sistema
    {
        /*
        * Método para insertar un registro de unidad a la base de datos Novaric
        * Params String @un recibe la unidad
        * Return integer con la cantidad de registros afectados
        */
        function create($un)
        {
            $dbh = $this->connect();
            $sentencia = "INSERT INTO unidad(unidad) VALUES(:unidad)";
            $stmt = $dbh -> prepare($sentencia);
            $stmt -> bindParam(':unidad', $un, PDO::PARAM_STR);
            $resultado = $stmt -> execute();
            return $resultado;
        }

        /*
        * Método para obtener todos las unidades
        * Return Array con todas las unidades
        */
        function read()
        {
            $dbh = $this -> Connect();
            $busqueda = (isset($_GET['busqueda']))?$_GET['busqueda']:'';
            $ordenamiento = (isset($_GET['ordenamiento']))?$_GET['ordenamiento']:'u.unidad';
            $limite = (isset($_GET['limite']))?$_GET['limite']:'5';
            $desde = (isset($_GET['desde']))?$_GET['desde']:'0';
            $sentencia = 'SELECT * FROM unidad u WHERE u.unidad LIKE :busqueda ORDER BY :ordenamiento LIMIT :limite OFFSET :desde';
            $stmt = $dbh -> prepare($sentencia);
            $stmt -> bindValue(":busqueda", '%' . $busqueda . '%', PDO::PARAM_STR);
            $stmt -> bindValue(":ordenamiento", $ordenamiento, PDO::PARAM_STR);
            $stmt -> bindValue(":limite", $limite, PDO::PARAM_INT);
            $stmt -> bindValue(":desde", $desde, PDO::PARAM_INT);
            $stmt -> execute();
            $filas = $stmt -> fetchAll();
            return $filas;
        }

        /*
        * Método para obtener todos las unidades por cantidad
        * Return Array con todas las unidades
        */
        function readAll()
        {
            $dbh = $this -> Connect();
            $sentencia = 'SELECT * FROM unidad AS u';
            $stmt = $dbh -> prepare($sentencia);
            $stmt -> execute();
            $filas = $stmt -> fetchAll();
            return $filas;
        }

        /*
         * Metodo para obtener la informacion de una unidad
         * Params Integer @id_un recibe el id de una unidad
         * Return Array con la información de la unidad
         */
        function readOne($id_un)
        {
            $dbh = $this -> connect();
            $sentencia = 'SELECT * FROM unidad WHERE id_unidad = :id_unidad';
            $stmt = $dbh->prepare($sentencia);
            $stmt -> bindParam(':id_unidad', $id_un, PDO::PARAM_INT);
            $stmt -> execute();
            $filas = $stmt -> fetchAll();
            return $filas;
        }

        /*
         * Metodo para actualizar el registro de una unidad
         * Params Integer @id_un recibe el id de una unidad
         *        String  @un recibe la unidad
         * Return integer con la cantidad de registros afectados
         */
        function update($id_un, $un)
        {
            $dbh = $this -> connect();
            $sentencia = 'UPDATE unidad SET unidad = :unidad WHERE id_unidad = :id_unidad';
            $stmt= $dbh -> prepare($sentencia);
            $stmt -> bindParam(':id_unidad', $id_un, PDO::PARAM_INT);
            $stmt -> bindParam(':unidad', $un, PDO::PARAM_STR);
            $resultado = $stmt -> execute();
            return $resultado;
        }

        /*
         * Metodo para elimina el registro de una unidad
         * Params Integer @id_un recibe el id de una unidad
         * Return integer con la cantidad de registros afectados
         */
        function delete($id_un)
        {
            $dbh = $this -> connect();
            $sentencia = 'DELETE FROM unidad WHERE id_unidad = :id_unidad';
            $stmt= $dbh -> prepare($sentencia);
            $stmt -> bindParam(':id_unidad', $id_un, PDO::PARAM_INT);
            $resultado = $stmt -> execute();
            return $resultado;
        }

        /*
        * Método para extrater total de unidades
        * Return un entero que es la cantidad de unidades
        */
        function total(){
            $dbh = $this -> Connect();
            $sentencia = "SELECT COUNT(id_unidad) AS total FROM unidad";
            $stmt = $dbh -> prepare($sentencia);
            $stmt -> execute();
            $rows = $stmt -> fetchAll();
            return $rows[0]['total'];
        }
    }
?>
