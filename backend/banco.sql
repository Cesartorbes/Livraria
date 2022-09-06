  DROP DATABASE IF EXISTS livraria;
  
  CREATE DATABASE IF NOT EXISTS livraria;
  
  USE livraria;
  
  CREATE TABLE IF NOT EXISTS usuario (
                                      usuario_id INT NOT NULL AUTO_INCREMENT,
                                      nome VARCHAR(100) NOT NULL,
                                      senha VARCHAR(40) NOT NULL,
                                      email VARCHAR(120) NOT NULL,
                                      numero INT,
                                      PRIMARY KEY (usuario_id)
                                      );
  
  CREATE TABLE IF NOT EXISTS livros (
                                      id INT NOT NULL AUTO_INCREMENT,
                                      categoria VARCHAR(100) NOT NULL,
                                      nome VARCHAR(40) NOT NULL,
                                      autor VARCHAR(120) NOT NULL,
                                      descricao VARCHAR(1000),
                                      preco real NOT NULL,
                                      filename varchar(100) NOT NULL,
                                      paginas int NOT NULL,
                                      idioma VARCHAR(100),
                                      PRIMARY KEY (id)
                                      );                              

  CREATE TABLE IF NOT EXISTS vendas (
                                      id INT NOT NULL AUTO_INCREMENT,
                                      nome varchar(100) not NULL,
                                      livro varchar(100) not null,
                                      descricao varchar(1000),
                                      preco real not null,
                                      telefone varchar(20) not null,
                                      email varchar(100) not null, 
                                      cidade varchar(100) not null,
                                      filename varchar(1000) not null,
                                      PRIMARY KEY(id)
                                    ); 

  CREATE TABLE IF NOT EXISTS carrinho (
                                      id_carrinho INT NOT NULL AUTO_INCREMENT,
                                      usuario varchar(100) not NULL,
                                      produto_id int not null,
                                      PRIMARY KEY(id_carrinho, produto_id)
                                    );                           


  
  INSERT INTO `usuario`(`nome`, `senha`, `email`, `numero`) VALUES ('admin','admin123','admin@gmail.com','1');
  INSERT INTO `usuario`(`nome`, `senha`, `email`) VALUES ('teste','teste123','teste@gmail.com');
  
  INSERT INTO `livros`(`categoria`,`nome`, `autor`, `descricao`, `preco`, `filename`, `paginas`, `idioma`) VALUES ('terror', 'It (1986)', 'Stephen King', 'A história segue as experiências de sete crianças, que são aterrorizadas por uma entidade maligna que explora os medos de suas vítimas para se disfarçar enquanto caçam suas presas. "It" aparece principalmente na forma do palhaço Pennywise para atrair sua presa preferida: crianças pequenas.', 19.99, 'uploads/terror1.jpg','187','Inglês'),
  ('terror', 'The Shining', 'Stephen King', 'Jack Torrance aceita ser caseiro de inverno do isolado Hotel Overlook, nas montanhas do Colorado, na esperança de curar seu bloqueio de escritor. Ele se instala com a esposa, Wendy, e o filho, Danny. O garoto logo começa a ser atormentando por premonições. Jack não consegue escrever e as visões de Danny se tornam mais perturbadoras.', 25.99, 'uploads/terror2.jpg','210','Inglês'),
  ('terror', 'Carrie', 'Stephen King', 'Carrie White é uma adolescente tímida, solitária e oprimida pela mãe, cristã ferrenha que vê pecado em tudo. A rotina na escola não alivia o dia a dia em casa. Para os colegas e professores, ela é estranha, não se encaixa e, por consequência, é alvo constante de bullying.', 42.30, 'uploads/terror3.jpg','154','Inglês'),
  ('romance', 'Perto do coração selvagem', 'Clarice Lispector', 'O livro mostra o cotidiano de Joana, menina criada pelo pai, já que a mãe, Elza, morrera muito cedo. O pai passado alguns anos também morre, então ela vai morar com a irmã de seu pai. A tia não gostava de Joana, pois a presença da menina a sufocava e a enviou para um internato, lá ocorre uma paixão avassaladora por seu professor um pouco mais velho. Um ponto culminante que a enviou para o internato foi dias antes acompanhando à tia as compras, como um teste para si mesma e causa espanto aos outros, Joana roubou um livro, trazendo mais dificuldades a sua convivência com a família da tia.', 23.30, 'uploads/romance1.jpg','154','Português'),
  ('romance', 'Laços de família', 'Clarice Lispector', 'A personagem Ana é uma mulher casada, mãe de dois filhos, levava uma vida doméstica pacata e cuidava dos seus com muito zelo e amor. A sua paz desapareceu quando certa vez ao ir às compras deparou-se com um cego que teve os ovos que carregava quebrados devido à freada brusca do bonde. Ana terminou por descer no Jardim Botânico, onde pela paisagem começou a temer o inferno.', 15.20, 'uploads/Romance2.jpg','136','Português'),
  ('romance', 'A hora da estrela', 'Clarice Lispector', 'O narrador conta a história de Macabéa, jovem alagoana de 19 anos que vive no Rio de Janeiro. Órfã, mal se lembrava dos pais, que morreram quando ela era ainda criança. Foi criada por uma tia muito religiosa e moralista, cheia de superstições e tabus, os quais ela passou para a sobrinha.', 32.40, 'uploads/Romance3.jpg','87','Português'),
  ('fantasia', 'Harry Potter e a Pedra Filosofal', 'J. K. Rowling', 'Quando bebê, Harry Potter fora deixado na porta de seus tios maternos Petúnia Dursley (irmã mais velha de Lillian) e Válter Dursley. Harry Potter cresceu na casa dos seus tios, que escondiam a verdade sobre sua família. Ao completar onze anos, Harry começa a receber cartas de um remetente desconhecido, que aumentam de quantidade à medida que seus tios as destroem. Quando finalmente consegue abrir uma delas, Harry descobre que possui poderes mágicos, como os seus pais, e que foi aceito na Escola de Magia e Bruxaria de Hogwarts.', 51.15, 'uploads/Fantasia1.jpg','255','Inglês'),
  ('fantasia', 'Animais Fantásticos e Onde Habitam', 'J. K. Rowling', 'Animais Fantásticos e Onde Habitam é um estudo da magizoologia, termo criado por J. K. Rowling para designar aquelas criaturas que possuem poderes que uma criatura normal não possui. Esses animais incluem criaturas de variadas mitologias - o dragão, a fênix, o kappa, o leprechaun - embora nem sempre do modo descrito pela cultura popular. As sereias, por exemplo, são um híbrido de humano e peixe em vez de sedutoras mulheres com rabo de peixe. Embora ainda focado na fantasia da série, o tom do livro é bastante cômico, incluindo a atribuição de certas criaturas à origem de eventos como os círculos nas plantações.', 67.23, 'uploads/Fantasia2.jpg','42','Inglês'),
  ('fantasia', 'Morte súbita', 'J. K. Rowling', 'Conta a história de uma pequena cidade do interior chamada Pagford, sendo dividido em sete partes: Parte Um (Vacância do Mandato de um Conselheiro), Parte Dois (Comentário Fundamentado), Parte Três (Duplicidade), Parte Quatro (Lunáticos), Parte Cinco (Privilégio), Parte Seis (Pontos Francos dos Grupos Voluntários) e Parte Sete (Combate à Pobreza). Cada parte é iniciada por uma citação de Administração dos Conselhos Locais, de Charles Arnold-Baker. Todas as partes contém vários capítulos, que vão contando as histórias dos vários personagens, por diferentes pontos de vista. E é assim que ricos entram em conflitos com os pobres, adolescentes com seus pais, esposas com seus maridos. Pagford não é o que parece ser.', 40.10, 'uploads/Fantasia3.jpg','512','Inglês'),