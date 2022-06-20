<?php
    include_once("templates/header.php");
?>
    <div class="container">
        <?php  include_once("templates/backbtn.html"); ?>
        <h1 class="main-title">Receitas</h1>
        <form action="<?= $BASE_URL ?>config/process.php" id="receber-form" method="POST">
            <input type="hidden" name="type" value="receber">
            <div class="form-group">
                <label for="retdesc">Descrição:</label>
                <input type="text" class="form-control" id="retdesc" name="descricao" placeholder="Digite a descrição" required>
            </div>
            <div class="form-group">
                <label for="refsalr">Valor:</label>
                <input type="number" class="form-control" id="refsalr" name="salario" placeholder="Digite o Valor" required>
            </div>
            <div class="form-group">
                <label for="refadci">Adicionais:</label>
                <input type="number" class="form-control" id="refadci" name="adicionais" placeholder="Digite os adicionais">
            </div>
            <div class="form-group">
                <label for="reddata">Data:</label>
                <input type="date" class="form-control" id="refadci" name="data" placeholder="Digite as Data" required>
            </div>
            <button id="button-geral" type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
<?php
    include_once("templates/footer.php");
?>