<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?=TITLE?> - Adicionar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />
    </head>
    
    <body onload="document.getElementById('nome').focus();">    
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
            <div class="container w-50 mt-3">
                <form action="add" method="post">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" name="nome" id="nome" 
                               required onblur="this.value=this.value.trim().toUpperCase();" maxlength="30" />
                    </div>
                    <div class="mb-3">
                        <label for="telefone" class="form-label">Telefone</label>
                        <input type="text" class="form-control" name="telefone" id="telefone" maxlength="14" required onblur="this.value=this.value.trim();">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" name="email" maxlength="50" onblur="this.value=this.value.trim().toLowerCase();">
                    </div>
                    <div class="mb-3">
                        <label for="anotacoes" class="form-label">Anotações</label>
                        <textarea class="form-control" name="anotacoes" id="anotacoes" 
                                  maxlength="200" onblur="this.value=this.value.trim();"
                                  style="resize: none;"></textarea>
                    </div>
                    <a href="<?= BASE ?>" type="button" class="btn btn-danger">
                        <i class="bi bi-x"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-primary float-end">
                        <i class="bi bi-save-fill"></i> Salvar
                    </button>
                </form>
            </div>
        </div>
        
    </body>
    
</html>