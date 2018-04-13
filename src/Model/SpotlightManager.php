<?php

namespace Model;

class SpotlightManager extends AbstractManager
{
    const TABLE = 'Spotlight';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }
}