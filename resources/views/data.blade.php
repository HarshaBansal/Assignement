@extends('layouts.app')

@if($score->win === 0)
    <h2 style = "text-align: center;">You Lost!!</h2>
@else
    <h2 style = "text-align: center;">You Won!!</h2>
@endif

<div class = "row justify-content-center" id = "first">
    <div class = "col-md-4">
        @include('result')
    
    </div>
</div>
<div class = "row justify-content-center" id = "first">
    <div class = "col-md-8">
        @include('user_table')
    </div>
</div>
