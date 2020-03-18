<?php

/**
 * hash化
 * @param string $value
 * @return string
 */
function bcrypt(string $value)
{
    return md5(md5($value));
}