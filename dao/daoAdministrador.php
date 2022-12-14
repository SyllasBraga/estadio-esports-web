<?php

class daoAdministrador
{
    public function listaTodos()
    {
        $lista = [];
        $pst = Conexao::getPreparededStatement('select * from Administrador;');
        $pst->execute();
        $lista = $pst->fetchAll(PDO::FETCH_ASSOC);
        return $lista;
    }
    public function inclui(Administrador $administrador)
    {
        $sql = 'insert into Administrador (nome_adm, idade, salario) values (?,?,?);';
        $pst = Conexao::getPreparededStatement($sql);
        $pst->bindValue(1, $administrador->getNome());
        $pst->bindValue(2, $administrador->getIdade());
        $pst->bindValue(3, $administrador->getSalario());
        if ($pst->execute()) {
            return true;
        }else{
            return false;
        }
    }
    public function delete($id)
    {
        $sql = "delete from Administrador where cod_adm = $id";
        $pst = Conexao::getPreparededStatement($sql);
        if ($pst->execute()) {
            return true;
        }else{
            return false;
        }
    }
    public function update(Administrador $administrador)
    {
        $sql = 'update administrador set nome_adm = ?,idade=?,salario=? where cod_adm=?';
        $pst = Conexao::getPreparededStatement($sql);
        $pst->bindValue(1, $administrador->getNome());
        $pst->bindValue(2, $administrador->getIdade());
        $pst->bindValue(3, $administrador->getSalario());
        $pst->bindValue(4, $administrador->getCodAdm());
        if ($pst->execute()) {
            return true;
        }else{
            return false;
        }
    }
}

?>