CREATE TABLE PRODUCTO(
    codpro int not null AUTO_INCREMENT,
    nompro varchar(50) null,
    despro varchar(100) null,
    prepro number(6,2)null, /*si no funciona pon numeric en vez de number*/
    estado int null,
    CONSTRAINT pk_producto
    PRIMARY KEY (codpro)
);

alter table PRODUCTO add rutimapro varchar(100)null;
INSERT INTO PRODUCTO(nompro,despro,prepro,estado,rutimapro)
VALUES ('Papel Crepe', 'Ideal para decoracion de trabajos escolares','14.99',1,'crepe.jpg'),
('Papel Bond A4','Papel ultra blanco de 180gr','9.99',1,'bonda4.jpg');