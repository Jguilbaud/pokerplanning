<?php

namespace Entities;

class Room extends AbstractEntity {

    const STEP_VOTE = 'vote';

    const STEP_RESULT = 'result';
    protected int $id;
    protected String $hash;
    protected String $libelle = '';
    protected String $step = static::STEP_VOTE;

    /**
     *
     * @return mixed
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     *
     * @param mixed $id
     */
    public function setId(int $id): void {
        $this->id = $id;
    }

    /**
     *
     * @return mixed
     */
    public function getHash(): String {
        return $this->hash;
    }

    /**
     *
     * @param mixed $hash
     */
    public function setHash(String $hash) {
        $this->hash = $hash;
    }

    /**
     *
     * @return string
     */
    public function getLibelle(): String {
        return $this->libelle;
    }

    /**
     *
     * @param string $libelle
     */
    public function setLibelle(String $libelle): void {
        $this->libelle = $libelle;
    }

    /**
     *
     * @return string
     */
    public function getStep(): String {
        return $this->step;
    }

    /**
     *
     * @param string $step
     */
    public function setStep(String $step): void {
        $this->step = $step;
    }
}