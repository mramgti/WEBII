-- 1. Criar o banco de dados (se ainda não existir)
CREATE DATABASE IF NOT EXISTS projeto_teste
CHARSET = utf8mb4
COLLATE = utf8mb4_unicode_ci;

-- 2. Usar o banco de dados
USE projeto_teste;

-- 3. Tabela 'grupo'
-- Deve ser criada primeiro, pois 'pessoa' depende dela.
-- Baseado em: model/grupo.php e dao/GrupoDao.php
CREATE TABLE IF NOT EXISTS grupo (
    idgrupo INT AUTO_INCREMENT PRIMARY KEY,
    descricao VARCHAR(100) NOT NULL
);

-- 4. Tabela 'pessoa'
-- Depende da tabela 'grupo'.
-- Baseado em: model/pessoa.php e dao/PessoaDao.php
CREATE TABLE IF NOT EXISTS pessoa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    endereco VARCHAR(255),
    telefone VARCHAR(20),
    email VARCHAR(100),
    sexo CHAR(1),
    idgrupo INT,
    FOREIGN KEY (idgrupo) REFERENCES grupo(idgrupo)
);

-- 5. Tabela 'chamada'
-- Depende da tabela 'pessoa'.
-- Baseado em: model/chamada.php, dao/ChamadaDao.php e indexchamada.php
CREATE TABLE IF NOT EXISTS chamada (
    idchamada INT AUTO_INCREMENT PRIMARY KEY,
    id INT NOT NULL,
    atendido TINYINT(1) DEFAULT 0,
    data DATE,
    hora TIME,
    observacao TEXT,
    FOREIGN KEY (id) REFERENCES pessoa(id)
        ON DELETE CASCADE -- Opcional: se excluir uma pessoa, exclui suas chamadas.
);

-- 6. Inserir um grupo padrão
-- Necessário porque dao/PessoaDao.php tenta inserir 'idgrupo = 1'
-- por padrão ao criar uma nova pessoa.
INSERT INTO grupo (idgrupo, descricao) 
VALUES (1, 'Geral')
ON DUPLICATE KEY UPDATE descricao = 'Geral';