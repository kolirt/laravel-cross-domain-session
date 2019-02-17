<?php

namespace Kolirt\CrossDomainSession;

class CrossDomainSession
{

    public $domains = null;

    public function __construct()
    {
        $this->domains = collect(config('cross-domain-session.domains', []));
    }

    protected function get($key = null, $default = null)
    {
        $session = session()->get(config('cross-domain-session.key', 'cross-domain-session'), []);

        if (!$key)
            return $session;

        return $session[$key] ?? $default;
    }

    protected function set($key, $value = null)
    {
        $session = $this->get();

        if (is_null($value)) {
            $session = $key;
        } else {
            $session[$key] = $value;
        }

        session()->put(config('cross-domain-session.key', 'cross-domain-session'), $session);
        session()->save();
    }

    protected function push($key, $value)
    {
        $session = $this->get();

        if (is_array($session[$key] ?? null)) {
            $session[$key][] = $value;
        } else {
            $session[$key] = [$value];
        }

        session()->put(config('cross-domain-session.key', 'cross-domain-session'), $session);
        session()->save();
    }

    protected function isValideDomain($domain)
    {
        $referer = preg_replace('#^(http?s:\/\/[a-zA-Z0-9-\.]+).*$#', '$1', $domain);
        return $this->domains->search($referer) !== false;
    }

    protected function request()
    {
        return $this->encode($this->get());
    }

    protected function encode($data)
    {
        return urlencode(json_encode($data));
    }

    protected function decode($data)
    {
        return json_decode(urldecode($data), true);
    }

    public function __call($method, $args)
    {
        return $this->$method(...$args);
    }

    public static function __callStatic($method, $args)
    {
        return (new static())->$method(...$args);
    }

}