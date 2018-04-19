<?php
/**
 * Created by PhpStorm.
 * User: wilder13
 * Date: 19/04/18
 * Time: 10:57
 */

namespace Model;


class Notification
{
    private $type;
    private $message;

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message): void
    {
        $this->message = $message;
    }

    public function __construct()
    {
        $this->setType('succes');
        $this->setMessage('L\'enregistrement s\'est bien effectué');
    }

    public function change($type, $message)
    {
        $this->setMessage($message);
        $this->setType($type);
    }
}