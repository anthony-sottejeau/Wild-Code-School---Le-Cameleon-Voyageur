<?php

namespace Model;
/**
 * concue par damien aidé de brice
 */
class Company
{
    private $id;
    private $text;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId($id): Company
    {
        $this->id = $id;
        return $this;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText($text): Company
    {
        $this->text = $text;
        return $this;
    }
}
