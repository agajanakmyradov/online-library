<?php

function hello()
{
    return 'hello';
}

function changeLocaleInRoute(Illuminate\Routing\Route $route, $locale) {
    $parameters = $route->parameters();
    $parameters['locale'] = $locale;
    $name = $route->getName();

    return route($name,$parameters);
}

