<?php
/**
 * Created by PhpStorm.
 * User: wcs
 * Date: 23/10/17
 * Time: 10:57
 * PHP version 7
 */

namespace Model;

/**
 * Class Place
 *
 */
class Place
{
    private $id;
    private $adressDay;
    private $adressEvening;
    private $day;


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return Place
     */
    public function setId($id): Place
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAdressDay()
    {
        return $this->adressDay;
    }

    /**
     * @param mixed $adressDay
     */
    public function setAdressDay($adressDay): void
    {
        $this->adressDay = $adressDay;
    }

    /**
     * @return mixed
     */
    public function getAdressEvening()
    {
        return $this->adressEvening;
    }

    /**
     * @param mixed $adressEvening
     */
    public function setAdressEvening($adressEvening): void
    {
        $this->adressEvening = $adressEvening;
    }

    /**
     * @return mixed
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * @param mixed $day
     */
    public function setDay($day): void
    {
        $this->day = $day;
    }
}
