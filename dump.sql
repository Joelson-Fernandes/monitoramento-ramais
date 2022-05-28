CREATE DATABASE monitor_ramais; 

USE monitor_ramais;

CREATE TABLE ramais( 
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    ramal VARCHAR(4) NOT NULL,
    nome VARCHAR(20) NOT NULL,
    ip VARCHAR(15) NOT NULL,
    `status` VARCHAR(20) NOT NULL
);

USE monitor_ramais;

INSERT INTO `ramais` (`ramal`, `nome`, `ip`, `status`) VALUES 
('7000', 'Chaves', '181.219.125.7', 'ocupado'),
('7001', 'Kiko', '181.219.125.7', 'chamando'),
('7002', 'Godines', '(Unspecified)', 'pausa'),
('7003', 'Nhonho', '(Unspecified)', 'indisponivel'),
('7004', 'Madruga', '181.219.125.7', 'disponivel'),
('7005', 'Chiquinha', '181.219.125.7', 'indisponivel'),
('7006', 'Popis', '181.219.125.7', 'indisponivel'),
('7007', 'Jaiminho', '181.219.125.7', 'disponivel'),
('7008', 'Girafales', '181.219.125.7', 'pausa');