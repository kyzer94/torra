<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EstoqueNovo_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    function listar(){
        $this->db->select('*');
        $this->db->from('estoque');
        $this->db->order_by('nomeEstoque','ASC');
        $this->db->join('fornecedor','fornecedor.idforce = estoque.idforce');
        $this->db->join('categoria','categoria.idCategoria = estoque.idCategoria');
        $this->db->order_by('nomeEstoque','ASC');
        $query=$this->db->get();
    return $query->result();
    }
    function deletar($id){
        $this->db->where('idestoque',$id);
        return $this->db->delete('estoqueNovo');
    }
        function desativar($idcliente) {
        $this->db->where('idestoque', $idcliente);
        $this->db->set('status', 0);
        return $this->db->update('estoque');
    }
    function editar($idestoque){
        $this->db->where('idestoque',$idestoque);
        $result = $this->db->get('estoque');
        return $result->result();
    }
     
}