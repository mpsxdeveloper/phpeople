<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?=TITLE?> - Home</title>        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    </head>
    
    <body onload="document.getElementById('pesquisa').focus();">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark bg-success fw-bold text-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="<?= BASE ?>"><i class="bi bi-filetype-php" style="font-size: 2rem;"><?= TITLE ?></i></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <?php include_once("links.php"); ?>
                        </ul>
                        <form class="d-flex" action="<?= BASE ?>contato\search" method="post">
                            <input class="form-control me-2" id="pesquisa" name="pesquisa" 
                                   type="text" placeholder="Pesquisar por nome" aria-label="Search" 
                                   required onblur="this.value=this.value.trim();" />
                            <button class="btn btn-light" type="submit">
                                <i class="bi bi-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </nav>            
            <div class="row mt-2 mb-0" overflow-y: auto;">
                <div class="container" style="min-height: 450px;">                    
                    <table class="table table-sm table-success table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">NOME</th>
                                    <th scope="col">TELEFONE</th>
                                    <th scope="col">E-MAIL</th>
                                    <th scope="col" colspan="3" style="width: 10%;">AÇÕES</th>
                                </tr>
                            </thead>
                            <?php if(isset($contatos) && $contatos != null): ?>
                            <?php foreach ($contatos as $contato): ?>
                                <tr>
                                    <td><?= $contato->getId() ?></td>
                                    <td><?= $contato->getNome() ?></td>
                                    <td><?= $contato->getTelefone() ?></td>
                                    <td><?= $contato->getEmail() ?></td>
                                    <td><a href="<?= BASE ?>contato/show/<?= $contato->getId() ?>" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye-fill"></i></a></td>
                                    <td><a href="<?= BASE ?>contato/edit/<?= $contato->getId() ?>" type="button" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a></td>
                                    <td><a type="button" class="btn btn-danger btn-sm"
                                           onclick="showModal(<?= $contato->getId() ?>);"><i class="bi bi-trash3-fill"></i></a></td>
                                </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </table>
                        <div class="row">
                            <div class="col-12">
                                <?php if(!isset($contatos)): ?>
                                    <div class="alert alert-primary" role="alert">
                                        <i class="bi bi-info-circle-fill"></i> Pesquise um nome ou faça um novo registro clicando no menu Adicionar
                                    </div>
                                <?php elseif($contatos != null && count($contatos) === 1): ?>
                                    <div class="alert alert-primary" role="alert">
                                        <i class="bi bi-info-circle-fill"></i> <?= count($contatos)?> registro encontrado
                                    </div>
                                <?php elseif($contatos != null && count($contatos) > 1): ?>
                                    <div class="alert alert-primary" role="alert">
                                        <i class="bi bi-info-circle-fill"></i> <?= count($contatos)?> registros encontrados
                                    </div>
                                <?php else: ?>
                                    <div class="alert alert-danger" role="alert">
                                        <i class="bi bi-info-circle-fill"></i> A pesquisa não retornou resultados
                                    </div>
                                <?php endif; ?>
                            </div>                             
                        </div>
                </div>
            </div>
            
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                <i class="bi bi-exclamation-circle-fill"></i> Aviso
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Confirma deletar contato?<br />
                            Essa ação não poderá ser desfeita.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-bs-dismiss="modal"><i class="bi bi-x"></i> Cancelar</button>
                            <button type="button" class="btn btn-danger" onclick="deletar();"><i class="bi bi-trash3-fill"></i> Deletar</button>
                        </div>
                    </div>
                </div>
                <input type="hidden" id="idcontato" />
            </div>
            
            <script>
                function showModal(id) {
                    document.getElementById('idcontato').value = id;
                    var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
                    myModal.show();                    
                }
                function deletar() {
                    var id = document.getElementById('idcontato').value;
                    window.location.href = "http://localhost/phpeople/contato/delete/"+id;
                }
            </script>
            
        </div>
        
    </body>
    
</html>