<?php

/**
 * Class PrintService
 * @package Core/Services/Printer
 */

class PrintService
{
    public function __construct(){}

    /**
     * Método que pasando un array de objets stdClass pinta por consola una salida de resultados
     *
     * @param  array mixed objects $objecta, array de stdClass Objects
     */

    public function printOut($objects = [])
    {
        if (is_array($objects) && !empty($objects)) {
            foreach ($objects as $object) {
                if (is_object($object)) {
                    $data = get_object_vars($object);
                    $line = '';
                    foreach ($data as $key => $value)
                        $line .= $value . ", ";

                    print_r(substr($line, 0, -2));
                    print_r("\n");
                }
            }
        } else {
            print_r("No hay resultados encontrados \n");
        }
    }
}


