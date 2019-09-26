@extends('layouts.app')

<div class = "col-md-12">
    <div class = "container">
        <div class = "row justify-content-center" id = user-card>
            <div class = "form-group">
                <div class = "col-md-12">
                    {!! Form::hidden('cards-data-url', route('api.user-cards')) !!}
                    {!! Form::hidden('user_id',request()->route('id')) !!}
                    
                    {!! Form::open(['class'=> 'form-horizontal']) !!}
                    
                    
                    {!! Form::label('cards','Cards') !!}
                    {!! Form::text('cards',null,[
                        'placeholder' => 'Enter the Card Numbers',
                        'class' => 'form-control',
                        'tabindex' => '1',
                        'required' => 'required',
                       ])
                    !!}
                    
                    {!! Form::close() !!}
                </div>
                <div class = "col-md-12">
                    <button type = "button"
                            class = "btn btn-primary btn-lg btn-block"
                            v-on:click = "submit()"
                    >Play!
                    </button>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>
