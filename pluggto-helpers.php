<?php

function stringLimit($string, $int = null)
{
    if (!empty($int)) {
        return substr($string, 0, $int);
    }

    return $string;
}

function removeNotAllowedTags($description)
{
    //Remove todas as tags que não estejam sendo passadas no método
    $description = strip_tags($description, '<br><b><p><strong><li><div><span>');

    //Substitui todos os caracteres especiais em HTML (&nbsp, &atilde ... e todos os outros ...)
    $description = html_entity_decode($description, ENT_COMPAT, 'UTF-8');

    return trim(nl2br(strip_tags($description, '<br><b><p><strong><li><div><span>')));
}

function convertDimension($dimension, $from = 'cm', $to = 'mt')
{
    if ($to === 'cm' && $from === 'cm') return $dimension;

    if ($to === 'cm') return $dimension * 100;

    if ($from == 'mt') return $dimension;

    return $dimension / 100;
}

function convertWeight($weight, $from = 'gm', $to = 'kg')
{
    if($to === 'gm' && $from === 'gm') return $weight;

    if($to === 'gm') return $weight * 1000;

    if($from == 'kg') return $weight;

    return $weight / 1000;
}

function SkuFilter($value)
{
    $value = trim($value);

    $value = str_replace(' ', '', $value);
    $value = preg_replace('/[áàãâä]/ui', 'a', $value);
    $value = preg_replace('/[éèêë]/ui', 'e', $value);
    $value = preg_replace('/[íìîï]/ui', 'i', $value);
    $value = preg_replace('/[óòõôö]/ui', 'o', $value);
    $value = preg_replace('/[úùûü]/ui', 'u', $value);
    $value = preg_replace('/[ç]/ui', 'c', $value);
    $value = preg_replace('/[^a-z0-9]/i', '_', $value);

    return $value;
}

function eanOrIsbn($product, $variation)
{
    if (!empty($variation['ean'])) return $variation['ean'];

    if (!empty($product['ean'])) return $product['ean'];

    if (!empty($variation['isbn'])) return $variation['isbn'];

    if (!empty($product['isbn'])) return $product['isbn'];

    return '';
}

function isArrayAndNotEmpty($array)
{
    return is_array($array) && !empty($array);
}

function issetAndNotEmpty($param)
{
    return isset($param) && !empty($param);
}