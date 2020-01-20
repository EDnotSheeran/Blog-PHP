drop database if exists Banco_Postagens;
create database Banco_Postagens;
use Banco_Postagens;

create table postagem(
id int(11) auto_increment primary key not null,
titulo varchar(100) not null,
conteudo varchar(1000) not null
)charset=utf8;
create table comentario(
id int(11) auto_increment primary key not null,
nome varchar(45) not null,
mensagem varchar(300) not null,
id_postagem int(11) not null
);

/*Posts*/
 insert into postagem(titulo,conteudo) values('PHP','PHP é uma linguagem interpretada livre,
 usada originalmente apenas para o desenvolvimento de aplicações presentes e atuantes no lado
 do servidor, capazes de gerar conteúdo dinâmico na World Wide Web. Figura entre as primeiras
 linguagens passíveis de inserção em documentos HTML, dispensando em muitos casos o uso de 
 arquivos externos para eventuais processamentos de dados.');
 insert into postagem(titulo,conteudo) values('HTML','HTML é uma linguagem de marcação utilizada 
 na construção de páginas na Web. Documentos HTML podem ser interpretados por navegadores.
 A tecnologia é fruto da junção entre os padrões HyTime e SGML.');
 insert into postagem(titulo,conteudo) values('CSS','Cascading Style Sheets é uma linguagem de 
 folhas de estilo utilizada para definir a apresentação de documentos escritos em uma linguagem
 de marcação, como HTML ou XML. O seu principal benefício é a separação entre o formato e o 
 conteúdo de um documento.');
 insert into postagem(titulo,conteudo) values('JavaScript','JavaScript (frequentemente abreviado como JS)
 é uma linguagem de programação interpretada estruturada, de script em alto nível com tipagem dinâmica 
 fraca e multi-paradigma (protótipos, orientado a objeto, imperativo e, funcional). Juntamente com HTML 
 e CSS, o JavaScript é uma das três principais tecnologias da World Wide Web. JavaScript permite páginas 
 da Web interativas e, portanto, é uma parte essencial dos aplicativos da web. A grande maioria dos sites
 usa, e todos os principais navegadores têm um mecanismo JavaScript dedicado para executá-lo. ');
/*Commensts*/
 insert into comentario(nome,mensagem,id_postagem) values('Zezinho','muito bom o video',4);
 insert into comentario(nome,mensagem,id_postagem) values('anna','oi tudo bem',4);
 insert into comentario(nome,mensagem,id_postagem) values('jureba','mae to na globo',4);
 insert into comentario(nome,mensagem,id_postagem) values('edson','first',2);