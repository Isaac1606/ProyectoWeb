drop table usuario;

create table usuario(
    id_usuario varchar(20) not null,
    correo varchar(50) not null,
    nombre varchar(20) not null,
    apellido1 varchar(20),
    apellido2 varchar(20),
    clave varchar(20) not null,
    genero varchar(10) not null,
    imagen longblob,
    fecha_nacimiento date not null,
    fecha_registro date not null,
    tipo varchar(10) not null,
    constraint llave_primaria primary key (id_usuario,correo)
);

insert into usuario values("juanito","juanito@mail.com","juan","lopez","lopez","12345","hombre","","1999-04-16",curdate(),"admin");
select id_usuario,correo,nombre,tipo from usuario;
update usuario set tipo = "admin" where tipo = "normal" and id_usuario = "broli";

create table imagen(
    id_imagen int not null auto_increment,
    id_usuario varchar(20) not null,
    descripcion varchar(255),
    archivo longblob not null,
    fecha_subida datetime not null,
    constraint llave_primaria primary key (id_imagen,fecha_subida),
    foreign key (id_usuario) references usuario(id_usuario)
);

create table categoria(
    id_imagen int not null,
    nombre_categoria varchar (20) not null,
    foreign key (id_imagen) references imagen(id_imagen)
);

select id_imagen from imagen where id_imagen in (select id_imagen from categoria where nombre_categoria = "cat1");
update imagen set descripcion = 'imagen de prueba 1 xd' where id_imagen = 1;

prueba
create table imagen(
    id_imagen int not null auto_increment primary key,
    id_usuario varchar(20) not null,
    foreign key (id_usuario) references usuario(id_usuario)
);

insert into imagen values(0,"broli");
insert into imagen values(0,"karla");

select archivo from imagen where id_imagen in (select id_imagen from categoria where nombre_categoria = "cat1");

create table categoria(
    id_imagen int not null,
    nombre_categoria varchar (20) not null,
    foreign key (id_imagen) references imagen(id_imagen)
);

insert into categoria values(1,"cat1");
insert into categoria values(1,"cat2");
insert into categoria values(1,"cat3");
insert into categoria values(2,"cat1");
insert into categoria values(3,"cat3");
insert into categoria values(2,"cat2");

select id_imagen from categoria where nombre_categoria = "cat1";