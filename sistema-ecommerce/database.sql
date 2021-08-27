CREATE TABLE PRODUCTO(
	codpro int not null AUTO_INCREMENT,
	nompro varchar(50) null,
	despro varchar(100) null,
	prepro numeric(6,2) null,
	estado int null,
	CONSTRAINT pk_producto
	PRIMARY KEY (codpro)
);

alter table PRODUCTO add rutimapro varchar(100) null;

INSERT INTO PRODUCTO (nompro,despro,prepro,estado,rutimapro)
VALUES ('Promocion 1','pizza focaccia el estilo italiano','10',1,'Promocion_1.png')
,('Promocion 2','llevate dos pizzas al estilo focaccia y una coca-cola de dos litros','10',1,'promocion4.jpg')
,('Michelangelo','la pizza perfecta para aquellos que buscan algo delicioso pero ligero','7',1,'Pizza1Michelangelo.png')
,('Donatello','el esquisito sabor de las aceitunas negras combinado con los champinones la hacen una pizza ganadora','8',1,'Donatello.png')
,('Leonardo.','lo que la hace realmente tan especial es el pimenton ahumado con conbinado con el sabor unico de las aceituans negras y nuestra salsa especial dandole un toque crujiente insuperable','8',1,'PizzaLeonardo.png')
,('Rafael','si amas la tocineta no lo pienses dos veces y prueba esta maravilla','9',1,'PizzaRafael.png')
,('Margarita','la pizaa margarita tradicional al estilo de easycatchpizza','3',1,'PizzaMargarita.png')
,('pequeno catire','la preferida de los consentidos de la casa ','3',1,'pequeno_catire.png');

CREATE TABLE USUARIO(
	codusu int not null AUTO_INCREMENT,
	nomusu varchar(50) ,
	apeusu varchar(50) ,
	emausu varchar(50) not null,
	pasusu varchar(400) not null,
	estado int not null,
	CONSTRAINT pk_usuario
	PRIMARY KEY (codusu)
);

INSERT INTO USUARIO (nomusu,apeusu,emausu,pasusu,estado)
VALUES ('Usuario','Demo','correo@example.com','123456',1);

create table PEDIDO(
	codped int not null AUTO_INCREMENT,
	codusu int not null,
	codpro int not null,
	fecped datetime not null,
	estado int not null,
	dirusuped varchar(50) not null,
	telusuped varchar(12) not null,
	PRIMARY KEY (codped)
);

alter table PRODUCTO add rutimapro varchar(100)null;
INSERT INTO PRODUCTO(nompro,despro,prepro,estado,rutimapro)
VALUES ('PizzaDonatello', ' nuestra combinacion de aceituans negras con champiñones la hace una pizza ganadora','8',1,'PizzaDonatello.png'),
('Pizza Michelangelo','es la opcion mas ideal para aquellos que buscan algo delicioso pero ligero','7',1,'Pizza_Michelangelo.png');