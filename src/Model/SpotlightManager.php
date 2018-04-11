<?php
//created by damien tout seul!!
namespace Model;

class SpotlightManager extends AbstractManager
{
    const TABLE = 'Spotlight';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }
}