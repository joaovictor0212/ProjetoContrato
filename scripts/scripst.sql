

CREATE TABLE contrato (
  id_contrato INT AUTO_INCREMENT PRIMARY KEY,
  nome_comodante VARCHAR(255) NOT NULL,
  endereco_comodante VARCHAR(255) NOT NULL,
  nome_comodatario VARCHAR(255) NOT NULL,
  endereco_comodatario VARCHAR(255) NOT NULL,
  bem_comodado VARCHAR(255) NOT NULL,
  data_inicio DATE NOT NULL,
  data_termino DATE NOT NULL,
  condicoes TEXT NOT NULL
);
ALTER TABLE contrato
ADD COLUMN id_usuario INT NOT NULL;

ALTER TABLE contrato ADD CONSTRAINT id_usuario FOREIGN KEY (id_usuario) REFERENCES usuarios (ID);

ALTER TABLE usuarios
ADD COLUMN id_contrato INT NOT NULL,
ADD CONSTRAINT usuario_contrato FOREIGN KEY (id_contrato)
REFERENCES contrato(id_contrato);

ALTER TABLE contrato
ADD COLUMN id_usuario INT(11) NOT NULL;

ALTER TABLE contrato
ADD CONSTRAINT contrato_usuario
FOREIGN KEY (id_usuario)
REFERENCES usuarios(ID);

ALTER TABLE usuario ADD FOREIGN KEY (contrato_usuario) REFERENCES contrato(id_usuario);



INSERT INTO clausulas (id_contrato, titulo, texto) 
VALUES 
(1, 'Obrigações do Comodante', 'O Comodante se compromete a entregar o bem objeto deste contrato em perfeito estado de uso e funcionamento, responsabilizando-se por todos os vícios ou defeitos anteriores à entrega.'),

(1, 'Obrigações do Comodatário', 'O Comodatário se compromete a conservar o bem objeto deste contrato, devendo utilizá-lo de acordo com as instruções de uso fornecidas pelo Comodante, responsabilizando-se por quaisquer danos ou prejuízos causados ao bem.');

ALTER TABLE usuario
CHANGE contrato_id id_contrato INT;
ALTER TABLE contrato
CHANGE contrato contrato_id INT;

ALTER TABLE usuario
ADD FOREIGN KEY (contrato_id) REFERENCES usuario(id);


CREATE TABLE suporte (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    problema TEXT NOT NULL
);
ALTER TABLE contrato
ADD COLUMN estado_devolucao_esperado VARCHAR(20) NOT NULL DEFAULT 'Novo',
ADD COLUMN responsavel_manutencao VARCHAR(100) NOT NULL;

ALTER TABLE contrato
ADD COLUMN estado_devolucao_REAL VARCHAR(20) NOT NULL;

ALTER TABLE contrato
ADD COLUMN estado_real VARCHAR(20) NOT NULL;