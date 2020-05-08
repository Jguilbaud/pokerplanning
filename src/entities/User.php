<?php

namespace Entities;

class User extends AbstractEntity {

    const ROLE_GUEST = 'guest';

    const ROLE_VOTER = 'voter';
    protected int $roomId;
    protected String $name;
    protected String $role;
    protected ?int $vote = static::ROLE_GUEST;

    /**
     *
     * @return mixed
     */
    public function getRoomId(): int {
        return $this->roomId;
    }

    /**
     *
     * @param mixed $roomId
     */
    public function setRoomId(int $roomId): void {
        $this->roomId = $roomId;
    }

    /**
     *
     * @return mixed
     */
    public function getName(): String {
        return $this->name;
    }

    /**
     *
     * @param mixed $name
     */
    public function setName(String $name): void {
        $this->name = $name;
    }

    /**
     *
     * @return mixed
     */
    public function getRole(): String {
        return $this->role;
    }

    /**
     *
     * @param mixed $userRole
     */
    public function setRole(String $role): void {
        $this->role = $role;
    }

    /**
     *
     * @return string
     */
    public function getVote(): int {
        return $this->vote;
    }

    /**
     *
     * @param string $userVote
     */
    public function setVote(int $vote): void {
        $this->vote = $vote;
    }
}