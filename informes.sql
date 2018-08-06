create database informes;

	use informes;

 Create table ciudad(
      id int Auto_Increment,
      nombre varchar(30)Not Null,
      indicativo char(3),
      pais_id int not null,
    constraint pk_ciudad Primary Key (id),
    constraint fk_ciudad_pais Foreign key(pais_id) references pais(id)
                );
CREATE TABLE empresa(

	nit bigint NOT NULL,
	nombre varchar(100), NOT NULL,
	direccion



)