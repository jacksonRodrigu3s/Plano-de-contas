<?php
    include_once("templates/header.php");
?>
    <div class="container">
        <?php  include_once("templates/backbtn.html"); ?>
        <h1 id="main-title">Editar Receitas</h1>
        <form id="creat-form" action="<?= $BASE_URL ?>config/process.php" method="POST">
            <input type="hidden" name="type" value="editReceita">
            <input type="hidden" name="reicodg" value="<?= $receita["reicodg"]?>">
            <div class="form-group">
                <label for="retdesc">Descrição:</label>
                <input type="text" class="form-control" id="retdesc" name="retdesc" placeholder="Digite a descrição" value="<?= $receita["retdesc"]?>" required>
            </div>
            <div class="form-group">
                <label for="refsalr">Valor:</label>
                <input type="number" class="form-control" id="refsalr" name="refsala" placeholder="Digite o Valor" value="<?= $receita["refsala"]?>" required>
            </div>
            <div class="form-group">
                <label for="refadci">Adicionais:</label>
                <input type="number" class="form-control" id="refadci" name="refadci"  placeholder="Digite os adicionais" value="<?= $receita["refadci"]?>">
            </div>
            <div class="form-group">
                <label for="reddata">Data:</label>
                <input type="date" class="form-control" id="reddata" name="reddata"  placeholder="Digite as Data" value="<?= $receita["reddata"]?>" required>
            </div>
            <button id="button-geral" type="submit" class="btn btn-primary">Editar Receita</button>
        </form>
    </div>
<?php
    include_once("templates/footer.php");
?>