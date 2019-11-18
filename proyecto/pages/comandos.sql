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

insert into usuario values("juanito","juanito@mail.com","juan","lopez","lopez","12345","hombre",foto,"1999-04-16",curdate(),"admin");