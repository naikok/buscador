<?php
require_once('Core/BusinessService/SearchBusinessService.php');
require_once('Core/Services/Search/SearchService.php');
require_once('Core/Transformers/TransformResultArraySearch.php');
require_once('Core/Services/CommandLine/CommandLineService.php');
require_once('Configuration/database.php');
require_once('Core/Services/Printer/PrintService.php');


$transformer = new TransformResultArraySearch();
$printService = new PrintService();
$searchService = new SearchService(database::host, database::username, database::password, database::database_name, database::port, $transformer);
$searchBusinessService = new SearchBusinessService($searchService);
$commandLineService = new CommandLineService($searchBusinessService, $printService);
$commandLineService->execute();




