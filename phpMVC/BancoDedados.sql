CREATE DATABASE IF NOT EXISTS NPAluno ;
USE NPAluno ;

DROP TABLE IF EXISTS NPAluno.Setor ;

CREATE TABLE IF NOT EXISTS NPAluno.Setor (
  id_setor INT NOT NULL AUTO_INCREMENT,
  nom_setor VARCHAR(50) NOT NULL,
  PRIMARY KEY (id_setor));

DROP TABLE IF EXISTS NPAluno.Professor ;

CREATE TABLE IF NOT EXISTS NPAluno.Professor (
  id_professor INT NOT NULL AUTO_INCREMENT,
  nom_professor VARCHAR(150) NOT NULL,
  des_email VARCHAR(150) NULL,
  num_cpf CHAR(11) NOT NULL,
  num_telefone VARCHAR(45) NULL,
  des_senha VARCHAR(255) NOT NULL,
  idc_admin TINYINT(1) NOT NULL DEFAULT 0,
  idc_ativo TINYINT(1) NOT NULL DEFAULT 0,
  id_setor INT NULL,
  PRIMARY KEY (id_professor),
  CONSTRAINT fk_Professor_Setor
    FOREIGN KEY (id_setor)
    REFERENCES NPAluno.Setor (id_setor));
    
CREATE UNIQUE INDEX idx_Professor_Cpf ON NPAluno.Professor (num_cpf ASC);

DROP TABLE IF EXISTS NPAluno.Questionario ;

CREATE TABLE IF NOT EXISTS NPAluno.Questionario (
  id_questionario INT NOT NULL AUTO_INCREMENT,
  nom_questionario VARCHAR(50) NOT NULL,
  des_questionario TEXT NULL,
  dta_inicio DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  dta_fim DATETIME NULL,
  dta_validade DATETIME NULL,
  id_professor INT NOT NULL,
  PRIMARY KEY (id_questionario),
  CONSTRAINT fk_Questionario_Professor
    FOREIGN KEY (id_professor)
    REFERENCES NPAluno.Professor (id_professor));
    
DROP TABLE IF EXISTS NPAluno.Questao;

CREATE TABLE IF NOT EXISTS NPAluno.Questao (
  id_questao INT NOT NULL AUTO_INCREMENT,
  des_questao TEXT NOT NULL,
  idc_obrigatoria TINYINT(1) NOT NULL DEFAULT 0,
  idc_fechada TINYINT(1) NOT NULL DEFAULT 0,
  id_questionario INT NOT NULL,
  PRIMARY KEY (id_questao),
  CONSTRAINT fk_Questao_Questionario
    FOREIGN KEY (id_questionario)
    REFERENCES NPAluno.Questionario (id_questionario));
    
DROP TABLE IF EXISTS NPAluno.Opcao_Questao ;

CREATE TABLE IF NOT EXISTS NPAluno.Opcao_Questao (
  id_opcao_questao INT NULL AUTO_INCREMENT,
  des_opcao VARCHAR(255) NOT NULL,
  id_questao INT NOT NULL,
  PRIMARY KEY (id_opcao_questao),
  CONSTRAINT fk_Opcao_Questao_Questao
    FOREIGN KEY (id_questao)
    REFERENCES NPAluno.Questao (id_questao));
    
DROP TABLE IF EXISTS NPAluno.Resposta_Questao ;

CREATE TABLE IF NOT EXISTS NPAluno.Resposta_Questao (
  id_resposta INT NOT NULL AUTO_INCREMENT,
  id_questao INT NOT NULL,
  id_questionario INT NOT NULL,
  des_resposta VARCHAR(255) NULL,
  PRIMARY KEY (id_resposta),
  CONSTRAINT fk_Resposta_Questao_Questao
    FOREIGN KEY (id_questao)
    REFERENCES NPAluno.Questao (id_questao)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_Resposta_Questao_Questionario
    FOREIGN KEY (id_questionario)
    REFERENCES NPAluno.Questionario (id_questionario));

INSERT INTO NPAluno.Setor (nom_setor) VALUES ('Tecnologia');
INSERT INTO NPAluno.Professor(nom_professor, num_cpf, des_senha, idc_admin, idc_ativo) VALUES ('Admin', '12345600000', MD5('abc123@'), 1, 1);