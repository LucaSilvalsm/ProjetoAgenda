<?php
include_once("template/header.php");
?>
<body>
   <div class="container">
    <?php if(isset($printMsg) && $printMsg != ''): ?>
        <p id="msg" ><?= $printMsg ?> </p>
    <?php endif;?>   
    <h1 id="main-title">Minha Agenda</h1>
    <?php if(count($contatos )> 0): ?>
        <table class="table" id="contato-table">
            <thead>
                <tr>
                    <th scope="col" >#</th>
                    <th scope="col" >Nome</th>
                    <th scope="col" >Telefone</th>
                    <th scope="col" ></th>


                </tr>
            </thead>
            <tbody>
                <?php foreach($contatos as $contatos): ?>
                    <tr>
                        <td scope="row" class="col-id" ><?=$contatos["id"] ?></td>
                        <td scope="row" ><?=$contatos["nome"] ?></td>
                        <td scope="row" ><?=$contatos["telefone"] ?></td>
                        <td class="actions" >
                            <a href="<?= $BASE_URL ?>show.php?id=<?=$contatos["id"] ?>"><i class="fas fa-eye check-icon"></i></a>
                            <a href="<?= $BASE_URL ?>edit.php?id=<?=$contatos["id"] ?>""><i class="far fa-edit edit-icon"></i></a>
                           
                            <form class="delete-form" action="<?= $BASE_URL ?>/config/processo.php" method="POST">
                                 <input type="hidden" name="type" value="delete">
                                 <input type="hidden" name="id" value="<?=$contatos["id"] ?>">
                                 <button type="submit" class="delete-btn" ><i class="fas fa-times delete-icon"></i></button>

                            </form>
                        </td>


                    </tr>

                <?php endforeach; ?>  
            </tbody>
        </table>
    <?php else: ?>
        <p id="empy-list-text">Ainda não ha contatos na sua agenda,<a href="<?= $BASE_URL ?>create.php">Clique aqui para adicionar um contato</a></p>
    <?php endif;?>     
   </div>
</body>
</html>
<?php
 include_once("template/footer.php");
?>