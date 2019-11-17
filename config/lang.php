<?php
    class lang{
        private $path;

        /**
         * lang constructor.
         * @param $path
         */
        public function __construct($path = "/assignment/config/lang/")
        {
            $this->path = $path;
        }

        function load(){
            if(isset($_COOKIE["locale"])){
                $locale = $_COOKIE["locale"];
            }else{
                $locale = "en";
            }
            switch ($locale){
                case "en":
                    $string = file_get_contents($_SERVER["DOCUMENT_ROOT"].$this->path."en.json");
                    break;
                case "vn":
                    $string = file_get_contents($_SERVER["DOCUMENT_ROOT"].$this->path."vn.json");
                    break;
                case "fr":
                    $string = file_get_contents($_SERVER["DOCUMENT_ROOT"].$this->path."fr.json");
                    break;
                default:
                    break;
            }
            return json_decode($string);
        }

        function set($name){
            setcookie("locale",$name,time()+(3600*24),"/");
        }
    }
    $locale = new lang();
    $lang = $locale->load();
    if(isset($_POST["locale"])){
        $locale->set($_POST["locale"]);
    }