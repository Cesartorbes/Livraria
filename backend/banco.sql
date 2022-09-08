  DROP DATABASE IF EXISTS livraria;
  
  CREATE DATABASE IF NOT EXISTS livraria;
  
  USE livraria;
  
  CREATE TABLE IF NOT EXISTS usuario (
                                      usuario_id INT NOT NULL AUTO_INCREMENT,
                                      nome VARCHAR(100) NOT NULL,
                                      senha VARCHAR(40) NOT NULL,
                                      email VARCHAR(120) NOT NULL,
                                      cidade VARCHAR(200) NOT NULL,
                                      telefone varchar(20) NOT NULL,
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


  
  INSERT INTO `usuario`(`nome`, `senha`, `email`, `cidade`, `telefone`, `numero`) VALUES ('admin','123','admin@gmail.com','Bento Gonçalves','(00) 0000-0000','1');
  INSERT INTO `usuario`(`nome`, `senha`, `email`, `cidade`, `telefone`) VALUES ('teste','123','teste@gmail.com','Bento Gonçalves','(00) 0000-0000');
  
  INSERT INTO `livros`(`categoria`,`nome`, `autor`, `descricao`, `preco`, `filename`, `paginas`, `idioma`) VALUES ('terror', 'It (1986)', 'Stephen King', 'A história segue as experiências de sete crianças, que são aterrorizadas por uma entidade maligna que explora os medos de suas vítimas para se disfarçar enquanto caçam suas presas. "It" aparece principalmente na forma do palhaço Pennywise para atrair sua presa preferida: crianças pequenas.', 19.99, 'uploads/terror1.jpg','187','Inglês'),
  ('terror', 'The Shining', 'Stephen King', 'Jack Torrance aceita ser caseiro de inverno do isolado Hotel Overlook, nas montanhas do Colorado, na esperança de curar seu bloqueio de escritor. Ele se instala com a esposa, Wendy, e o filho, Danny. O garoto logo começa a ser atormentando por premonições. Jack não consegue escrever e as visões de Danny se tornam mais perturbadoras.', 25.99, 'uploads/terror2.jpg','210','Inglês'),
  ('terror', 'Carrie', 'Stephen King', 'Carrie White é uma adolescente tímida, solitária e oprimida pela mãe, cristã ferrenha que vê pecado em tudo. A rotina na escola não alivia o dia a dia em casa. Para os colegas e professores, ela é estranha, não se encaixa e, por consequência, é alvo constante de bullying.', 42.30, 'uploads/terror3.jpg','154','Inglês'),
  ('romance', 'Perto do coração selvagem', 'Clarice Lispector', 'O livro mostra o cotidiano de Joana, menina criada pelo pai, já que a mãe, Elza, morrera muito cedo. O pai passado alguns anos também morre, então ela vai morar com a irmã de seu pai. A tia não gostava de Joana, pois a presença da menina a sufocava e a enviou para um internato, lá ocorre uma paixão avassaladora por seu professor um pouco mais velho. Um ponto culminante que a enviou para o internato foi dias antes acompanhando à tia as compras, como um teste para si mesma e causa espanto aos outros, Joana roubou um livro, trazendo mais dificuldades a sua convivência com a família da tia.', 23.30, 'uploads/romance1.jpg','154','Português'),
  ('romance', 'Laços de família', 'Clarice Lispector', 'A personagem Ana é uma mulher casada, mãe de dois filhos, levava uma vida doméstica pacata e cuidava dos seus com muito zelo e amor. A sua paz desapareceu quando certa vez ao ir às compras deparou-se com um cego que teve os ovos que carregava quebrados devido à freada brusca do bonde. Ana terminou por descer no Jardim Botânico, onde pela paisagem começou a temer o inferno.', 15.20, 'uploads/Romance2.jpg','136','Português'),
  ('romance', 'A hora da estrela', 'Clarice Lispector', 'O narrador conta a história de Macabéa, jovem alagoana de 19 anos que vive no Rio de Janeiro. Órfã, mal se lembrava dos pais, que morreram quando ela era ainda criança. Foi criada por uma tia muito religiosa e moralista, cheia de superstições e tabus, os quais ela passou para a sobrinha.', 32.40, 'uploads/Romance3.jpg','87','Português'),
  ('fantasia', 'Harry Potter e a Pedra Filosofal', 'J. K. Rowling', 'Quando bebê, Harry Potter fora deixado na porta de seus tios maternos Petúnia Dursley (irmã mais velha de Lillian) e Válter Dursley. Harry Potter cresceu na casa dos seus tios, que escondiam a verdade sobre sua família. Ao completar onze anos, Harry começa a receber cartas de um remetente desconhecido, que aumentam de quantidade à medida que seus tios as destroem. Quando finalmente consegue abrir uma delas, Harry descobre que possui poderes mágicos, como os seus pais, e que foi aceito na Escola de Magia e Bruxaria de Hogwarts.', 51.15, 'uploads/Fantasia1.jpg','255','Inglês'),
  ('fantasia', 'Animais Fantásticos e Onde Habitam', 'J. K. Rowling', 'Animais Fantásticos e Onde Habitam é um estudo da magizoologia, termo criado por J. K. Rowling para designar aquelas criaturas que possuem poderes que uma criatura normal não possui. Esses animais incluem criaturas de variadas mitologias - o dragão, a fênix, o kappa, o leprechaun - embora nem sempre do modo descrito pela cultura popular. As sereias, por exemplo, são um híbrido de humano e peixe em vez de sedutoras mulheres com rabo de peixe. Embora ainda focado na fantasia da série, o tom do livro é bastante cômico, incluindo a atribuição de certas criaturas à origem de eventos como os círculos nas plantações.', 67.23, 'uploads/Fantasia2.jpg','42','Inglês'),
  ('fantasia', 'Morte súbita', 'J. K. Rowling', 'Conta a história de uma pequena cidade do interior chamada Pagford, sendo dividido em sete partes: Parte Um (Vacância do Mandato de um Conselheiro), Parte Dois (Comentário Fundamentado), Parte Três (Duplicidade), Parte Quatro (Lunáticos), Parte Cinco (Privilégio), Parte Seis (Pontos Francos dos Grupos Voluntários) e Parte Sete (Combate à Pobreza). Cada parte é iniciada por uma citação de Administração dos Conselhos Locais, de Charles Arnold-Baker. Todas as partes contém vários capítulos, que vão contando as histórias dos vários personagens, por diferentes pontos de vista. E é assim que ricos entram em conflitos com os pobres, adolescentes com seus pais, esposas com seus maridos. Pagford não é o que parece ser.', 40.10, 'uploads/Fantasia3.jpg','512','Inglês'),
  ('aventura', 'A ilha do tesouro', 'Robert Louis Stevenson', 'Conta a aventura de Jim Hawkins, um garoto de 12 anos, que, após a morte do pirata Billy Bones na hospedaria de sua mãe, descobre um mapa de uma ilha onde supostamente há um tesouro escondido. O menino, perseguido por outros piratas, revela o segredo para o Dr. Livesey e o Sir.', 9.10, 'uploads/aventura1.jpg','213','Inglês'),
  ('aventura', 'A arte da guerra', 'Sun Tzu', 'A Arte da Guerra é uma obra literária do pensador chinês Sun Tzu, escrito por volta do ano 500 a.C. A obra funciona como um manual estratégico para conflitos armados, mas que pode ter várias aplicações em outras áreas da vida.', 25.99, 'uploads/Aventura2.jpg','104','Chinês'),
  ('aventura', 'A metamorfose', 'Franz Kafka', 'Nesta obra, Kafka descreve um caixeiro viajante de nome de Gregor Samsa, que abandona as suas vontades e desejos para sustentar a família e pagar a dívida dos pais. Numa certa manhã, Gregor acorda metamorfoseado num inseto monstruoso. Kafka descreve este inseto como algo parecido com uma barata gigante.', 32.00, 'uploads/Aventura3.jpg','115','Alemão'),
  ('suspense', 'Caixa de pássaros', 'Alex Michaelides', 'Alicia tinha 33 anos quando deu cinco tiros no rosto do marido, e ela nunca mais disse uma palavra. A recusa de Alicia a falar ou a dar qualquer explicação transforma essa tragédia doméstica em algo muito maior – um mistério que atrai a atenção do público e aumenta ainda mais a fama da pintora.', 19.99, 'uploads/suspense1.jpg','339','inglês'),
  ('suspense', 'A paciente sileciosa', 'Josh Malerman', 'Malorie (Sandra Bullock) e seus filhos estão em um mundo pós-apocalíptico e precisam chegar em um refúgio para escapar do Problema, criaturas que ao serem vistas fazem pessoas se tornarem extremamente violentas.', 29.99, 'uploads/suspense2.jpg','273','inglês'),
  ('suspense', 'O homem de giz', 'C.J. Tudor', 'Durante este período, de 1986 a 2016, Eddie e seus amigos se esforçam para superar o passado. Entretanto, num certo dia, no presente, eles recebem um aviso: o desenho de um homem de giz enforcado. E, após um de seus amigos aparecer morto, Eddie percebe que precisa descobrir o que realmente aconteceu no passado.', 15.99, 'uploads/suspense3.jpg','272','inglês'),
  ('historia', 'Sapiens - Uma Breve História da Humanidade', 'Yuval Harari', 'O livro aborda a História da Humanidade desde a evolução arcaica da espécie humana na idade da pedra, até o século XXI. Seu principal argumento é que o Homo sapiens domina o mundo porque é o único animal capaz de cooperar de forma flexível em largo número e o faz por ser a única espécie capaz de acreditar em coisas que não existem na natureza e são produtos puramente de sua imaginação, tais como deuses, nações, dinheiro e direitos humanos', 10.00, 'uploads/historia1.jpg','152','Hebraico'),
  ('historia', 'A História do Mundo Para Quem Tem Pressa', 'Emma Marriott', 'A História do Mundo para Quem Tem Pressa é na verdade um guia sintético, mas abrangente, para tudo o que precisamos saber sobre os acontecimentos mais importantes da história, desde as antigas civilizações até o final da Segunda Guerra Mundial e a criação da ONU. Quer esteja interessado no império de Alexandre, o Grande, ou no florescimento da república cartaginesa e sua destruição por Roma; na ascensão dos califados árabes ou na dinastia Tang, da China; na Guerra Civil Norte-Americana ou na emancipação das mulheres, você encontrará os fatos essenciais neste livro igualmente essencial.', 39.90, 'uploads/historia2.jpg','200','inglês'),
  ('historia', 'Guerra e Paz', 'Liev Tolstói', 'Guerra e Paz é um romance histórico escrito pelo autor russo Liev Tolstói e publicado entre 1865 e 1869 no Russkii Vestnik, um periódico da época. É uma das obras mais volumosas da história da literatura universal. O livro narra a história da Rússia à época de Napoleão Bonaparte.', 25.90, 'uploads/historia3.jpg','1225','russo'),
  ('biografia', 'Diário de Anne Frank', 'Anne Frank', 'O Diário de Anne Frank é um livro escrito por Anne Frank entre 12 de junho de 1942 e 1.º de agosto de 1944 durante a Segunda Guerra Mundial. É conhecido por narrar momentos vivenciados pelo grupo de judeus confinados em um esconderijo durante a ocupação nazista dos Países Baixos.', 40.00, 'uploads/biografia1.jpg','445','neerlandês'),
  ('biografia', 'Becoming', 'Michelle Obama', 'Biografia da Michelle Obama', 39.99, 'uploads/biografia2.jpg','112','inglês'),
  ('biografia', 'Eu sou Malala - A história da garota que defendeu o direito à educação e foi baleada pelo Talibã', 'Christina Lamb e Malala Yousafzai', 'Nasceu em Mingora, Swat, Jaiber Pastunjuá, Paquistão. Seu pai é Ziauddin Yousafzai e sua mãe é Tor Pekai Yousafzai e tem dois irmãos. Fala pachto e inglês e é conhecida por seu ativismo em favor dos direitos civis, especialmente os direitos das mulheres do vale do rio Swat, onde o Taliban proibiu a frequência escolar de meninas. Aos 13 anos, Malala Yousafzai alcançou notoriedade ao escrever um blog para a BBC sob o nome de Gul Makai, explicando sua vida sob o regime do Tehrik-i-Taliban Pakistan (TTP) e as tentativas de recuperar o controle do vale após a ocupação militar que obrigou-os a ir para as áreas rurais. Os taliban forçaram o encerramento de escolas públicas e proibiram a educação de meninas entre 2003 e 2009.', 29.99, 'uploads/biografia3.jpg','246','inglês'),
  ('ciencia', 'Uma Breve História do Tempo', 'Stephen Hawking', 'Explica vários temas de Cosmologia, incluindo a Teoria do Big Bang, os buracos negros, os cones de luz e a Teoria das Supercordas ao leitor não especialista no tema. Seu principal objetivo é dar uma visão geral do tema mas, não usual para um livro de divulgação, também tenta explicar algo de matemáticas complexas.', 9.99, 'uploads/ciencia1.jpg','247','inglês'),
  ('ciencia', 'Cosmos', 'Carl Sagan', 'A mais inteligente e imaginativa reflexão sobre as dimensões geológicas, antropológicas, biológicas, históricas e astronômicas do universo.', 29.99, 'uploads/ciencia2.jpg','321','inglês'),
  ('ciencia', 'The Demon-Haunted World', 'Ann Druyan e Carl Sagan', 'Assombrado com as explicações pseudocientíficas e místicas que ocupam cada vez mais os espaços dos meios de comunicação, Carl Sagan reafirma o poder positivo e benéfico da ciência e da tecnologia para iluminar os dias de hoje e recuperar os valores da racionalidade.', 51.99, 'uploads/ciencia3.jpg','457','inglês'),
  ('infantil', 'O Pequeno Príncipe', 'Antoine de Saint-Exupéry', 'A história começa com o narrador descrevendo suas recordações, em que aos 6 anos de idade fez um desenho de uma jiboia que havia engolido um elefante. Quando perguntava o que os adultos viam em seu desenho, todos eles achavam que o garoto havia desenhado um chapéu. Ao corrigir as pessoas sobre seu desenho, era sempre respondido que precisava de um hobby mais sério e maduro. O narrador então lamenta a falta de criatividade demonstrada pelos adultos.', 19.99, 'uploads/infantil1.jpg','93','francês'),
  ('infantil', 'A Árvore Generosa', 'Shel Silverstein', 'Todos os dias um menino vai até uma árvore para se pendurar em seus galhos, comer suas maçãs e descansar sob sua sombra. O menino ama a árvore e ela, feliz, o ama também. Porém, à medida que o tempo passa, o garoto cresce e começa a desejar mais do que a simples companhia de sua amiga para brincar e repousar.', 24.36, 'uploads/infantil2.jpg','64','inglês'),
  ('infantil', 'Amoras', 'Emicida', 'Livro infantil', 20.93, 'uploads/infantil3.jpg','162','inglês')