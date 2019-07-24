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
 # Instalação
 
 1. Colar a pasta `moodle` dentro do programa do Moodle
 2. Instalar o `docs/bd.sql` no banco de dados do Moodle
 3. Colocar os demais arquivos do sistema `Horarios-Moodle` dentro de um servidor
 4. Configurar as credenciais do sistema para acessar o banco de dados do Moodle
