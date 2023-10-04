<?php
    class Ocorrencia
    {
        public $responsavel;
        public $data;
        public $titulo;
        public $descricao;

        function __construct($responsavel, $data, $titulo, $descricao)
        {
            $this->responsavel = $responsavel;
            $this->data = $data;
            $this->titulo = $titulo;
            $this->descricao = $descricao;
        }
    }
?>