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
                {!! Form::label('sysetm_hand','System Hand :  ') !!}
                {!! Form::text('sysetm_hand',implode(' ', $systemCard->toArray()), [
                'class' => 'form-control',
                'tabindex' => '1',
                'required' => 'required',
                'readonly'=>true
                ]) !!}
            </div>
        </div>
        
        <div class = "form-group">
            <div class = "col-12">
                {!! Form::label('system_hand','System Score : ') !!}
                {!! Form::text('system_hand', $systemScore, [
                'class' => 'form-control',
                'tabindex' => '1',
                'required' => 'required',
                'readonly'=>true
                ]) !!}
            </div>
        </div>
    </form>
</div>
