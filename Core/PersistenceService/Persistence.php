<?php
require_once('Core/PersistenceService/IPersistenceService.php');

/**
 * Class PersistenceService
 * @package Core/PersistenceService
 */

abstract class Persistence implements IPersistenceService
{
    protected $host;
    protected $username;
    protected $password;
    protected $database;
    protected $connection;
    protected $port;

    /**
     * Constructor class
     *
     * @param  string $host , ip base de datos
     * @param  string  $username , usuario de conexión a base de datos
     * @param  string  $password , password de conexión a base de datos
     * @param  string $database , nombre de conexión a base de datos
     * @param  string $port, puerto del sistema gestor de base de datos
     *
     */

    public function __construct($host, $username, $password, $database, $port)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
        $this->connection = null;
        $this->port = $port;
    }

    /**
     * Método que realiza conexión con base de datos
     * @throws Exception si condición no se cumple
     *
     */

    public function openDb()
    {
        $this->connection = mysqli_connect($this->host, $this->username, $this->password, $this->database, $this->port);
        if ( mysqli_connect_errno())
            throw new RuntimeException("Conexíon con base de datos fallida");

        return true;
    }

    /**
     * Método que data una consulta Sql devuelve unos resultados
     * @param string $query, consulta SQL a enviar a base de datos
     * @throws Exception si condición no se cumple
     *
     */

    public function executeQuery($query)
    {
        $results = [];

        if (is_null($this->connection))
            $this->openDb();

        try {
            mysqli_query($this->connection, "SET NAMES 'utf8'");
            $result = mysqli_query($this->connection, $query);
            if (!is_null($result)) {
                while ($row = mysqli_fetch_assoc($result))
                    $results[] = $row;
            }

            return $results;
        } catch (Exception $e) {
            throw new Exception("Error executing query");
        }

        $this->closeDb();

        return $result;
    }

    /**
     * Método que cierra la conexión a base de datos si esta abierta
     *
     */

    public function closeDb()
    {
        //if connection is open and not null
        if (!is_null($this->connection)) {
            try {
                mysqli_close($this->connection);
                return true;
            } catch(Exception $e) {
                throw new Exception("Error closing connection to database");
            }
        }

        return false;
    }
}
