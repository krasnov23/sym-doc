<?php

namespace App\Model;

class BusInfoModel
{

    private int $id;

    private string $modelName;

    private string $gosNumber;

    private string $color;


    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getModelName(): string
    {
        return $this->modelName;
    }

    public function setModelName(string $modelName): self
    {
        $this->modelName = $modelName;

        return $this;
    }

    public function getGosNumber(): string
    {
        return $this->gosNumber;
    }

    public function setGosNumber(string $gosNumber): self
    {
        $this->gosNumber = $gosNumber;

        return $this;

    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }



}