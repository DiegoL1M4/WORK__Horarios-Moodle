CREATE TABLE dias {
	id_dia serial,
	nome varchar(13),
	PRIMARY KEY(id_horario)
}


CREATE TABLE horarios {
	id_horario serial,
	nome varchar(2),
	inicio time,
	final time,
	PRIMARY KEY(id_horario)
}


CREATE TABLE restricoes {
	id_restricao serial,
	id_professor int,
	id_dia_aula int,
	id_horario_aula int,
	PRIMARY KEY(id_horario),
	FOREIGN KEY mdl_user(id) REFERENCES restricoes (id_professor),
	FOREIGN KEY dias(id_dia) REFERENCES restricoes (id_dia_aula),
	FOREIGN KEY horarios(id_horario) REFERENCES restricoes (id_horario_aula)
}
