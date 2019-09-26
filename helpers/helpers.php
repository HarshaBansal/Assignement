<?php

if (!function_exists('cards')) {
    
    /**
     * @param $cards
     *
     * @return \Illuminate\Support\Collection
     */
    function cards($cards)
    {
        $cards = collect(explode(' ', strtoupper($cards)));
        
        return $cards;
    }
    
}
