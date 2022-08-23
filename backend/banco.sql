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
                                    descricao VARCHAR(1000), 
                                    preco real NOT NULL, 
                                    filename varchar(100) NOT NULL,
                                    PRIMARY KEY (id)
                                    );                              



INSERT INTO `usuario`(`nome`, `senha`, `email`, `numero`) VALUES ('admin','admin123','admin@gmail.com','1');
INSERT INTO `usuario`(`nome`, `senha`, `email`) VALUES ('teste','teste123','teste@gmail.com');

INSERT INTO `livros`(`categoria`,`nome`, `autor`, `descricao`, `preco`, `filename`) VALUES ('terror', 'It (1986)', 'Stephen King', 'A história segue as experiências de sete crianças, que são aterrorizadas por uma entidade maligna que explora os medos de suas vítimas para se disfarçar enquanto caçam suas presas. "It" aparece principalmente na forma do palhaço Pennywise para atrair sua presa preferida: crianças pequenas.', 19.99, 'uploads/terror1.jpg'),
('terror', 'The Shining', 'Stephen King', 'Jack Torrance aceita ser caseiro de inverno do isolado Hotel Overlook, nas montanhas do Colorado, na esperança de curar seu bloqueio de escritor. Ele se instala com a esposa, Wendy, e o filho, Danny. O garoto logo começa a ser atormentando por premonições. Jack não consegue escrever e as visões de Danny se tornam mais perturbadoras.', 25.99, 'uploads/terror2.jpg'),
('terror', 'Carrie', 'Stephen King', 'Carrie White é uma adolescente tímida, solitária e oprimida pela mãe, cristã ferrenha que vê pecado em tudo. A rotina na escola não alivia o dia a dia em casa. Para os colegas e professores, ela é estranha, não se encaixa e, por consequência, é alvo constante de bullying.', 42.30, 'uploads/terror3.jpg'),



/*                                     
CREATE TABLE IF NOT EXISTS livros_images (
                                    id int NOT NULL AUTO_INCREMENT,
                                    livro_id int NOT NULL,
                                    filename varchar(100) NOT NULL,
                                    PRIMARY KEY (id),
                                    CONSTRAINT fk_livros_images FOREIGN KEY (`livro_id`) REFERENCES `livros` (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

lixozinho por enquanto */