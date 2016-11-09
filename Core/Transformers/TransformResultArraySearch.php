<?php

require_once('Core/Transformers/ITransformer.php');
/**
 * Class TransformResultArraySearch
 * @package Core\Transformers
 */

class TransformResultArraySearch implements ITransformer
{

    public function __construct(){}

    /**
     * Método que convierte un array de datos de resultados de búsqueda en objeto stdClass
     * @param array $array => the resulset from db coming as an array of data
     * @return \stdClass
     */

    public function transform($array = [])
    {
        $object = new \stdClass();

        if (isset($array['nombre']))
            $object->nombre = $array['nombre'];

        if (isset($array['num_apartamentos']))
            $object->num_apartamentos = $array['num_apartamentos'];
        if (isset($array['capacidad']))
            $object->capacidad = $array['capacidad'];

        if (isset($array['num_estrellas']))
            $object->num_estrellas = $array['num_estrellas'];

        if (isset($array['tipo_habitacion']))
            $object->tipo_habitación = $array['tipo_habitacion'];

        if (isset($array['ciudad']))
            $object->ciudad = $array['ciudad'];

        if (isset($array['provincia']))
            $object->provincia = $array['provincia'];

        return $object;
    }
}
