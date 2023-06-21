<?php 

namespace Model;

class Multa{
    private int $id;
    private string $motivo;
    private float $valor;
    private bool $pago;
    private Reserva $reserva;

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setMotivo(string $motivo): void
    {
        $this->motivo = $motivo;
    }

    public function getMotivo(): string
    {
        return $this->motivo;
    }

    public function setValor(float $valor): void
    {
        $this->valor = $valor;
    }

    public function getValor(): float
    {
        return $this->valor;
    }

    public function setPago(bool $pago): void
    {
        $this->pago = $pago;
    }

    public function getPago($view = false): bool|string
    {
        if($view && $this->pago){
            return "Pago";
        }else if($view){
            return "Não pago";
        }
        return $this->pago;
    }

    public function setReserva(Reserva $reserva): void
    {
        $this->reserva = $reserva;
    }

    public function getReserva(): Reserva
    {
        return $this->reserva;
    }
};

?>