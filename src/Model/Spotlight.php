<?php

namespace Model;
/**
 * concue par damien
 */
class Spotlight
{
    private $id;
    private $text;
    private $photo;

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

    /**
     * Get the value of photo
     */ 
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set the value of photo
     *
     * @return  self
     */ 
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }
}