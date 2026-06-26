<?php
session_start();

// Configuração de Credenciais (Controle de Acesso)
$usuario_correto = "seu_usuario"; 
$senha_correta = "sua_senha_secreta"; 

// Validação do Formulário
if (isset($_POST['login'])) {
    if ($_POST['user'] == $usuario_correto && $_POST['pass'] == $senha_correta) {
        $_SESSION['logado'] = true;
    } else {
        $erro = "Usuário ou senha incorretos!";
    }
}

// Bloqueio de Segurança
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
?>
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Login - Restrito</title>
        <style>
            body { font-family: Arial, sans-serif; background: #f4f4f9; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
            .login-card { background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); width: 300px; text-align: center; }
            input { width: 100%; padding: 10px; margin: 10px 0; box-sizing: border-box; border: 1px solid #ddd; border-radius: 4px; }
            button { width: 100%; padding: 10px; background: #2c3e50; color: #fff; border: none; border-radius: 4px; cursor: pointer; }
        </style>
    </head>
    <body>
        <div class="login-card">
            <h2>Dashboard - Login</h2>
            <?php if(isset($erro)) echo "<p style='color:red; font-size:14px;'>$erro</p>"; ?>
            <form method="post">
                <input type="text" name="user" placeholder="Usuário" required>
                <input type="password" name="pass" placeholder="Senha" required>
                <button type="submit" name="login">Entrar</button>
            </form>
        </div>
    </body>
    </html>
<?php 
    exit; 
}

// Fluxo de Logout
if(isset($_GET['logout'])) { 
    session_destroy(); 
    header("Location: dashboard.php"); 
    exit; 
}
?>

<!-- ÁREA PROTEGIDA DO PAINEL -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel de Erros</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; background: #f4f4f9; }
        table { width: 100%; border-collapse: collapse; background: #fff; margin-top: 20px; }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: left; }
        th { background: #2c3e50; color: #fff; }
        tr:nth-child(even) { background: #f2f2f2; }
    </style>
</head>
<body>
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h1>Logs de Erros do Sistema</h1>
        <a href="?logout=true" style="padding: 8px 15px; background: #c0392b; color: #fff; text-decoration: none; border-radius: 4px;">Sair</a>
    </div>
    
    <table>
        <tr><th>Data/Hora e Detalhes do Erro</th></tr>
        <?php
        $arquivo_log = 'Connections/log_erros.txt';
        if (file_exists($arquivo_log)) {
            $logs = file($arquivo_log);
            foreach (array_reverse($logs) as $linha) {
                echo "<tr><td>" . htmlspecialchars($linha) . "</td></tr>";
            }
        } else {
            echo "<tr><td>Nenhum erro registrado. O sistema está saudável!</td></tr>";
        }
        ?>
    </table>
</body>
</html>
