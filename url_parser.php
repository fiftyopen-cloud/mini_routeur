<?php
class UrlParser
{
    public function parse($url)
    {
        // Normaliser l'URL : supprimer les doubles slashes et convertir en minuscules
        $url = str_replace('//', '/', strtolower($url));

        // Extraire les parties de l'URL
        
        $parts = explode('/', trim($url, '/'), 3); // Limiter à 3 parties : controller, action, id
        $controller = $parts[0] ?? 'home';
        $action = $parts[1] ?? 'index';

        $id = (is_numeric($parts[2] ?? null)) ? (int)$parts[2] : null;
        
        return [
            'controller' => $controller,
            'action' => $action,
            'id' => $id
        ];
    }
}
?>