<?php
require_once('Core/Services/Search/SearchService.php');

/**
 * Class SearchBusinessService
 * @package Core/BusinessService
 */

class SearchBusinessService
{
    protected $searchService;

    /**
     * Constructor class
     * @param SearchService $searchService servicio que contiene el motor de búsqueda
     */

    public function __construct($searchService)
    {
        $this->searchService = $searchService;
    }

    /**
     * Método que haciendo  uso de searchService, aplica una lógica de negocio para validar los carácteres
     * de entrada
     *
     * @param  string $searchTerm, palabra a buscar en el buscador
     * @throws Exception si condición no se cumple
     */

    public function searchByWord($searchTerm)
    {
        if ((strlen($searchTerm)) < 3)
            throw new Exception("Error, la palabra debe contener al menos 3 carácteres");

        return $this->searchService->SearchByWord($searchTerm);
    }
}