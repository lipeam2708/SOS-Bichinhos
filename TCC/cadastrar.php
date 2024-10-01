<?php
include("conexao.php");
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $mysqli->real_escape_string($_POST['email']);
    $senha = $mysqli->real_escape_string($_POST['senha']);
    
    // Hash da senha
    $senhaHash = password_hash($senha, PASSWORD_BCRYPT);

    // Inserir dados na tabela
    $sql = "INSERT INTO cliente (email, senha) VALUES ( '$email', '$senha')";

    if ($mysqli->query($sql) === TRUE) {
        header("Location: clientes.php");
    } else {
        echo "Erro: " . $sql . "<br>" . $mysqli->error;
    }

    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="./assets/img/pata.png">
    <title>SOS Bichinhos</title>
</head>

<body>
    
    <header class="header">
        <a href="#" class="logo">
            <ion-ion name="cafe"></ion-ion>SOS Bichinhos    <img src="./assets/img/pata (3).png"  width="25px"
    height= "25px"></a>
    <nav class="nav">
    <a href="./index.php">Início</a>
        <a href="./resgastes.html">Resgates</a>
            <a href="./parceiras.html">Parceiras</a>
            <a href="./quem somos.html">Quem somos?</a>
            <a href="#home">Login</a>
        </nav>
    </header>

    <section class="home" id="home">
        <div class="content">
            <h2>SOS Bichinhos</h2>
            <div class="text">
            <p>Bem-vindo à SOS Bichinhos, a plataforma dedicada a resgatar e cuidar dos nossos amigos peludos em situação de rua. Nosso objetivo é proporcionar um lar seguro e amoroso para cada animalzinho que cruzar nosso caminho. Junte-se a nós nessa missão de transformar vidas e espalhar o amor pelos animais. Estamos aqui para fazer a diferença, um resgate de cada vez.</p>
        </div>
        </div>
        <!--Login-->
        <div class="wrapper-login">
            <h2>Cadastrar</h2>

            <form nome="vet" action="" class="form-login" id="formLogin" method="POST">
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="email" name="email"  class="requisito" required>
                    <label>Email</label>
                </div>

                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="senha" class="requisito" minlength="6" maxlength="8" required>
                    <label>Senha</label>
                    </div>
        
                    <button type="submit" name="entrar" value="Entrar" class="entrar-btn"  href="./cadastrar.php">Cadastrar</button>
                    </div>
            </form>
        </div>
    </section>

    <footer>
    <div id="inside-footer">
        <div class="left-footer">
            <img src="assets/img/logoSOS.png" alt="Logo MLE Finance">
            <p>Seu melhor amigo pode estar em um abrigo, esperando pela sua decisão de adotar.</p>
        </div>
        <div class="center-footer">
            <div class="center-title footer-title">Links</div>
            <div class="center-links">
                <a href="./index.php" behavior="smooth">Inicio</a>
                <a href="./resgastes.html" behavior="smooth">Resgates</a>
                <a href="./parceiras.html" behavior="smooth">Parceiras</a>
                <a href="./quem somos.html" behavior="smooth">Quem somos?</a>
                <a href="./faq.html" behavior="smooth">FAQ</a>
            </div>
        </div>
        <div class="right-footer">
            <div class="center-title footer-title">Fale Conosco</div>
            <div class="right-list">
                sos.bichinhos2024@gmail.com
            </div>
        </div>
    </div>
    <div class="autorized">© <span>2024</span> SOS Bichinhos. Todos os direitos reservados.</div>
</footer>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
<style>
    @import url(https://fonts.googleapis.com/css2?family=Poppins);

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

.header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    padding: 20px 100px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    z-index: 99;
}

.header .logo {
    font-size: 1.7em;
    color: #fff;
    text-decoration: none;
}
.nav a {
    position: relative;
    font-size: 1.1em;
    color:#fff;
    text-decoration: none;
    margin-left: 40px;
}
.nav a::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: -6px;
    width: 100%;
    height: 3px;
    background: #fff;
    border-radius: 5px;
    transform: scaleX(0);
    transition: .5s;
}

.nav a:hover::after {
    transform: scaleX(1);
}

.home {
    position: relative;
    width: 100%;
    height: 100vh;
    background: linear-gradient(to bottom,#272729, #545457);
    background-size: cover;
    background-position: center;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 80px 100px 0;
}

.home .content {
    max-width: 440px;
    color: #fff;
}

.content h2 {
    font-size: 3em;
    letter-spacing: .03em;
}

.content p {
    margin: 10px 0 40px;
    

}
.text{
    height: 300px;
}
.content a {
    color: #fff;
    text-decoration: none;
    border: 2px solid #fff;
    font-weight: 500;
    padding: 10px 40px;
    border-radius: 40px;
    transition: .5s;
}

.content a:hover{
    background: #331e11;
}


.home .wrapper-login {
    position: relative;
    width: 440px;
}

.wrapper-login h2 {
    font-size: 2em;
    color: #fff;
    text-align: center;
}

.wrapper-login .input-box {
    position: relative;
    width: 100%;
    height: 50px;
    margin: 40px 0;
}

.input-box input {
    width: 100%;
    height: 100%;
    background: transparent;
    border: 1px solid #ffff;
    outline: none;
    border-radius: 40px;
    font-size: 1em;
    color: #fff;
    padding: 0 25px 0 45px;
}

.input-box label {
    position: absolute;
    top: 50%;
    left: 45px;
    transform: translateY(-50%);
    font-size: 1em;
    color: #fff;
    pointer-events: none;
    transition: .5s;
}

.input-box input:focus~label,
.input-box input:valid~label{
    font-size: .8em;
    top: -14px;
    left: 17px;
}

.input-box .icon{
    position: absolute;
    top: 14px;
    left: 15px;
    font-size: 1.2em;
    color: #ffff;
}


.wrapper-login .entrar-btn {
    width: 100%;
    height: 50px;
    border: none;
    outline: none;
    border-radius: 40px;
    background:#000;
    box-shadow: 0 8px 10px rgba(255,255,255, .1 );
    cursor: pointer;
    font-size: 1em;
    color: #fff;
    font-weight: 500;
}

.wrapper-login .register-link {
    font-size: .9em;
    color: #fff;
    text-align: center;
    margin: 30px 0;
}

.register-link p a {
    color: #fff;
    text-decoration: none;
    font-weight: 600;
}

.register-link p a:hover {
    text-decoration: underline;
}
footer {
    color:#fff;
    width: 100%;
    background-color: #272729;
    border-top: 1px solid rgba(0, 0, 0, 0.331);
}
 
#inside-footer {
    width: 100%;
    max-width: 1300px;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    padding: 50px;
    margin: auto;
}
 
.left-footer > img {
    display: block;
    width: 150px;
    margin: 0 auto 10px;
    border-radius: 10px;
}
 
.left-footer > p {
    opacity: .8;
    text-align: center;
}
 
.footer-title {
    text-align: center;
    font-size: 1.1rem;
    color: var(--first-color);
    margin-bottom: 20px;
}
 
.center-links > a {
    display: block;
    text-decoration: none;
    color: #fff;
    opacity: .8;
    text-align: center;
    transition: .3s;
}
 
.center-links > a:hover {
    color: #000;
}
 
.right-list {
    display: block;
    opacity: .8;
    text-align: center;
}
 
.autorized {
    text-align: center;
    opacity: .8;
    padding: 30px;
    border-top: 1px solid rgba(0, 0, 0, 0.100);
}
 
.autorized > span {
    font-size: 1.1rem;
    opacity: 1;
    color: var(--second-color);
    font-weight: 500;
}
</style>
</html>