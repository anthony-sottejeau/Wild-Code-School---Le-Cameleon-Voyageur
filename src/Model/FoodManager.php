<?php
/**
 * Created by PhpStorm.
 * User: louise
 * Date: 04/04/18
 * Time: 16:28
 */
namespace Model;

class FoodManager extends AbstractManager
{
    const TABLE = 'food';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    public function selectFoodByCategory(): array
    {
        return $this->pdoConnection->query('SELECT *,f.name AS foodName, c.name AS categoryName FROM food AS f JOIN category c on c.id = f.category', \PDO::FETCH_ASSOC, $this->className)->fetchAll();
    }
}