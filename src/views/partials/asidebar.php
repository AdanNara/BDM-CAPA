


<aside class="sidevar">
<div class="parteSuperior">
    <div class="inicio">
        <i class='bx bxs-home' ></i>
        <a href="/home"> INICIO</a>
    </div>
    <div class="descubrir">
        <i class='bx bxs-compass'></i>
        <a  href="/descubrir"> DESCUBRIR</a>
    </div>

    <div class="nuevaPublicacion">
        <i class='bx bx-plus-circle' ></i>
        <a  href="/publicar"> Publicar</a>
    </div>
    <div class="Chat">
        <i class='bx bx-conversation' ></i>
        <a  href="/chat"> Chat</a>
    </div>

    <?php if($usuarioLoggeado['tipoUsuario'] ==1): ?>
    <div class="reporte">
        <i class='bx bxs-report' ></i>
        <a  href="/consultar"> Consultar</a>
    </div>
    <div class="buzon">
        <i class='bx bx-envelope'></i>
        <a  href="/buzon"> Buzón</a>
    </div>
    <?php endif; ?>

</div>
<div class="parteInferior">
    <div class="miPerfil">
        <img src="src/controllers/mostrarImagen.php?id=<?= $usuarioLoggeado['username']?>" 
        alt="Avatar" class="user-avatar"
        onerror="this.onerror=null; this.src='resources/avatar.jpg';">
        <a href="/perfil"> <?= htmlspecialchars($usuarioLoggeado['nombre']) ?> 
            <?php if($usuarioLoggeado['tipoUsuario'] ==1){ ?>
                <i class='bx bxs-wrench'></i>
            <?php } ?>


        </a>
    </div>
    <div class="logOut"> 
        <a href="src/controllers/logout.php"><i class='bx bx-log-out icon-logOut'></i> Cerrar sesion</a>
    </div>
    
</div>
</aside>