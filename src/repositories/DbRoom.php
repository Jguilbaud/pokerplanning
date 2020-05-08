<?php

namespace Repositories;

class DbRoom extends AbstractDbTable {

    /**
     * Nom de la table
     *
     * @var string
     */
    protected $tableName = 'rooms';
    protected $entityClassName = \Entities\Room::class;


    public function create(\Entities\AbstractEntity $object): void {

    }

    public function update(\Entities\AbstractEntity $object): void {

    }




}