@extends('layout')

<h1 class="my-4 text-center fw-bold">管理システム</h1>
<div class="container">
  <div class="border border-dark p-5 mb-4">
    <form method="get" action="{{ route('management') }}">
    @csrf
  <div class="mb-3 row">
    <label for="fullname" class="col-sm-2 col-form-label fw-bold">お名前</label>
    <div class="col-sm-4">
      <input type="text" name="fullname" class="form-control">
    </div>
    <label for="gender" class="col-sm-1 col-form-label fw-bold">性別</label>
      <input class="col-sm-1" type="radio" name="gender" checked>全て
      <input class="col-sm-1" type="radio" name="gender" value="1">男性
      <input class="col-sm-1" type="radio" name="gender" value="2">女性
  </div>
  <div class="mb-3 row">
    <label class="col-sm-2 col-form-label fw-bold">登録日</label>
    <div class="col-sm-4">
      <input name="start" type="date" class="form-control">
    </div>
    〜
    <div class="col-sm-4">
      <input name="end" type="date" class="form-control">
    </div>
  </div>
    <div class="mb-3 row">
    <label for="email" class="col-sm-2 col-form-label fw-bold">メールアドレス</label>
    <div class="col-sm-4">
      <input type="text" name="email" class="form-control">
    </div>
  </div>
  <div class="text-center">
    <button class="btn btn-dark px-5 mt-3 fw-bold">検索</button><br>
  </div>
  </form>
  <div class="text-center">
    <a href="{{route('management')}}">リセット</a>
  </div>
</div>
  {{ $inputs->appends(request()->query())->links() }}
<div class="ml-auto">
  
</div>
@if(session('delete.success'))
  <p style="color:red;">{{session('delete.success')}}</p>
@endif

<table class="table">
  <thead>
    <tr>
      <th scope="col" style="width:5%">ID</th>
      <th scope="col" style="width:15%">お名前</th>
      <th scope="col" style="width:5%">性別</th>
      <th scope="col" style="width:20%">メールアドレス</th>
      <th scope="col" style="width:45%">ご意見</th>
      <th scope="col"style="width:10%"></th>
    </tr>
  </thead>
  <tbody>
    @foreach($inputs as $input)
    <tr>
      <th scope="row">{{ $input->id }}</th>
      <td>{{ $input->fullname }}</td>
      <td>@if($input['gender'] == 1)男性
        @elseif($input['gender'] == 2) 女性
        @endif</td>
      <td>{{ $input->email }}</td>
      <td><p class="text-truncate" style="width:500px;"data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ $input->opinion }}">{{ $input->opinion }}</p></td>
      <td>
        <form action="{{ route('contact.delete', ['id' => $input->id]) }}" method="post">
          @csrf
        <button class="btn btn-dark px-3 fw-bold">削除</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
