<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?=TITLE?> - Visualizar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />
    </head>

    <body>        

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
                    </div>
                </div>
            </nav>
            <form action="<?= BASE ?>contato/editar" method="post" class="mt-3">
                <div class="row">                    
                    <input type="hidden" id="id" name="id" value="<?= $contato->getId() ?>" />
                </div>
                <div class="row mt-3">
                    <div class="col-5">
                        <div class="mb-2 float-end">
                            <img src="<?= BASE ?>fotos/<?= $contato->getFoto() ?>" width="450" height="450" />
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="mb-2">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" class="form-control form-control-sm" name="nome" 
                                   value="<?= $contato->getNome() ?>" readonly />                    
                        </div>
                        <div class="mb-2">
                            <label for="telefone" class="form-label">Telefone</label>
                            <input type="text" class="form-control form-control-sm" name="telefone" 
                                   value="<?= $contato->getTelefone() ?>" readonly />
                        </div>
                        <div class="mb-2">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control form-control-sm" name="email" 
                                   value="<?= $contato->getEmail() ?>" readonly />
                        </div>
                        <div class="mb-2">
                            <label for="anotacoes" class="form-label">Anotações</label>
                            <textarea class="form-control form-control-sm" rows="3" name="anotacoes" readonly
                                      style="resize: none;"><?= $contato->getAnotacoes() ?></textarea>
                        </div>
                        <div class="mt-4">
                            <a href="<?= BASE ?>" type="button" class="btn btn-danger">
                                <i class="bi bi-arrow-left"></i> Voltar
                            </a>
                            <a href="<?= BASE ?>contato/edit/<?= $contato->getId() ?>" type="button" class="btn btn-primary float-end">
                                <i class="bi bi-pencil"></i> Editar
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </body>

</html>