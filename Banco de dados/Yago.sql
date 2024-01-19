CREATE DATABASE IF NOT EXISTS Yago;
USE Yago;

-- Tabela de Proprietários
CREATE TABLE Proprietarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    genero ENUM('Masculino', 'Feminino'),
    idade INT
);

-- Tabela de Veículos
CREATE TABLE Veiculos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    proprietario_id INT,
    marca VARCHAR(50),
    modelo VARCHAR(50),
    ano INT,
    FOREIGN KEY (proprietario_id) REFERENCES Proprietarios(id)
);

-- Tabela de Revisões
CREATE TABLE Revisoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    veiculo_id INT,
    data_revisao DATE,
    descricao TEXT,
    FOREIGN KEY (veiculo_id) REFERENCES Veiculos(id)
);
-- Inserir dados na tabela Proprietarios
INSERT INTO Proprietarios (nome, genero, idade) VALUES
  ('Maria', 'Feminino', 30),
  ('João', 'Masculino', 25),
  ('Ana', 'Feminino', 35);

-- Inserir dados na tabela Veiculos
INSERT INTO Veiculos (proprietario_id, marca, modelo, ano) VALUES
  (1, 'Toyota', 'Corolla', 2020),
  (2, 'Honda', 'Civic', 2019),
  (3, 'Ford', 'Focus', 2018);

-- Inserir dados na tabela Revisoes
INSERT INTO Revisoes (veiculo_id, data_revisao, descricao) VALUES
  (1, '2023-01-05', 'Troca de óleo'),
  (2, '2023-02-10', 'Revisão completa'),
  (3, '2023-03-15', 'Substituição de freios');

  CREATE TABLE pessoas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    genero VARCHAR(20) NOT NULL,
    idade INT NOT NULL
);

CREATE TABLE veiculos (
    id_veiculo INT AUTO_INCREMENT PRIMARY KEY,
    id_proprietario INT,
    nome_veiculo VARCHAR(255),
    FOREIGN KEY (id_proprietario) REFERENCES proprietarios(id_proprietario)
);

-- Suponha que temos uma tabela 'veiculos' com uma chave estrangeira 'fk_proprietario'
-- referenciando a tabela 'proprietarios'

-- Passo 1: Identificar a restrição de chave estrangeira
SHOW CREATE TABLE veiculos;

-- Passo 2: Remover as referências à linha
-- Exemplo: Atualizar ou excluir linhas na tabela 'veiculos' que referenciam a linha que queremos excluir na tabela 'proprietarios'
UPDATE veiculos SET id_proprietario = NULL WHERE id_proprietario = 'id_que_voce_quer_excluir';

-- Passo 3: Excluir a linha na tabela principal
DELETE FROM proprietarios WHERE id_proprietario = 'id_que_voce_quer_excluir';

ALTER TABLE veiculos ADD COLUMN id_proprietario INT;