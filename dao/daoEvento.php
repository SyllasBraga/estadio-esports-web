<?php

    class daoEvento
    {
        public function listaTodos()
        {
            $lista = [];
            $pst = Conexao::getPreparededStatement('select e.cod_evt, e.nome_evt, e.duracaoINICIO, e.duracaoFIM, e.premiacao, e.exclusivo_arena, j.nome_jogo, a.nome_adm
            from evento e inner join Administrador a on e.cod_adm = a.cod_adm
            inner join jogo j on e.cod_jogo = j.cod_jogo order by e.cod_evt ASC;');
            $pst ->execute();
            $lista = $pst->fetchAll(PDO::FETCH_ASSOC);
            return $lista;
        }
        public function inclui(evento $evt)
        {
            $sql = 'insert into evento (nome_evt, duracaoINICIO, duracaoFIM, premiacao, exclusivo_arena, cod_adm, cod_jogo)
            values(?,?,?,?,?,?,?)';
            $pst = conexao :: getPreparededStatement($sql);
            $pst->bindValue(1, $evt->getNome());
            $pst->bindValue(2, $evt->getDataInicio());
            $pst->bindValue(3, $evt->getDataTermino());
            $pst->bindValue(4, $evt->getPremiacao());
            $pst->bindValue(5, $evt->getExclusivo());
            $pst->bindValue(6, $evt->getCriador());
            $pst->bindValue(7, $evt->getJogo());
            if ($pst->execute()) {
                return true;
            } else {
                return false;
            }   
        }
        public function delete($id)
        {
            $sql = "delete from evento where cod_evt = $id";
            $pst = conexao :: getPreparededStatement($sql);
            if ($pst->execute()) {
                return true;
            } else {
                return false;
            }   
        }
        public function update(evento $evt)
        {
            $sql = 'update evento set nome_evt =?, duracaoINICIO=?, duracaoFIM=?, premiacao=?, 
            exclusivo_arena=?, cod_adm=?, cod_jogo=? where cod_evt=?';
            $pst = conexao :: getPreparededStatement($sql);
            $pst->bindValue(1, $evt->getNome());
            $pst->bindValue(2, $evt->getDataInicio());
            $pst->bindValue(3, $evt->getDataTermino());
            $pst->bindValue(4, $evt->getPremiacao());
            $pst->bindValue(5, $evt->getExclusivo());
            $pst->bindValue(6, $evt->getCriador());
            $pst->bindValue(7, $evt->getJogo());
            $pst->bindValue(8, $evt->getCodEvt());
            if ($pst->execute()) {
                return true;
            } else {
                return false;
            }   
        }
    }


?>