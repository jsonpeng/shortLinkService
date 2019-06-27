<table class="table table-responsive" id="linkLists-table">
    <thead>
        <tr>
        <th>短链接</th>
        <th>转换链接</th>
        <th>浏览/打开次数</th>
            <th colspan="3">操作</th>
        </tr>
    </thead>
    <tbody>
    @foreach($linkLists as $linkList)
        <tr>
            <td>{!! Request::root().'/'.$linkList->word !!}</td>
            <td>{!! $linkList->link !!}</td>
            <td>{!! $linkList->view !!}</td>
            <td>
                {!! Form::open(['route' => ['linkLists.destroy', $linkList->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
              {{--       <a href="{!! route('linkLists.show', [$linkList->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> --}}
                    <a href="{!! route('linkLists.edit', [$linkList->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('确定删除吗?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>