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
    private string $descricao;
    private string $primeiroDia;
    private ?string $ultimoDia;
    private array $multas;


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



    public function getDescricao() : string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): void
    {
        if (!$descricao) {
            $this->descricao = "Nada informado";
        }else{
            $this->descricao = $descricao;
        }
    }



    public function getPrimeiroDia() : string
    {
        return $this->primeiroDia;
    }

    public function getPrimeiroDiaF() : string
    {
        return date('d/m/Y', strtotime($this->primeiroDia));
    }

    public function setPrimeiroDia(string $primeiroDia): void
    {
        $this->primeiroDia = $primeiroDia;
    }

    

    public function getUltimoDia() : string|null
    {
        return $this->ultimoDia;
    }

    public function getUltimoDiaF() : string
    {
        if(!$this->ultimoDia){
            return "";
        }
        return date('d/m/Y', strtotime($this->ultimoDia));
    }

    public function setUltimoDia(string $ultimoDia = null): void
    {
        $this->ultimoDia = $ultimoDia;
    }



    public function addMulta(Multa $multa): void 
    {
        $this->multas[] = $multa;
    }

    public function getMultas(): array 
    {
        return $this->multas;
    }
}

?>