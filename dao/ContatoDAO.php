<?php

    class ContatoDAO {

        public function salvar(Contato $contato) {        
            try {
                $connection = ConnectionFactory::connect();
                $sql = "INSERT INTO contatos (nome, telefone, email, anotacoes) 
                       VALUES (:nome, :telefone, :email, :anotacoes)";
                $rs = $connection->prepare($sql);                
                $rs->bindValue(":nome", $contato->getNome());
                $rs->bindValue(":telefone", $contato->getTelefone());
                $rs->bindValue(":email", $contato->getEmail());
                $rs->bindValue(":anotacoes", $contato->getAnotacoes());
                $rs->execute();
                if($rs->rowCount() > 0) {                    
                    return true;
                }
            } 
            catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }              
        }

        public function get($id) {        
            try {
                $connection = ConnectionFactory::connect();
                $sql = "SELECT * FROM contatos WHERE id = :id";
                $rs = $connection->prepare($sql);
                $rs->bindValue(":id", $id);                
                $rs->execute();
                if($rs->rowCount() > 0) {
                    $row = $rs->fetch(PDO::FETCH_OBJ);
                    $contato = new Contato();
                    $contato->setId($row->id);
                    $contato->setFoto($row->foto);
                    $contato->setNome($row->nome);
                    $contato->setTelefone($row->telefone);
                    $contato->setEmail($row->email);
                    $contato->setAnotacoes($row->anotacoes);
                    return $contato;
                }
            } 
            catch (PDOException $e) {
                $e->getMessage();
            }
            return null;            
        }

        public function editar(Contato $contato) {        
            try {
                $connection = ConnectionFactory::connect();
                if($contato->getFoto() !== null) {
                    $sql = "UPDATE contatos SET foto = :foto, nome = :nome, telefone = :telefone, email = :email, anotacoes = :anotacoes WHERE id = :id";
                    $rs = $connection->prepare($sql);
                    $rs->bindValue(":foto", $contato->getFoto());
                    $rs->bindValue(":nome", $contato->getNome());
                    $rs->bindValue(":telefone", $contato->getTelefone());
                    $rs->bindValue(":email", $contato->getEmail());
                    $rs->bindValue(":anotacoes", $contato->getAnotacoes());
                    $rs->bindValue(":id", $contato->getId());
                    $rs->execute();
                    return true;
                }
                else {
                    $sql = "UPDATE contatos SET nome = :nome, telefone = :telefone, email = :email, anotacoes = :anotacoes WHERE id = :id";
                    $rs = $connection->prepare($sql);
                    $rs->bindValue(":nome", $contato->getNome());
                    $rs->bindValue(":telefone", $contato->getTelefone());
                    $rs->bindValue(":email", $contato->getEmail());
                    $rs->bindValue(":anotacoes", $contato->getAnotacoes());
                    $rs->bindValue(":id", $contato->getId());
                    $rs->execute();
                    return true;
                }
            } 
            catch (PDOException $e) {
                $e->getMessage();
                return false;
            }
        }

        public function pesquisar($pesquisa) {        
            try {
                $connection = ConnectionFactory::connect();
                $contatos = [];
                $sql = "SELECT * FROM contatos WHERE nome LIKE :nome";
                $rs = $connection->prepare($sql);
                $rs->bindValue(":nome", "%" . $pesquisa . "%");
                $rs->execute();
                while($row = $rs->fetch(PDO::FETCH_OBJ)) {
                    $contato = new Contato();
                    $contato->setId($row->id);                
                    $contato->setFoto($row->foto);
                    $contato->setNome($row->nome);
                    $contato->setTelefone($row->telefone);
                    $contato->setEmail($row->email);
                    $contato->setAnotacoes($row->anotacoes);
                    array_push($contatos, $contato);
                }
            } 
            catch (PDOException $e) {
                $e->getMessage();
            }
            return $contatos;            
        }

        public function deletar($id) {
            try {
                $connection = ConnectionFactory::connect();
                $sql = "DELETE FROM contatos WHERE id = :id";
                $rs = $connection->prepare($sql);
                $rs->bindValue(":id", $id);
                $rs->execute();
                if($rs->rowCount() > 0) {
                    return true;
                }
            }
            catch (PDOException $e) {
                $e->getMessage();
            }
            return false;
        }

    }