drop database if exists Banco_Postagens;
create database Banco_Postagens;
use Banco_Postagens;

create table postagem(
id int(11) auto_increment primary key not null,
titulo varchar(100) not null,
conteudo varchar(350) not null
);
create table comentario(
id int(11) auto_increment primary key not null,
nome varchar(45) not null,
mensagem varchar(300) not null,
id_postagem int(11) not null
);

/*Posts*/
insert into postagem(titulo,conteudo) values('Postagem 1','dasdasdasdasda asdasd sdaasdas da dasd asdasdasdasd  
asduiuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu');
insert into postagem(titulo,conteudo) values('Postagem 2','djghjghj asdfaf fafgdf jfhjhj ghg');
insert into postagem(titulo,conteudo) values('Postagem 3','drtertertret bnbnbnasdasdasd  asd');
insert into postagem(titulo,conteudo) values('Postagem 4','dbnbnbn abnbnbnbnbnasd  asd');
/*Commensts*/
insert into comentario(nome,mensagem,id_postagem) values('edson','primeiro comentario',1);
insert into comentario(nome,mensagem,id_postagem) values('anna','segundo comentario',1);
insert into comentario(nome,mensagem,id_postagem) values('jureba','terceiro comentario',1);
insert into comentario(nome,mensagem,id_postagem) values('edson','primeiro comentario',2);