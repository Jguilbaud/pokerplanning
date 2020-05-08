<?php

namespace Services;

class JwtCookie extends StaticAccessClass {

    private function decodeJwtCookie(String $jwt): \stdClass {
        return \Firebase\JWT\JWT::decode($jwt, \Conf::MERCURE_JWT_KEY, [
            \MERCURE_JWT_ALGORITHM
        ]);
    }

    /**
     * Positionne le cookie mercure avec les targets autorisées
     *
     * @param String $hashGame
     */
    private function setOrUpdateMercureCookie(\stdClass $gameJwtCookie) {
        $oMercurePayload = new \Entities\MercureJwtPayload();
        foreach ( $gameJwtCookie as $room ) {
            $oMercurePayload->addSubscribe(\Conf::BASE_URL . '/room/' . $room->getHashGame());
        }

        $jwt = \Firebase\JWT\JWT::encode($oMercurePayload, \Conf::MERCURE_JWT_KEY, \MERCURE_JWT_ALGORITHM);
        setcookie(\MERCURE_COOKIE_NAME, $jwt, time() + 3600, '/', \Conf::MERCURE_COOKIE_DOMAIN);
    }

    public function setCookies(String $hashGame, String $playerPosition = 'guest') {
        $oGamePayload = new \Entities\PokerPlanningJwtPayload();
        $oGamePayload->setHashGame($hashGame);
        $oGamePayload->setPlayerPosition(strtolower($playerPosition));

        // On récupère le cookie si déjà existant
        if (isset($_COOKIE[\BELOTE_GAME_COOKIE_BASENAME])) {
            $jwtPayload = \Services\JwtCookie::get()->decodeJwtCookie($_COOKIE[\BELOTE_GAME_COOKIE_BASENAME]);
            foreach ( $jwtPayload as &$game ) {
                $toGame = new \Entities\PokerPlanningJwtPayload();
                $toGame->setHashGame($game->hashGame);
                $toGame->setPlayerPosition(strtolower($game->playerPosition));
                $game = $toGame;
            }
        } else {
            $jwtPayload = new \stdClass();
        }

        // On ajoute ou met à jour la partie dans le cookie
        $jwtPayload->$hashGame = $oGamePayload;

        $jwt = \Firebase\JWT\JWT::encode($jwtPayload, \Conf::MERCURE_JWT_KEY, \MERCURE_JWT_ALGORITHM);
        setcookie(\COOKIE_NAME, $jwt, time() + (3600 * 24), '/');

        // On fait de même pour Mercure
        $this->setOrUpdateMercureCookie($jwtPayload);
    }

    public function getBeloteGameCookie(String $hashGame): ?\Entities\PokerPlanningJwtPayload {
        if (isset($_COOKIE[\BELOTE_GAME_COOKIE_BASENAME])) {
            $jwtPayload = \Services\JwtCookie::get()->decodeJwtCookie($_COOKIE[\BELOTE_GAME_COOKIE_BASENAME]);

            // On regarde si notre cookie connait notre partie
            if (isset($jwtPayload->$hashGame)) {
                $oPayload = new \Entities\PokerPlanningJwtPayload();
                $oPayload->fromStdClass($jwtPayload->$hashGame);
                return $oPayload;
            }
        }
        return null;
    }
}



