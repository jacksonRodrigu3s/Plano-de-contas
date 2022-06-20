<?php 
    include_once("templates/header.php");
?>
    <div class="container">
        <?php if(isset($_SESSION["msg"]) && $_SESSION["msg"] != ''): ?>
            <p id="msg"><?= $_SESSION["msg"]?></p>
        <?php endif; ?>
        <div class="container-saldos">
            <div class="main-box-receitas">
                <h1 class="main-title-index">Saldo Disponivel</h1>
                <h1 class="main-title-index">R$: <?= $saldoDisponivel;?> </h1>
            </div>
            <div class="main-box-despesas">
                <h1 class="main-title-index"> Saldo Despesas</h1>
                <h1 class="main-title-index">R$: <?= $saldoDespAux;?></h1>
            </div>
        </div>
         <h1 class="main-title">Lista de Receitas</h1>
         <?php if(count($receitas) > 0):?>
            <table class="table" id="contacts-table">
                <thead>
                    <tr>
                        <td scope="col">#</td>
                        <td scope="col">Descrição</td>
                        <td scope="col">Salario</td>
                        <td scope="col">Adicionais</td>
                        <td scope="col">Data</td>
                        <td scope="col"></td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($receitas as $receita):?>
                        <tr>
                            <td scopo="cow" class="col-id"><?= $receita["reicodg"]?></td>
                            <td scopo="cow"><?= $receita["retdesc"]?></td>
                            <td scopo="cow"><?= $receita["refsala"]?></td>
                            <td scopo="cow"><?= $receita["refadci"]?></td>
                            <td scopo="cow"><?= date('d/m/Y',  strtotime($receita["reddata"]))?></td>
                            <td class="actions">
                                <a href="<?= $BASE_URL?>editReceitas.php?id=<?= $receita["reicodg"]?>"><i class="fas fa-edit edit-icon"></i></a>
                                <form class="delete-form" action="<?= $BASE_URL?>config/process.php" method="POST">
                                    <input type="hidden" name="type" value="delete-receita">
                                    <input type="hidden" name="reicodg" value="<?= $receita["reicodg"]?>">
                                    <button type="submit" class="delete-btn"><i class="fas fa-times delete-icon"></i></button>
                                </form> 
                            </td>
                        </tr>
                    <?php endforeach; ?>     
                </tbody>
            </table>
        <?php else: ?>   
            <p id="empty-list-text">
               Ainda não existe Receitas cadastradas,  <a href="<?= $BASE_URL?>receber.php">Clique aqui para adicionar</a>
            </p>
        <?php endif; ?>     
    </div>
    <div class="container">
        <h1 class="main-title">Lista de Despesas</h1>
        <!-- Vendo se existe algum dado no banco -->
        <?php if(count($despesas) > 0): ?>
            <!-- definindo uma tabela -->
            <table class="table" id="contacts-table">
                <!-- definindo o corpo da tabela -->
                <thead>
                    <!-- linhas -->
                    <tr>
                        <td scope="col">#</td>
                        <td scope="col">Descrição</td>
                        <td scope="col">Valor</td>
                        <td scope="col">Data</td>
                        <td scope="col"></td>
                    </tr>
                    <!-- colunas -->
                </thead>
                <tbody>
                    <?php foreach($despesas as $despesa): ?>
                        <tr>
                            <td scope="cow" class="col-id"><?=$despesa["dficodg"]?></td>
                            <td scope="cow"><?=$despesa["dftdesc"]?></td>
                            <td scope="cow"><?=$despesa["dffvalr"]?></td>
                            <td scope="cow"><?=date('d/m/Y', strtotime($despesa["dfddata"]))?></td>
                            <td class="actions">
                                <a href="<?= $BASE_URL?>editDespesa.php?id=<?= $despesa["dficodg"]?>"><i class="fas fa-edit edit-icon"></i></a>
                                <form class="delete-form" action="<?= $BASE_URL?>config/process.php" method="POST">
                                    <input type="hidden" name="type" value="delete-despesa">
                                    <input type="hidden" name="dficodg" value="<?= $despesa["dficodg"]?>">
                                    <button type="submit" class="delete-btn"><i class="fas fa-times delete-icon"></i></button>
                                </form>  
                            </td>
                        </tr>
                    <?php endforeach; ?>    
                </tbody>
            </table>
        <?php else: ?>
            <p id="empty-list-text">
               Ainda não existe despesas cadastradas,  <a href="<?= $BASE_URL?>pagar.php">Clique aqui para adicionar</a>
            </p>
        <?php endif; ?>        
    </div>
<?php
    include_once("templates/footer.php");
?>