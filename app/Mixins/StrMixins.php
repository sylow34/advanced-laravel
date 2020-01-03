<?php


namespace App\Mixins;


class StrMixins
{
    public function refNumber()
    {
        return function ($ref) {
            return 'Ref-' . substr($ref, 0, 3) . '-' . substr($ref, 3);
        };
    }

    public function prefix()
    {
        return function ($string, $prefix='Ref-') {
            return $prefix . $string;
        };
    }
}
