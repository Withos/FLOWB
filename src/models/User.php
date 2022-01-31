<?php

require_once ('Location.php');

class User
{
    private string $email;
    private string $password;
    private string $name;
    private string $surname;
    private string $date_of_birth;
    private String $image;
    private int $id;
    private string $bio;
    private Location $location;
    private array $tags;

    public function __construct(string $email, string $password, string $name,
                                string $surname, string $date_of_birth, string $image = "default_profile_pic.png",
                                string $bio = "No bio")
    {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
        $this->date_of_birth = $date_of_birth;
        $this->image = $image;
        $this->bio = $bio;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }


    public function getDateOfBirth(): string
    {
        return $this->date_of_birth;
    }


    public function setDateOfBirth($date_of_birth): void
    {
        $this->date_of_birth = $date_of_birth;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    public function getBio(): string
    {
        return $this->bio;
    }

    public function setBio(string $bio): void
    {
        $this->bio = $bio;
    }

    public function getLocation(): Location
    {
        return $this->location;
    }

    public function setLocation(Location $location): void
    {
        $this->location = $location;
    }

    public function getTags(): array
    {
        return $this->tags;
    }

    public function setTags(array $tags): void
    {
        $this->tags = $tags;
    }

    public function getAge(): int{
        $date = new DateTime($this->date_of_birth);
        $now = new Datetime();
        return $now->diff($date)->y;
    }

}