<?php


class Event
{
    private string $title;
    private string $description;
    private string $date;
    private  string $imageUrl;

    public function __construct(string $title,
                                string $description,
                                string $date,
                                string $imageUrl = '/public/pics/event1.jpg')
    {
        $this->title = $title;
        $this->description = $description;
        $this->date = $date;
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
        return $this->like;
    }

    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    public function setImageUrl(string $imageUrl): void
    {
        $this->imageUrl = $imageUrl;
    }
}