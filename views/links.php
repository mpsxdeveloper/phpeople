<li class="nav-item">
    <a class="nav-link <?=$pagina=='home'?'active':''?>" aria-current="page" type="button" onclick="window.location.href = '<?= BASE ?>'">
        <i class="bi bi-house-fill"></i> Home
    </a>
</li>
<li class="nav-item">
    <a class="nav-link <?=$pagina=='novo'?'active':''?>" href="<?= BASE ?>contato/new">
        <i class="bi bi-person-plus-fill"></i> Adicionar
    </a>
</li>
<li class="nav-item">
    <a class="nav-link <?=$pagina=='edit'?'active':''?>" href="#">
        <i class="bi bi-pencil"></i> Edição
    </a>
</li>
<li class="nav-item">
    <a class="nav-link <?=$pagina=='show'?'active':''?>" href="#">
        <i class="bi bi-eye"></i> Visualização
    </a>
</li>