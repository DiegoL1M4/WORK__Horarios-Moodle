# Restrição de Horários no Moodle
Modificação na autenticação do sistema Moodle. A seguir temos o codigo que foi adicionado no arquivo do moodle:

```
// Ajuste de Autenticação no Moodle
// Entrada somente nos horários que não estão restringidos
try {
    $constraints = 'id_user = 1 AND id_dia = extract(DOW FROM CURRENT_TIMESTAMP) AND id_horario = (SELECT id_horario FROM mdl_auth_rest_horario WHERE inicio < CURRENT_TIME AND CURRENT_TIME < final)';
    $DB->get_record_select('auth_rest', $constraints, null, '*', MUST_EXIST);
    return false;
} catch (dml_exception $exception) {

}
```
```
(linha 4344) moodle/lib/moodlelib.php
```

# Requisitos
* Apache 2
* PHP 7.3
* Postgres 9.5
* Moodle 3.6.5


 # Instalação
 1. Colar a pasta `moodle` dentro do programa do Moodle;
 2. Atualizar a tabela `mdl_user` para adicionar um campo que defina se um usuário é professor;
 3. Instalar o `docs/bd.sql` no banco de dados do Moodle, verificando se o Moodle terá acesso as novas tabelas (verificação de privilégios);
 4. Colocar os demais arquivos do sistema `Horarios-Moodle` dentro de um servidor;
 5. Configurar as credenciais do sistema para acessar o banco de dados do Moodle no `models/bd.class.php`.
