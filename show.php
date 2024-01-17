<?php
include_once("template/header.php");
?>
 <div class="container" id="view-contact-container">
    <?php include_once("template/backbtn.php");?>
    <h1 id="main-title"><?=$contatos["nome"] ?></h1>
    <p class="bold">Telefone: </p>
    <p><?=$contatos["telefone"] ?></p>
    <p class="bold">Observação: </p>
    <p><?=$contatos["observacao"] ?></p>
 </div>
<?php
 include_once("template/footer.php");
?>