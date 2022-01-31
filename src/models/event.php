<?php

require_once ('Location.php');

class Event
{
    private string $title;
    private string $description;
    private string $date;
    private string $image;
    private Location $location;
    private int $id;

    public function __construct(string $title,
                                string $description,
                                string $date,
                                Location $location,
                                string $image = 'event1.jpg')
    {
        $this->title = $title;
        $this->description = $description;
        $this->date = $date;
        $this->image = $image;
        $this->location = $location;

    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    public function getLocation(): Location
    {
        return $this->location;
    }

    public function setLocation(Location $location): void
    {
        $this->location = $location;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }




}