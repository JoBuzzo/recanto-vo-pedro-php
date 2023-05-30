<?php

namespace Model;

class Produto
{
    private int $id;
    private string $nome;
    private float $valor;
    private int $estoque;



    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setValor(float $valor): void
    {
        $this->valor = $valor;
    }

    public function getValor(): float
    {
        return $this->valor;
    }

    public function setEstoque(int $estoque): void
    {
        $this->estoque = $estoque;
    }

    public function getEstoque(): int
    {
        return $this->estoque;
    }
};
