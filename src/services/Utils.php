<?php

namespace Services;

class Utils {

    /**
     * Génère un hash alphanumérique aléatoire de la longueur souhaitée
     *
     * @param number $size Taille du hash souhaité
     * @return string Hash généré
     */
    public static function generateHash($size = 16) {
        return substr(bin2hex(openssl_random_pseudo_bytes($size)), 0, $size);
    }
}
