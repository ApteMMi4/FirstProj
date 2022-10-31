<?php

if(!function_exists('price_format'))
{
  /*
  *
  * Функция создания тамбнейла
  *
  */
  function price_format($price_to_convert)
  {
    $result = number_format($price_to_convert, 5, '.', ' ');
    $result = rtrim($result, 0);
    if(substr($result, -1) == '.')
    {
      $result = rtrim($result, '.');
    }
    return $result;
  }
}
