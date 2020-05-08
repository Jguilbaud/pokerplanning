<?php

namespace Repositories;

class DbUser extends AbstractDbTable {

    /**
     * Nom de la table
     *
     * @var string
     */
    protected $tableName = 'users';
    protected $entityClassName = \Entities\User::class;


    public function create(\Entities\AbstractEntity $object): void {
    }

    public function update(\Entities\AbstractEntity $object): void {
    }



}