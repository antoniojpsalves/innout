<?php

class Model {
    protected static $tableName = '';
    protected static $columns = [];
    protected $values = [];

    /**
     * Função construtor recebe um array com os dados
     * @param array $arr
     */
    function __construct($arr) {
        $this->loadFromArray($arr);
    }


    /**
     * Função que checa e atribui os dados do array ao atributo values.
     * @param array $arr
     */
    public function loadFromArray($arr) {
        if($arr) {
            foreach($arr as $key => $value) {
                $this->$key= $value;
            }
        }
    }

    /**
     * Função que retorna o a informação guardada na chave.
     * @param string $key
     * @return string
     */
    public function __get($key) {
        return $this->values[$key];
    }

    /**
     * Função que define no atributo values uma nova chave e valor
     * @param string $key
     * @param string $value
     */
    public function __set($key, $value) {
        $this->values[$key] = $value;
    }
}