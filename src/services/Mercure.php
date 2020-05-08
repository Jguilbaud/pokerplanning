<?php

namespace Services;

class Mercure extends StaticAccessClass {

    /**
     * Envoie une notification via Mercure
     *
     * @param array $targets
     * @param array $topics
     * @param \Entities\AbstractJwtPayload $data
     * @return
     */
    protected function notify(array $targets, array $topics, \Entities\AbstractJwtPayload $data) {
        $oJwtPublisher = new \Entities\MercureJwtPayload();
        $oJwtPublisher->addPublish('*');
        $jwtPublisher = \Firebase\JWT\JWT::encode($oJwtPublisher, \Conf::MERCURE_JWT_KEY, \MERCURE_JWT_ALGORITHM);

        // init mercure publisher
        $mercurePublisher = new \Symfony\Component\Mercure\Publisher(\Conf::MERCURE_URL, new \Symfony\Component\Mercure\Jwt\StaticJwtProvider($jwtPublisher));
        // Serialize the update, and dispatch it to the hub, that will broadcast it to the clients
        return $mercurePublisher(new \Symfony\Component\Mercure\Update($topics, json_encode($data), $targets));
    }

    /**
     * Notifie d'un évènement standard
     *
     * @param String $roomHash
     * @param String $eventName
     * @param array $data
     */
    public function notifyRoomGenericEvent(String $roomHash, String $eventName, array $data = array()): void {
        $payload = new \Entities\PokerPlanningJwtPayload();
        $payload->setAction($eventName);
        $payload->setData($data);
        $payload->addData('roomHash', $roomHash);

        $this->notify([
            \Conf::BASE_URL . '/room/' . $roomHash
        ], [
            \Conf::BASE_URL . '/room/' . $roomHash
        ], $payload);
    }
}
