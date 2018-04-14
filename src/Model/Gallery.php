<?php
/**
 * Created by PhpStorm.
 * User: wilder22
 * Date: 14/04/18
 * Time: 10:54
 */

namespace Model;


class Gallery
{
    private $id;
    private $url;
    private $alt;

    /**
     * @return int
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getUrl() : string
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url): void
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getAlt() : string
    {
        return $this->alt;
    }

    /**
     * @param mixed $alt
     */
    public function setAlt($alt): void
    {
        $this->alt = $alt;
    }


}