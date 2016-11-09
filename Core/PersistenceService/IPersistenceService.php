<?php
/**
 * Interface IPersistenceService
 *
 * @package Core/PersistenceService
 */
interface IPersistenceService
{
    public function openDb();

    public function executeQuery($query);

    public function  closeDb();
}
