DROP DATABASE IF EXISTS livraria;

CREATE DATABASE IF NOT EXISTS livraria;

USE livraria;

CREATE TABLE IF NOT EXISTS usuario (usuario_id INT NOT NULL AUTO_INCREMENT,
                                    nome VARCHAR(100) NOT NULL,
                                    senha VARCHAR(40) NOT NULL,
                                    email VARCHAR(120) NOT NULL,
                                    numero INT,
                                    PRIMARY KEY (usuario_id)
                                    );

CREATE TABLE IF NOT EXISTS categorias (livro_id INT NOT NULL AUTO_INCREMENT,
                                    categoria VARCHAR(100) NOT NULL,
                                    nomelivro VARCHAR(40) NOT NULL,
                                    autor VARCHAR(120) NOT NULL,
                                    preco real,
                                    PRIMARY KEY (livro_id)
                                    );                                   

INSERT INTO usuario ('nome', 'senha', 'email', 'numero') values ('admin', 'admin123', 'admin@gmail.com', '1')