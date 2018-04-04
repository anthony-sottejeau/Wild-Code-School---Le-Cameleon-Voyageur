<?php

namespace Model;
/**
 * concue par damien aidé de brice
 */
class Concept
{
    private $id;
    private $text;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId($id): Concept
    {
        $this->id = $id;
        return $this;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText($text): Concept
    {
        $this->text = $text;
        return $this;
    }
}
