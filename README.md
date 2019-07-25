# Restrição de Horários no Moodle
Restrição de horários que não permitem o acesso à plataforma Moodle durante os horários definidos. A seguir temos o codigo que foi adicionado no arquivo do moodle:
```
(linha 4323) moodle/lib/moodlelib.php
```
```
// Ajuste de Autenticação no Moodle
// Entrada somente nos horários que não estão restringidos
try {
    $constraints = "id_user = (SELECT id FROM mdl_user WHERE username = '$username') AND id_dia = extract(DOW FROM CURRENT_TIMESTAMP) AND id_horario = (SELECT id_horario FROM mdl_auth_rest_horario WHERE inicio < CURRENT_TIME AND CURRENT_TIME < final)";
    $DB->get_record_select('auth_rest', $constraints, null, '*', MUST_EXIST);
    return false;
} catch (dml_exception $exception) {

}
```

# Requisitos
* Apache 2
* PHP 7.3
* Postgres 9.5
* Moodle 3.6.5

 # Instalação
 1. Colar a pasta `moodle` dentro da pasta do sistema Moodle;
 2. Atualizar a tabela `mdl_user` com o arquivo `docs/updateUserMoodle.sql` para adicionar uma nova coluna que defina o privilégio dos usuários;
 3. Modificar os registros na tabela `mdl_user` dos usuários que serão restringidos pelo sistema com `privilege = 1`;
 4. Instalar o `docs/bd.sql` no banco de dados do Moodle, verificando se o Moodle terá acesso as novas tabelas (verificação de privilégios);
 5. Colocar os arquivos do sistema `Horarios-Moodle` dentro de um servidor;
 6. Configurar as credenciais de acesso ao banco de dados do sistema dentro de `models/bd.class.php` para acessar o banco de dados do Moodle;
 7. Registrar os usuários do Moodle que terão acesso ao sistema `Horarios-Moodle` com `privilege = 2`.

# Imagens da aplicação

### Tela de Login
![](https://github.com/DiegoL1M4/WORK__Horarios-Moodle/blob/master/docs/Imagens/login.png)

### Tela Inicial
![](https://github.com/DiegoL1M4/WORK__Horarios-Moodle/blob/master/docs/Imagens/home.png)

### Características da Tela Inicial
![](https://github.com/DiegoL1M4/WORK__Horarios-Moodle/blob/master/docs/Imagens/caracteristicas.png)

### Tela de Login do Moodle
![](https://github.com/DiegoL1M4/WORK__Horarios-Moodle/blob/master/docs/Imagens/moodle.png)
