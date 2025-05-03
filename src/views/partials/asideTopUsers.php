<?php
    $listaTopUsuarios = require 'src/controllers/rankingUsuarios.php';
    $numTop = 0;
?>

<aside class="sidevarTopUsers">
    <div class="topUsersContainer"> 
        <H2>RANKING DE USUARIOS</H2>
        <?php foreach($listaTopUsuarios as $usuario) { ?>
            <div class="rankigUsuario">
                <p class="Posicion"> Posicion #<?=  $numTop = $numTop +1 ?></p>
                <p>
                    <?php 
                        switch($numTop){
                            case 1:
                                ?>
                                <i class='bx bxs-trophy oro-trophy' ></i> 
                            <?php break;
                            case 2:
                                ?>
                                <i class='bx bxs-trophy plata-trophy' ></i>
                            <?php break;
                            case 3:
                                ?>
                                <i class='bx bxs-trophy bronce-trophy' ></i>
                            <?php break;
                            default:
                                ?>
                                <i class='bx bxs-trophy' ></i>
                            <?php break;
                        }
                    ?>
                    <?= $usuario['Usuario'] ?>
                </p>
                
            </div>

            
        <?php } ?>
    </div>
</aside>