<?php
include("conexao.php");

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$search = isset($_GET['search']) ? $_GET['search'] : '';
$sql = "SELECT * FROM animais";
if ($search) {
    $sql .= " WHERE nome LIKE '%$search%'";
}
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="./assets/img/pata.png">
    <title>SOS Bichinhos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header class="header">
        <a href="#" class="logo">
            <ion-icon ></ion-icon>SOS Bichinhos<img src="./assets/img/pata (3).png" width="25px" height="25px">
        </a>
        <nav class="nav">
            <a href="./ong.php">Início</a>
            <a href="./resgasteso.html">Resgates</a>
            <a href="./parceiraso.html">Parceiras</a>
            <a href="./quem somoso.html">Quem somos?</a>
            <a href="./index.php">Sair</a>
        </nav>
    </header>
    <section class="homi">
        <div class="content">
        </div>
    </section>
    <section class="home">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cor</th>
                    <th>Sexo</th>
                    <th>Porte</th>
                    <th>Endereço</th>
                    <th>Foto</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['cor']}</td>";
                        echo "<td>{$row['sexo']}</td>";
                        echo "<td>{$row['porte']}</td>";
                        echo "<td>{$row['endereco']}</td>";

                        // Exibe a imagem
                        echo "<td><img src='data:image/png;base64," . base64_encode($row['imagem']) . "' width='50'></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Nenhum registro encontrado</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </section>

    <footer>
        <div id="inside-footer">
            <div class="left-footer">
                <img src="assets/img/logoSOS.png" alt="Logo SOS Bichinhos">
                <p>Seu melhor amigo pode estar em um abrigo, esperando pela sua decisão de adotar.</p>
            </div>
            <div class="center-footer">
                <div class="center-title footer-title">Links</div>
                <div class="center-links">
                    <a href="./index.php">Inicio</a>
                    <a href="./resgastes.html">Resgates</a>
                    <a href="./parceiras.html">Parceiras</a>
                    <a href="./quem somos.html">Quem somos?</a>
                    <a href="./faq.html">FAQ</a>
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
    /* Seu CSS vai aqui */
</style>
</html>

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
.homi {
    position: relative;
    width: 100%;
    height: 100vh;
    background: url('./assets/img/dog1.png')  no-repeat;
    background-size: cover;
    background-position: center;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 80px 100px 0;
}

.homi .content {
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


.home {
    position: relative;
    width: 100%;
    height: 110vh;
    background: linear-gradient(to bottom,#272729, #545457);
    background-size: cover;
    background-position: center;
    padding: 80px 100px 0;
    display: flex;
    justify-content: center;
    align-items: center;
}

table {
    width: 100%;
    border-collapse: collapse;
    background-color: #fff;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

th, td {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #272729;
    color: #000;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
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