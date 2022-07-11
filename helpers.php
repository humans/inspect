<?php

if (! function_exists('inspect')) {
    function inspect($reference)
    {
        return new Humans\Inspect\Inspect($reference);
    }
}
