<!-- Word Field -->
<div class="form-group col-sm-6">
    {!! Form::label('word', '关键字:') !!}
    {!! Form::text('word', null, ['class' => 'form-control']) !!}
</div>

<!-- Link Field -->
<div class="form-group col-sm-6">
    {!! Form::label('link', '链接:') !!}
    {!! Form::text('link', null, ['class' => 'form-control']) !!}
</div>

<!-- View Field -->
<div class="form-group col-sm-6">
    {!! Form::label('view', '浏览次数:') !!}
    {!! Form::text('view', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('保存', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('linkLists.index') !!}" class="btn btn-default">返回</a>
</div>
