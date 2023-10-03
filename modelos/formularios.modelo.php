<?php

require_once "conexion.php";

class ModeloFormularios{
    static public function mdlRegistro($tabla, $datos)
    {
        #statement declaración de una instrucción
        #prepare() Prepara una sentencia SQL para ser ejecutada por el metodo
        #PDOStatement::execute() La sentencia SQL puede contener cero o mas marcadores de 
        #parametros con el nombre :name o signos de interrogación (?) por los cuales los
        #valores reales seran sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir
        #inyecciones SQL eliminando la necesidad de entrecomillar manualmente el parametro

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(token, nombre, email, password) VALUES
        (:token, :nombre, :email, :password)");

        #bindParam() vincula una variable de PHP a un parametro de sustitución con nombre o
        #signo de interrogación correspondiente de la sentencia SQL que fue usada para
        #preparar la sentencia
        $stmt->bindParam(":token", $datos['token'], PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos['email'], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos['password'], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            print_r(Conexion::conectar()-> errorInfo());
        }
        //$stmt->close();
        $stmt = null;
    }
    /**
     * Seleccionar registros
     */
    static public function mdlSeleccionarRegistros($tabla, $item, $valor){
        if ($item == null && $valor == null) {
            $stmt = Conexion::conectar()->prepare("SELECT *, DATE_FORMAT(fecha, '%d/%m/%Y') as
            f FROM $tabla ORDER BY id DESC");
            $stmt-> execute();

            return $stmt-> fetchAll();

        } else {
            $stmt = Conexion::conectar()->prepare("SELECT *, DATE_FORMAT(fecha, '%d/%m/%Y') as
            f FROM $tabla WHERE $item = :$item ORDER BY id DESC");

            $stmt -> bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt-> execute();

            return $stmt-> fetch();
        }

        $stmt = null;
    }
    /**
     * Actualizar Registros
     */
    static public function mdlActualizarRegistros($tabla, $datos){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, email = :email,
        password = :password WHERE token = :token");

        $stmt->bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos['email'], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos['password'], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datos['id'], PDO::PARAM_INT);
        $stmt->bindParam(":token", $datos['token'], PDO::PARAM_STR);
        
        if ($stmt->execute()) {
            return "ok";
        } else {
            print_r(Conexion::conectar()-> errorInfo());
        }
        //$stmt->close();
        $stmt = null;
    }

    /**
     * Eliminar Registro
     */

     static public function mdlEliminarRegistro($tabla, $valor){
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE token= :token");

        $stmt->bindParam(":token", $valor, PDO::PARAM_INT);
        
        if ($stmt->execute()) {
            return "ok";
        } else {
            print_r(Conexion::conectar()-> errorInfo());
        }
        //$stmt->close();
        $stmt = null;
     }
}
