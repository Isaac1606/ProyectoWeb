create database proyecto;

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
    constraint llave_foranea foreign key (id_imagen) references imagen(id_imagen)
);

create table envio_imagen(
    id_envio int not null auto_increment primary key,
    id_imagen int not null,
    id_usuario varchar(20) not null,
    correo_destino varchar(50) not null,
    dedicatora varchar(255),
    fecha_envio date not null,
    foreign key (id_imagen) references imagen(id_imagen),
    foreign key (id_usuario) references imagen(id_usuario)
);
