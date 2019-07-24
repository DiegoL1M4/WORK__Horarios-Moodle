ALTER TABLE mdl_user ADD privilege integer;
UPDATE mdl_user SET privilege = 0;

UPDATE mdl_user SET privilege = 1 WHERE username = 'guest';
