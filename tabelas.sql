
CREATE DATABASE piscina;

CREATE TABLE reserva (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    numero VARCHAR(20) NOT NULL,
    status ENUM('PENDENTE', 'CONFIRMADA', 'CANCELADA') NOT NULL,
    pago FLOAT NOT NULL,
    totalPagar FLOAT NOT NULL
);

CREATE TABLE reserva_data (
    id INT AUTO_INCREMENT PRIMARY KEY,
    reserva_id INT NOT NULL,
    data DATE NOT NULL,
    UNIQUE KEY reserva_data_uk (reserva_id, data),
    FOREIGN KEY (reserva_id) REFERENCES reserva(id) ON DELETE CASCADE
);