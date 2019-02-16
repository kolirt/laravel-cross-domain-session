<?php

if (!function_exists('cd_session')) {
    function cd_session()
    {
        static $cd_session;

        if (!$cd_session) {
            $cd_session = new Kolirt\CrossDomainSession\CrossDomainSession();
        }

        return $cd_session;
    }
}