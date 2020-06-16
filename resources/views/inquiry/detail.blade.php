@extends('layouts.app')

@section('content')
<h1>照会記録</h1>
<table class="table table-striped table-bordered">
    <tr>
       <th>情報区分</th>
        <td>{{ $row->data_type=="apply" ? "申込情報" : "照会記録" }}</td>
    </tr>
    <tr>
        <th>登録元会社</th>
        <td >{{ $row->issuerName }}</td>
    </tr>
    <tr>
        <th>照会日時</th>
        <td >{{ $row->inquiry_dateTime }}</td>
    </tr>
    

    <th>保有期限</th>
    <th>DB登録日時</th>
    <th>DB更新日時</th>




    
    
    <td>{{ $row->holdUntil }}</td>
    <td>{{ $row->created_at }}</td>
    <td>{{ $row->updated_at }}</td>

@endforeach
</table>
@endsection