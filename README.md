# Restrição de Horários no Moodle
Modificação na autenticação do sistema Moodle. A seguir temos o codigo que foi adicionado no arquivo do moodle:

```
// Ajuste de Autenticação no Moodle
try {
//$idUser = $DB->get_record_select('user', 'username = $username', null, '*', MUST_EXIST);
$constraints = 'num = 0';
    $DB->get_record_select('a', $constraints, null, '*', MUST_EXIST);
} catch (dml_exception $exception) {
    return false;
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
 1. Colar a pasta `moodle` dentro do programa do Moodle
 2. Atualizar a tabela `mdl_user` para adicionar um campo que defina se um usuário é professor
 3. Instalar o `docs/bd.sql` no banco de dados do Moodle
 4. Colocar os demais arquivos do sistema `Horarios-Moodle` dentro de um servidor
 5. Configurar as credenciais do sistema para acessar o banco de dados do Moodle no `models/bd.class.php`
