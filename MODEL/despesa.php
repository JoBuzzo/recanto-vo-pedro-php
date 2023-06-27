<?php

namespace Model;


class  Despesa
{
    private int $id;
    private string $descricao;
    private float $valor;
    private string $data;


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

    public function getData(): string
    {
        return $this->data;
    }

    public function getDataF(): string
    {
        return  date("d/m/Y", strtotime($this->data));
    }

    public function setData(string $data)
    {
        $this->data = $data;
    }
};
