<?php

namespace Enum;

class ReservaStatus {
    const CONFIRMADO = 'CONFIRMADO';
    const PENDENTE = 'PENDENTE';
    const CANCELADO = 'CANCELADO';

    private $value;

    public function __construct($value) {
        $this->value = $value;
    }

    public function getValue() {
        return $this->value;
    }

}

?>