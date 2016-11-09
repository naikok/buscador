<?php
require_once ('Core/BusinessService/SearchBusinessService.php');
require_once('Core/Services/Printer/PrintService.php');


class CommandLineService {

    protected $searchBusinessService;
    protected $printService;

    public function __construct($searchService, $printService)
    {
        $this->searchBusinessService = $searchService;
        $this->printService = $printService;
    }

    public function execute()
    {
        do {
            echo "Por favor establezca un parametro de busqueda de alojamiento.  Teclea 'la palabra a buscar' para continuar:";
            $handle = fopen ("php://stdin","r");
            $line = fgets($handle);
            $text = substr_replace($line, "", -1);
            $numChars = (int) strlen($text);
            if ($numChars >= 3) {
                echo "Lanzando su busqueda por favor espere!\n";
                $objects = $this->searchBusinessService->searchByWord($text);
                $this->printService->printOut($objects);
            }
            fclose($handle);
        } while( $numChars < 3);
    }

}
