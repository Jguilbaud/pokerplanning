<?php

namespace Entities;

class PokerPlanningJwtPayload extends AbstractJwtPayload {
    private String $roomHash = '';
    private int $userId = 0;

    /**
     *
     * @return string
     */
    public function getRoomHash(): String {
        return $this->roomHash;
    }

    /**
     *
     * @param string $roomHash
     */
    public function setRoomHash(String $roomHash): void {
        $this->roomHash = $roomHash;
    }

    /**
     *
     * @return number
     */
    public function getUserId(): int {
        return $this->userId;
    }

    /**
     *
     * @param number $userId
     */
    public function setUserId(int $userId): void {
        $this->userId = $userId;
    }

    public function jsonSerialize(): array {
        return array(
            'hashRoom' => $this->roomHash,
            'userId' => $this->userId
        );
    }

    public function fromStdClass(\stdClass $stdClass): void {
        $this->roomHash = $stdClass->roomHash;
        $this->userId = $stdClass->userId;
    }
}