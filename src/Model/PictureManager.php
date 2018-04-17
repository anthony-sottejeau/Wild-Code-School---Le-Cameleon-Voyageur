<?php
/**
 * Created by PhpStorm.
 * User: wilder22
 * Date: 14/04/18
 * Time: 10:52
 */

namespace Model;

/**
 * Class GalleryManager
 * @package Model
 */
class PictureManager extends AbstractManager
{
    const TABLE = 'picture';

    /**
     * GalleryManager constructor.
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
    }
}