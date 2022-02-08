<?php

/**
 * Função que fará o require das Classes / MODEL
 * @param String $modelName
 */
function loadModel($modelName) {
    require_once(MODEL_PATH ."/{$modelName}.php");
}

/**
 * Função que fará o require das Views podendo ou não receber um array com parametros a serem usados
 * @param String $viewName
 */
function loadView($viewName, $params = array()) {

    if(count($params)> 0) {
        foreach($params as $key => $value) {
            if(strlen($key) > 0) {
                ${$key} = $value;
            }
        }
    }

    require_once(VIEW_PATH ."/{$viewName}.php");
}