CREATE TABLE dias (
	id_dia serial,
	nome varchar(7),
	PRIMARY KEY(id_dia)
);
INSERT INTO dias (nome) VALUES ('Domingo'),
							   ('Segunda'),
							   ('Terça'),
							   ('Quarta'),
							   ('Quinta'),
							   ('Sexta'),
							   ('Sábado');


CREATE TABLE horarios (
	id_horario serial,
	nome varchar(6),
	inicio time,
	final time,
	PRIMARY KEY(id_horario)
);
INSERT INTO horarios (nome,inicio,final) VALUES ('AB - M', '07:40:00', '09:40:00'),
								  				('CD - M', '10:00:00', '12:00:00'),
								   				('AB - T', '13:30:00', '15:30:00'),
								   				('CD - T', '15:50:00', '17:50:00'),
								   				('AB - N', '18:00:00', '20:00:00'),
								   				('CD - N', '20:00:00', '22:00:00');


CREATE TABLE restricoes (
	id_restricao serial,
	id_user int,
	id_dia int,
	id_horario int,
	PRIMARY KEY(id_restricao),
	FOREIGN KEY (id_user) REFERENCES mdl_user(id),
	FOREIGN KEY (id_dia) REFERENCES dias(id_dia),
	FOREIGN KEY (id_horario) REFERENCES horarios(id_horario) 
);
