<?php
//created by damien with brice help

namespace Model;

class CompanyManager extends AbstractManager
{
    const TABLE = 'Company';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }
}