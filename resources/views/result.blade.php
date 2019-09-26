<div class = "container" id = "result">
    <form>
        <div class = "form-group">
            <div class = "col-12">
                {!! Form::label('user_hand','User Hand : ') !!}
                {!! Form::text('user_hand', implode(' ',$userCard->toArray()), [
                'class' => 'form-control',
                'tabindex' => '1',
                'required' => 'required',
                'readonly'=>true
                ]) !!}
            </div>
        </div>
        
        <div class = "form-group">
            <div class = "col-12">
                {!! Form::label('user_score','User Score : ') !!}
                {!! Form::text('user_score', $userScore, [
                'class' => 'form-control',
                'tabindex' => '1',
                'required' => 'required',
                'readonly'=>true
                ]) !!}
            </div>
        </div>
        
        <div class = "form-group">
            <div class = "col-12">
                {!! Form::label('computer_hand','Computer Hand :  ') !!}
                {!! Form::text('computer_hand',implode(' ', $computerCard->toArray()), [
                'class' => 'form-control',
                'tabindex' => '1',
                'required' => 'required',
                'readonly'=>true
                ]) !!}
            </div>
        </div>
        
        <div class = "form-group">
            <div class = "col-12">
                {!! Form::label('computer_hand','Computer Score : ') !!}
                {!! Form::text('computer_hand', $computerScore, [
                'class' => 'form-control',
                'tabindex' => '1',
                'required' => 'required',
                'readonly'=>true
                ]) !!}
            </div>
        </div>
    </form>
</div>
