<?php

Class Keyword
{
    private $keywords = [];
    private $provider;

    public function __construct($provider)
    {
        $this->provider = $provider;
    }

    public function Parse($str)
    {
        $el = explode(',', $str);
        $this->keywords = array_map('trim', $el);

        return $this;
    }

    public function Save()
    {
        $ithis->provider->save($this->keywords);
    }
}