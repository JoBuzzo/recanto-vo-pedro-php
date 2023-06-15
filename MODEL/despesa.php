<?php

namespace Model;

use DateTime;

class  Despesa
{
    private int $id;
    private string $descricao;
    private float $valor;
    private DateTime $data;


    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getDescricao(): string
    {
        return  $this->descricao;
    }

    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }

    public function getValor(): float
    {
        return  $this->valor;
    }

    public function setValor(float $valor): void
    {
        $this->valor = $valor;
    }

    public function getData(): DateTime
    {
        return  $this->data;
    }

    public function setData(DateTime $data)
    {
        $this->data = $data;
    }
};
