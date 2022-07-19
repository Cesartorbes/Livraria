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

CREATE TABLE IF NOT EXISTS livros (id INT NOT NULL AUTO_INCREMENT,
                                    categoria VARCHAR(100) NOT NULL,
                                    nome VARCHAR(40) NOT NULL,
                                    autor VARCHAR(120) NOT NULL,
                                    preco real,
                                    PRIMARY KEY (id)
                                    );                              
                                    
CREATE TABLE IF NOT EXISTS livros_images (
                                    id int NOT NULL AUTO_INCREMENT,
                                    livro_id int NOT NULL,
                                    filename varchar(100) NOT NULL,
                                    PRIMARY KEY (id),
                                    CONSTRAINT fk_livros_images FOREIGN KEY (`livro_id`) REFERENCES `livros` (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO usuario ('nome', 'senha', 'email', 'numero') values ('admin', 'admin123', 'admin@gmail.com', '1')