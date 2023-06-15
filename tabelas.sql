
CREATE DATABASE piscina;

CREATE TABLE reserva (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    numero VARCHAR(20) NOT NULL,
    status ENUM('PENDENTE', 'CONFIRMADO', 'CANCELADO') NOT NULL,
    pago FLOAT NOT NULL,
    totalPagar FLOAT NOT NULL,
    descricao LONGTEXT NOT NULL,
    primeiroDia DATE UNIQUE NOT NULL,
    ultimoDia DATE UNIQUE NULL
);


CREATE TABLE produto(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    valor FLOAT NOT NULL,
    estoque INT NOT NULL,
);

CREATE TABLE multa(
    id INT AUTO_INCREMENT PRIMARY KEY,
    motivo VARCHAR(255) NOT NULL,
    valor FLOAT NOT NULL,
    id_reserva INT,
    FOREIGN KEY (id_reserva) REFERENCES reserva(id)
);

CREATE TABLE despesa(
    id INT AUTO_INCREMENT PRIMARY KEY,
    descricao VARCHAR(200) NOT NULL,
    valor FLOAT NOT NULL,
    data DateTime NOT NULL
);

