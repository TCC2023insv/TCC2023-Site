<?php
    class Ocorrencias
    {
        public $responsavel;
        public $data;
        public $descricao;

        function __construct($responsavel, $data, $descricao)
        {
            $this->responsavel = $responsavel;
            $this->data = $data;
            $this->descricao = $descricao;
        }
    }
?>