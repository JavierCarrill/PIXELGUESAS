USE proyecto;

CREATE TABLE productos(
id int primary key auto_increment,
descripcion varchar(100) not null,
precio numeric(8,2) not null,
stock int not null,
detalle varchar(100) not null,
imagen varchar(50) not null);

insert into productos values(null,'Clasica',9800,15,'por definir','hamburguesa1.jpg');
insert into productos values(null,'Clasica',9800,15,'por definir','hamburguesa2.jpg');
insert into productos values(null,'Clasica',9800,15,'por definir','hamburguesa3.jpg');
insert into productos values(null,'Clasica',9800,15,'por definir','hamburguesa4.jpg');
insert into productos values(null,'Clasica',9800,15,'por definir','hamburguesa5.jpg');
insert into productos values(null,'Clasica',9800,15,'por definir','hamburguesa6.jpg');
insert into productos values(null,'Clasica',9800,15,'por definir','hamburguesa7.jpg');
insert into productos values(null,'Clasica',9800,15,'por definir','hamburguesa8.jpg');
insert into productos values(null,'Clasica',9800,15,'por definir','hamburguesa9.jpg');

CREATE TABLE clientes(
idCliente int primary key auto_increment,
nombre varchar(30) not null,
correo varchar(30) not null,
pass varchar(50) not null);

CREATE TABLE pedido(
idPedido int primary key auto_increment,
idCliente varchar(100) not null references cliente(idcliente),
fecha varchar(30) not null);

CREATE TABLE detallepedido(
idPedido int NOT NULL,
id int  NOT NULL,
cantidad int  NOT NULL,
FOREIGN KEY (idPedido) REFERENCES pedido (idPedido),
FOREIGN KEY (id) REFERENCES productos (id));
