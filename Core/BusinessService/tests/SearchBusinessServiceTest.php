<?php
require_once('Core/BusinessService/SearchBusinessService.php');
require_once('Core/Services/Search/SearchService.php');
require_once('Core/Transformers/TransformResultArraySearch.php');
require_once('Configuration/database.php');

/**
 * Class SearchBusinessServiceTest
 * @package Core/Services/Search
 */

class SearchBusinessServiceTest extends PHPUnit_Framework_TestCase
{
    protected $transformer;
    protected $searchService;
    protected $searchBusinessService;

    protected function setUp()
    {
        $this->transformer = new TransformResultArraySearch();
        $this->searchService = new SearchService(database::host, database::username, database::password, database::database_name, database::port, $this->transformer);
        $this->searchBusinessService = new SearchBusinessService($this->searchService);
    }

    public function testSearchByWordReturnEmpty()
    {
        $result = $this->searchBusinessService->searchByWord('hola');
        $items = count($result);
        $this->assertEquals(0, $items);
    }

    public function testSearchByWordReturnMoreThanOneItem()
    {
        $result = $this->searchBusinessService->searchByWord('Huesca');
        $this->assertTrue(count($result) > 0);
    }

    public function testSearchByWordReturnException()
    {
        $message = null;
        try {
            $this->searchBusinessService->searchByWord('aa');
        } catch (Exception $e) {
            $message = $e->getMessage();
        }
        $this->assertEquals($message, 'Error, la palabra debe contener al menos 3 carácteres');
    }

    protected function tearDown(){}
}