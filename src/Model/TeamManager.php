<?php
/**
 * Created by PhpStorm.
 * User: wilder22
 * Date: 03/04/18
 * Time: 15:07
 */

namespace Model;

class TeamManager extends AbstractManager
{
    const TABLE = 'team';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }
}
