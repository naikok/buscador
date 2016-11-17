<?php
require_once('Core/Services/Search/Repository/IRepository.php');
require_once('Core/PersistenceService/Persistence.php');
require_once ('Core/PersistenceService/IPersistenceService.php');
require_once('Core/Transformers/TransformResultArraySearch.php');

/**
 * Class SearchService
 * @package Core/Services/Search
 */

class SearchService extends Persistence implements IPersistenceService, IRepository
{
    protected $transformer;

    /**
     * Constructor class
     *
     * @param  string $host , ip base de datos
     * @param  string  $username , usuario de conexión a base de datos
     * @param  string  $password , password de conexión a base de datos
     * @param  string $database , nombre de conexión a base de datos
     * @param  string $port, puerto del sistema gestor de base de datos
     * @param ITransformer $transformer, transformer para formatear la salida de base de datos
     * @throws Exception si condición no se cumple
     */

    public function __construct($host, $username, $password, $database, $port, ITransformer $transformer)
    {
        if (!$host)
            throw new Exception("Host must be provided for establishing a connection to db");

        if (!$username)
            throw new Exception("Username must be provided for establishing a connection to db");

        if (!$password)
            throw new Exception("Password must be provided for establishing a connection to db");

        if (!$database)
            throw new Exception("Database name must be provided for establishing a connection to db-schema");

        if (!$port)
            throw new Exception("Please provide a port where the database system is located");

        if (!$transformer)
            throw new Exception("Please provide a transformer to transform the output");

        parent::__construct($host, $username, $password, $database, $port);
        $this->transformer = $transformer;
    }

    /**
     *  Método que dada una palabra, devuelve un array de objetos stdClass con los resultados encontrados
     *
     * @param  string $host , ip base de datos
     * @param $searchTerm , término o palabra de búsqueda
     * @return array
     */

    public function SearchByWord($searchTerm)
    {
        $result = parent::executeQuery(str_replace('?', $searchTerm, IRepository::SEARCH_BY_WORD));
        $transformedObjects = [];
        if (!empty ($result) && is_array($result)) {
            foreach ($result as $val)
                $transformedObjects[] = $this->transformer->transform($val);
        }
        return $transformedObjects;
    }
}
