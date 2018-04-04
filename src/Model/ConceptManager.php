<?php
//created by damien with brice help

namespace Model;

class ConceptManager extends AbstractManager
{
    const TABLE = 'Concept';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }
}