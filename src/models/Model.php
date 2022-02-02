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


    /**
     * Função que traz informações com base em filtros e/ou colunas
     * Retorna as ifnromações como objetos da classe que à chamou.
     * @param array $filters
     * @param string $colums
     */
    public static function get($filters = [], $colums = '*') {
        $objects = [];
        $result = static::getResultSetFromSelect($filters, $colums);
        if($result) {
            $class = get_called_class();
            while($row = $result->fetch_assoc()) {
                array_push($objects, new $class($row));
            }
        }
        return $objects;
    }

    /**
     * Função que gera um sql de select no banco usando filtros e colunas como parametro
     * @param array $filters
     * @param string $colums
     */
    public static function getResultSetFromSelect($filters = [], $colums = '*') {
        $sql = "SELECT ${colums} FROM " . static::$tableName . static::getFilters($filters);
        $result = Database::getResultFromQuery($sql);
        if($result->num_rows === 0) {
            return null;
        } else return $result;
    }

    /**
     * Função que adiciona o WHERE com base nos filtros enviados no array
     * @param array $filters
     * @return string
     */
    private static function getFilters($filters) {
        $sql = '';
        if(count($filters) > 0) {
            $sql .= " WHERE 1 = 1";
            foreach($filters as $column => $value) {
                $sql .= " AND ${column} = " . static::getFormatedValue($value);
            }
        }
        return $sql;
    }

    /**
     * Função que verifica se o valor é uma string e se for, coloca aspas no começo e fim para usar no sql
     * 
     */
    private static function getFormatedValue($value) {
        if(is_null($value)) {
            return "null";
        } elseif(gettype($value) === 'string') {
            return "'${value}'";
        } else {
            return $value;
        }
    }
}