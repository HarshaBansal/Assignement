@extends('layouts.app')

<div class = "container row justify-content-center" id = "user-details">
    <div class = "col-md-8">
        {!! Form::hidden('user-data-url', route('api.user-data')) !!}
        <form @submit.prevent = "submit">
            <div class = "form-group">
                <div class = "col-12">
                    {!! Form::label('name','Name') !!}
                    <small>*</small>
                    {!! Form::text('name', null, [
                    'class' => 'form-control',
                    'tabindex' => '1',
                    'required' => 'required',
                    'placeholder' => 'Enter Name'
                    ]) !!}
                </div>
            </div>
            <div class = "col-12">
                <button type = "submit" class = "btn btn-primary btn-block">Submit</button>
            </div>
        </form>
    </div>
</div>
