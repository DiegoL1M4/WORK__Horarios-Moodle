
## Banco de dados
```
CREATE TABLE mdl_auth_rest_dia (
	id_dia integer,
	nome varchar(7),
	PRIMARY KEY(id_dia)
);
INSERT INTO mdl_auth_rest_dia (id_dia,nome) VALUES 
(0,'Domingo'),
(1,'Segunda'),
(2,'Terça'),
(3,'Quarta'),
(4,'Quinta'),
(5,'Sexta'),
(6,'Sábado');
```
```
CREATE TABLE mdl_auth_rest_horario (
	id_horario serial,
	nome varchar(6),
	inicio time,
	final time,
	PRIMARY KEY(id_horario)
);
INSERT INTO mdl_auth_rest_horario (nome,inicio,final) VALUES 
('AB - M', '07:40:00', '09:40:00'),
('CD - M', '10:00:00', '12:00:00'),
('AB - T', '13:30:00', '15:30:00'),
('CD - T', '15:50:00', '17:50:00'),
('AB - N', '18:00:00', '20:00:00'),
('CD - N', '20:00:00', '22:00:00');
```
```
CREATE TABLE mdl_auth_rest (
	id_restricao serial,
	id_user int,
	id_dia int,
	id_horario int,
	PRIMARY KEY(id_restricao),
	FOREIGN KEY (id_user) REFERENCES mdl_user(id),
	FOREIGN KEY (id_dia) REFERENCES mdl_auth_rest_dia(id_dia),
	FOREIGN KEY (id_horario) REFERENCES mdl_auth_rest_horario(id_horario) 
);
```

## Algumas querys:

```
SELECT extract(DOW FROM CURRENT_TIMESTAMP) + 1;
```

```
SELECT id_horario FROM mdl_auth_rest_horario WHERE inicio < CURRENT_TIME AND CURRENT_TIME < final;
```

```
SELECT * FROM mdl_auth_rest WHERE id_user = 1 AND id_dia = 1 AND id_horario = 1;
```

```
DELETE FROM mdl_auth_rest WHERE id_user = 1;
```

```
INSERT INTO mdl_auth_rest (id_user, id_dia, id_horario) VALUES ($id, $unid, $deci);
```
