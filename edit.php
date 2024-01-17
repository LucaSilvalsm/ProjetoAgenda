<?php
include_once("template/header.php");
?>
<body>
    <div id="container">
    <?php include_once("template/backbtn.php");?>
        <h1 id="main-title">Editar Contato</h1>
        <form id="create-form" action="<?= $BASE_URL ?>config/processo.php" method="POST">
            <input type="hidden" name="type" value="edit">
            <input type="hidden" name="id" value="<?=$contatos["id"] ?>">
            <div class="form-group">
                <label for="name">Nome do Contato: </label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome e Sobrenome" value="<?=$contatos["nome"] ?>" require>
            </div>
            <div class="form-group">
                <label for="telefone">Telefone de  Contato: </label>
                <input type="text" class="form-control" id="telefone" name="telefone" placeholder="(21) 99999-8888" <?=$contatos["telefone"] ?> require>
            </div>
            <div class="form-group">
                <label for="observacao">Observação: </label>
                <textarea type="text" class="form-control" id="observacao" name="observacao" placeholder="Insira as observações" require rows="3"><?=$contatos["observacao"] ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
    
</body>
</html>
<?php
 include_once("template/footer.php");
?>