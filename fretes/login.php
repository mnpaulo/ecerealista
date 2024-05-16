<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mabol Cereais - Fretes Login</title>
        <link rel="icon" type="image/x-icon" href="/img/favicon.ico">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
        <!-- Bootstrap Icons CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <style>
            html,
            body {
                height: 100%;
            }

            .form-signin {
                max-width: 330px;
                padding: 1rem;
            }

            .form-signin .form-floating:focus-within {
                z-index: 2;
            }

            .form-signin input[type="password"] {
                margin-bottom: 10px;
            }
        </style>
    </head>
    <body class="d-flex align-items-center py-4 bg-body-tertiary">        
        <main class="form-signin w-100 m-auto">

            <form method="POST" action="login2.php">
                <div class="form-floating">
                    <input type="password" class="form-control" id="Senha" name="Senha" placeholder="Senha" required>
                    <label for="Senha">Senha</label>
                </div>
                <button class="btn btn-primary w-100 py-2" type="submit">Entrar</button>
            </form>

        </main>
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- jQuery JS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
        <script>
            $(document).ready(function () {

            });
        </script>
    </body>
</html> 