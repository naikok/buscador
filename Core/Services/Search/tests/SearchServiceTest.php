<?php
require_once('Core/Services/Search/SearchService.php');
require_once('Core/Transformers/TransformResultArraySearch.php');
require_once('Configuration/database.php');

class SearchServiceTest extends PHPUnit_Framework_TestCase
{
    protected $transformer;
    protected $searchService;

    public static  function constructorProviderFail(){

        return array(
            array(
                array('host' => 'localhost',
                      'username' => '',
                      'password' =>'123456',
                      'port' => '3306',
                      'dbname' =>'destini'
                )
            )

        );
    }

    protected function setUp()
    {
        $this->transformer = new TransformResultArraySearch();
        $this->searchService = new SearchService(database::host, database::username, database::password, database::database_name, database::port, $this->transformer);
    }

    /**
     * @dataProvider  constructorProviderFail
     * @expectedException  Exception
     *
     */

    public function testConstructorFail($data)
    {
        $transformer = new TransformResultArraySearch();

        $object = new SearchService($data['host'], $data['username'], $data['password'], $data['dbname'], $data['port'], $transformer);
    }

    public function testSearchByWordReturnObjectsStdClass()
    {
        $result = $this->searchService->searchByWord('Mojacar');
        $this->assertTrue(count($result) > 0);
        $this->assertContainsOnlyInstancesOf(stdClass::class, $result);
    }

    public function testSearchByWordRetunArrayEmpty()
    {
        $result = $this->searchService->searchByWord('aaaaaaaaa');
        $this->assertTrue(empty($result));
    }

    protected function tearDown()
    {

    }
}