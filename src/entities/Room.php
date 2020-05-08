<?php

namespace Entities;

class Room extends AbstractEntity {

    const STEP_VOTE = 'vote';

    const STEP_RESULT = 'result';
    protected int $id;
    protected String $hash;
    protected String $label = '';
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
    public function getLabel(): String {
        return $this->label;
    }

    /**
     *
     * @param string $label
     */
    public function setLabel(String $label): void {
        $this->label = $label;
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