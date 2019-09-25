@extends('layouts.app')

<div class = "col-md-12">
    <div class = "container">
        <div class = "row justify-content-center" id = system-cards>
            <div class = "form-group">
                <div class = "col-md-12">
                    {!! Form::hidden('store-system-cards-data-url', route('api.store-system-cards')) !!}
                    {!! Form::hidden('user_id',$userHand->user_id) !!}
                    
                    {!! Form::open(['class'=> 'form-horizontal']) !!}
                    
                    {!! Form::label('system_cards','System Cards') !!}
                    {!! Form::text('system_cards',implode(' ',$systemCards->toArray()),[
                        'placeholder' => 'Enter the Card Numbers',
                        'class' => 'form-control',
                        'tabindex' => '1',
                        'readonly' => true,
                       ])
                    !!}
                    
                    {!! Form::close() !!}
                </div>
                <div class = "col-md-12">
                    <button type = "button"
                            class = "btn btn-primary btn-lg btn-block"
                            v-on:click = "submit()"
                    >See Result
                    </button>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>
