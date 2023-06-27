
CREATE DATABASE piscina;

CREATE TABLE piscina.reserva (
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


CREATE TABLE piscina.produto(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    valor FLOAT NOT NULL,
    estoque INT NOT NULL
);

CREATE TABLE piscina.multa(
    id INT AUTO_INCREMENT PRIMARY KEY,
    motivo VARCHAR(255) NOT NULL,
    valor FLOAT NOT NULL,
    pago BOOLEAN NOT NULL, 
    id_reserva INT, 
    FOREIGN KEY (id_reserva) REFERENCES reserva(id)
);

CREATE TABLE piscina.despesa(
    id INT AUTO_INCREMENT PRIMARY KEY,
    descricao VARCHAR(200) NOT NULL,
    valor FLOAT NOT NULL,
    data DATE NOT NULL
);

CREATE TABLE piscina.usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario varchar(20) NOT NULL,
    senha varchar(32) NOT NULL,
    email varchar(50) NOT NULL
);

Insert into usuario (usuario, senha, email) values ('Administrador','25d55ad283aa400af464c76d713c07ad', 'admin@recanto.com');
                                                                                -- 12345678
