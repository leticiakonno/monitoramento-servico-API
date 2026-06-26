<?php
$hostname = "localhost";
$database = "seu_banco_de_dados";
$username = "seu_usuario";
$password = "sua_senha";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $conexao = mysqli_connect($hostname, $username, $password, $database);
    mysqli_set_charset($conexao, "utf8");
} catch (mysqli_sql_exception $e) {
    
    // 1. REGISTRO LOCAL DE LOGS
    $log_msg = "[" . date('d/m/Y H:i:s') . "] ERRO: " . $e->getMessage() . PHP_EOL;
    file_put_contents(__DIR__ . '/log_erros.txt', $log_msg, FILE_APPEND);

    // 2. TELEMETRIA E PAYLOAD
    $data_hora = date('d/m/Y H:i:s');
    $url_site = strip_tags($_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    $erro_msg = htmlspecialchars($e->getMessage());

    $msg = "🚨 [TITULO_DO_ALERTA] 🚨\n\n" .
           "📅 Data/Hora: " . $data_hora . "\n" .
           "🌐 Página: " . $url_site . "\n" .
           "⚠️ Erro: " . $erro_msg;

    // 3. INTEGRAÇÃO COM API DO TELEGRAM
    $token = "SEU_TOKEN_TELEGRAM"; 
    $chat_id = "SEU_CHAT_ID_TELEGRAM";
    $url = "https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&text=" . urlencode($msg);
    
    @file_get_contents($url);
    
    // 4. MASCARAMENTO DE ERRO (WEB SECURITY)
    die("O site está em manutenção. Tente novamente em instantes.");
}
?>