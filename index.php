<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba de Conexión Azure (MySQL)</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #333;
        }
        .container {
            text-align: center;
            background: #fff;
            padding: 2rem 3rem;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            max-width: 600px;
        }
        h1 {
            color: #0078d4; /* Color de Azure */
            border-bottom: 2px solid #f0f2f5;
            padding-bottom: 10px;
        }
        .status-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 1.5rem;
            margin-top: 1.5rem;
            text-align: left;
        }
        .status-card h2 {
            margin-top: 0;
        }
        .success {
            color: #107c10;
            font-weight: bold;
            font-size: 1.1rem;
        }
        .error {
            color: #d83b01;
            font-weight: bold;
            font-size: 1.1rem;
        }
        code {
            background: #eee;
            padding: 2px 5px;
            border-radius: 4px;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Prueba de Conexión (Ejercicio 3)</h1>
        <p>Esta página (App Service) está intentando conectarse a la base de datos privada MySQL.</p>

        <div class="status-card">
            <h2>Base de Datos: MySQL. </h2>
            <?php
            
            $host_mysql = getenv('DB_HOST_MYSQL');
            $user_mysql = getenv('DB_USER_MYSQL');
            $pass_mysql = getenv('DB_PASS_MYSQL');
            $db_mysql = "database-mysql"; // 

            // conexión a MySQL 
            $conn_mysql = mysqli_init();
            mysqli_ssl_set($conn_mysql, NULL, NULL, NULL, NULL, NULL);
            mysqli_real_connect($conn_mysql, $host_mysql, $user_mysql, $pass_mysql, $db_mysql, 3306, NULL, MYSQLI_CLIENT_SSL);

            if ($conn_mysql->connect_error) {
                echo "<p class='error'>❌ ERROR (MySQL): No se pudo conectar.</p>";
                echo "<p>Detalle: " . htmlspecialchars($conn_mysql->connect_error) . "</p>";
            } else {
                echo "<p class='success'>✅ ÉXITO (MySQL): Conexión establecida.</p>";
                echo "<p>Conectado a <code>" . htmlspecialchars($host_mysql) . "</code> como <code>" . htmlspecialchars($user_mysql) . "</code>.</p>";
                $conn_mysql->close();
            }
            ?>
        </div>
    </div>
</body>

</html>
