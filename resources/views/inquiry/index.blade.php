@extends('layouts.app')

@section('content')
<h1>照会記録</h1>
<table class="table table-striped table-bordered">
    <tr>
    <th>詳細</th>
    <th>情報区分</th>
    <th>登録元会社</th>
    <th>照会日時</th>
    <th>保有期限</th>
    <th>DB登録日時</th>
    <th>DB更新日時</th>
    </tr>
@foreach($collections as $row)
    <tr>
    <td><a href="inquiry/{{ $row->id }}">詳細</a></td>
    <td>{{ $row->data_type=="apply" ? "申込情報" : "照会記録" }}</td>
    <td >{{ $row->issuerName }}</td>
    <td >{{ $row->inquiry_dateTime }}</td>
    <td>{{ $row->holdUntil }}</td>
    <td>{{ $row->created_at }}</td>
    <td>{{ $row->updated_at }}</td>
    </tr>
@endforeach
</table>
@endsection