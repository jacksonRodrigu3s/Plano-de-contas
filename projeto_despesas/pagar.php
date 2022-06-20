<?php
    include_once("templates/header.php");
?>
    <div class="container">
        <?php  include_once("templates/backbtn.html"); ?>
        <h1 class="main-title">Despesas</h1>
        <form action="<?= $BASE_URL ?>config/process.php" id="pagar-form" method="POST">
            <input type="hidden" name="type" value="pagar">
            <div class="form-group">
                <label for="dftdesc">Descrição:</label>
                <input type="text" class="form-control" id="dftdesc" name="descricao" placeholder="Digite a descrição" required>
            </div>
            <div class="form-group">
                <label for="dffvalr">Valor:</label>
                <input type="number" class="form-control" id="dffvalr" name="valor" placeholder="Digite o valor" required>
            </div>
            <div class="form-group">
                <label for="dfddata">Data:</label>
                <input type="date" class="form-control" id="dfddata" name="data" placeholder="Digite a data" required>
            </div>
            <button id="button-geral" type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
<?php
    include_once("templates/footer.php");
?>