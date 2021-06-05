<?php
    require_once('sistema.controller.php');
    class Departamento extends Sistema
    {
        var $id_departamento;
        var $departamento;

        function getIdDepartamento(){ return $this -> id_departamento; }
        function getDepartamento(){ return $this -> departamento; }

        function setIdDepartamento($id_dep){ $this -> id_departamento = $id_dep; }
        function setArea($dep){ $this -> departamento = $dep; }

        function create($dep)
        {
            $dbh = $this->connect();
            $sentencia = "INSERT INTO departamento(departamento) VALUES(:departamento)";
            $stmt= $dbh->prepare($sentencia);
            $stmt->bindParam(':departamento', $dep, PDO::PARAM_STR);
            $resultado = $stmt -> execute();
            return $resultado;
        }

        function read()
        {
            $dbh = $this->connect();
            $busqueda = (isset($_GET['busqueda']))?$_GET['busqueda']:'';
            $ordenamiento = (isset($_GET['ordenamiento']))?$_GET['ordenamiento']:'d.departamento';
            $limite = (isset($_GET['limite']))?$_GET['limite']:'5';
            $desde = (isset($_GET['desde']))?$_GET['desde']:'0';
            $sentencia = 'SELECT * FROM departamento d  
                          WHERE d.departamento LIKE :busqueda ORDER BY :ordenamiento LIMIT :limite OFFSET :desde';
            $stmt = $dbh -> prepare($sentencia);
            $stmt -> bindValue(":desde", $desde, PDO::PARAM_INT);
            $stmt -> bindValue(":busqueda", '%' . $busqueda . '%', PDO::PARAM_STR);
            $stmt -> bindValue(":ordenamiento", $ordenamiento, PDO::PARAM_STR);
            $stmt -> bindValue(":limite", $limite, PDO::PARAM_INT);
            $stmt -> bindValue(":desde", $desde, PDO::PARAM_INT);
            $stmt->execute();
            $filas = $stmt -> fetchAll();
            return $filas;
        }

        function readOne($id_dep)
        {
            $dbh = $this->connect();
            $sentencia='SELECT * FROM departamento WHERE id_departamento = :id_departamento';
            $stmt = $dbh->prepare($sentencia);
            $stmt -> bindParam(':id_departamento', $id_dep, PDO::PARAM_INT);
            $stmt -> execute();
            $filas=$stmt->fetchAll();
            return $filas;
        }

        function update($id_dep, $dep)
        {
            $dbh = $this->connect();
            $sentencia = 'UPDATE departamento SET departamento = :departamento WHERE id_departamento = :id_departamento';
            $stmt= $dbh->prepare($sentencia);
            $stmt->bindParam(':id_departamento', $id_dep, PDO::PARAM_INT);
            $stmt->bindParam(':departamento', $dep, PDO::PARAM_STR);
            $resultado = $stmt->execute();
            return $resultado;
        }

        function delete($id_dep)
        {
            $dbh = $this->connect();
            $sentencia = 'DELETE FROM departamento WHERE id_departamento = :id_departamento';
            $stmt= $dbh->prepare($sentencia);
            $stmt->bindParam(':id_departamento', $id_dep, PDO::PARAM_INT);
            $resultado = $stmt->execute();
            return $resultado;
        }

        function total(){
            $dbh = $this -> Connect();
            $sentencia = "SELECT COUNT(id_departamento) AS total FROM departamento";
            $stmt = $dbh -> prepare($sentencia);
            $stmt -> execute();
            $rows = $stmt -> fetchAll();
            return $rows[0]['total'];
        }
    }
?>