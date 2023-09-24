<?php
    class diagnostico
    {
        public $laboratorio;
        public $data;
        public $problemaApps;
        public $quantApps;
        public $problemaFonte;
        public $quantFonte;
        public $problemaHD;
        public $quantHD;
        public $problemaMonitor;
        public $quantMonitor;
        public $problemaMouse;
        public $quantMouse;
        public $problemaTeclado;
        public $quantTeclado;
        public $problemaWindows;
        public $quantWindows;
        public $atividadeExercida;
        public $problemasSolucionados;
        public $responsavel;

        public function SetLaboratorio($lab)
        {
            $this->laboratorio = $lab;
        }
        public function GetLaboratorio()
        {
            return $this->laboratorio;
        }

        public function SetData($data)
        {
            $this->data = $data;
        }
        public function GetData()
        {
            return $this->data;
        }

        public function SetProblemaApps($problemaApps)
        {
            $this->problemaApps = $problemaApps;
        }
        public function GetProblemaApps()
        {
            return $this->problemaApps;
        }

        public function SetQuantApps($quantApps)
        {
            $this->quantApps = $quantApps;
        }
        public function GetQuantApps()
        {
            return $this->quantApps;
        }

        public function SetProblemaFonte($problemaFonte)
        {
            $this->problemaFonte = $problemaFonte;
        }
        public function GetProblemaFonte()
        {
            return $this->problemaFonte;
        }

        public function SetQuantFonte($quantFonte)
        {
            $this->quantFonte = $quantFonte;
        }
        public function GetQuantFonte()
        {
            return $this->quantFonte;
        }

        public function SetProblemaHD($problemaHD)
        {
            $this->problemaHD = $problemaHD;
        }
        public function GetProblemaHD()
        {
            return $this->problemaHD;
        }

        public function SetQuantHD($quantHD)
        {
            $this->quantHD = $quantHD;
        }
        public function GetQuantHD()
        {
            return $this->quantHD;
        }
    }
?>