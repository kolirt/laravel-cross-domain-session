<?php

if (!function_exists('cd_session')) {
    function cd_session()
    {
        static $cd_session;

        if (!$cd_session) {
            $cd_session = new \App\Helpers\CrossDomainSession();
        }

        return $cd_session;
    }
}