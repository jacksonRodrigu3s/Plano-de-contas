<?php
    include_once("templates/header.php");
?>
<div class="container">
    <?php  include_once("templates/backbtn.html"); ?>
    <h1 id="main-title">Editar Despesas</h1>
            <form id="creat-form" action="<?= $BASE_URL ?>config/process.php" method="POST">
                <input type="hidden" name="type" value="editDespesa">
                <input type="hidden" name="dficodg" value="<?= $despesa["dficodg"]?>">
                <div class="form-group">
                    <label for="retdesc">Descrição:</label>
                    <input type="text" class="form-control" id="dftdesc" name="dftdesc" placeholder="Digite a descrição" value="<?= $despesa["dftdesc"]?>" required>
                </div>
                <div class="form-group">
                    <label for="dffvalr">Valor:</label>
                    <input type="number" class="form-control" id="dffvalr" name="dffvalr" placeholder="Digite o Valor" value="<?= $despesa["dffvalr"]?>" required>
                </div>
                <div class="form-group">
                    <label for="dfddata">Data:</label>
                    <input type="date" class="form-control" id="dfddata" name="dfddata"  placeholder="Digite a Data" value="<?= $despesa["dfddata"]?>" required>
                </div>
                <button id="button-geral" type="submit" class="btn btn-primary">Editar Despesa</button>
            </form>
    </div>
<?php
    include_once("templates/footer.php");
?>