<?php

namespace Entities;

abstract class AbstractEntity {

    /**
     * Alimente les propriétés de l'objet à partir d'une ligne de résultat de la bdd
     * Surcharger cette méthode pour gérer les cas particulier après avoir fait un parent::populateObjectFromDb()
     *
     * @param Array $dbRow
     */
    public function populateObjectFromDb(array $dbRow, array $excludedParticularFields = array()): void {
        // on parcoure les résultats
        foreach ( $dbRow as $name => $value ) {
            if (property_exists($this, $name) && !in_array($name, $excludedParticularFields)) {
                $this->$name = $value;
            }
        }
    }
}