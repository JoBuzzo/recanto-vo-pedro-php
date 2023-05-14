<?php

namespace Model;

use Enum\ReservaStatus;


class Reserva {
    private int $id;
    private string $nome;
    private string $numero;
    private float $pago;
    private float $totalPagar;
    private ReservaStatus $status;


    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }


    public function getNome(): string {
        return $this->nome;
    }

    public function setNome(string $nome): void {
        $this->nome = $nome;
    }

    public function getNumero(): string {
        return $this->numero;
    }
    
    public function getNumeroLink(): string {
        return "https://wa.me/{$this->numero}";
    }

    public function setNumero(string $numero): void {
        $this->numero = $numero;
    }


    public function getPago(): float {
        return $this->pago;
    }

    public function setPago(float $pago): void {
        $this->pago = $pago;
    }

  
    public function getTotalPagar(): float {
        return $this->totalPagar;
    }

    public function setTotalPagar(float $totalPagar): void {
        $this->totalPagar = $totalPagar;
    }


    public function getStatus(): ReservaStatus
    {
        return $this->status;
    }

    public function setStatus(ReservaStatus $status): void
    {
        $this->status = $status;
    }

}

?>