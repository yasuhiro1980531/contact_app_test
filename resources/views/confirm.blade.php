@extends('layout')
  
<h1 class="my-4 text-center fw-bold">内容確認</h1>
<div class="container">
  <div class="row justify-content-center">
    <form action="{{ route('contact.add') }}" method="post" class ="col-md-8">
      @csrf
    <div class="mb-3 row">
      <label class="col-sm-2 col-form-label fw-bold">お名前</label>
      <div class="col-sm-10">
        <input type="hidden" name="fullname" value="{{ $inputs['fullname']}}">
        <p class="align-middle">{{ $inputs['fullname']}}</p>
      </div>
    </div>
  
    <div class="mb-3 row">
      <label class="col-sm-2 col-form-label fw-bold">性別</label>
      <div class="col-sm-10">
        <input type="hidden" name="gender" value="{{$inputs['gender']}}">
          @if($inputs['gender'] == 1)
          <p>男性</p>
          @elseif($inputs['gender'] == 2)
          <p>女性</p>
          @endif
      </div>
    </div>

    <div class="mb-3 row">
      <label class="col-sm-2 col-form-label fw-bold">メールアドレス</label>
      <div class="col-sm-10">
        <input type="hidden" name="email" value="{{ $inputs['email']}}">
        <p>{{ $inputs['email']}}</p>
      </div>
    </div>

    <div class="mb-3 row">
      <label class="col-sm-2 col-form-label fw-bold">郵便番号</label>
      <div class="col-sm-10">
        <input type="hidden" name="postcode" value="{{ $inputs['postcode']}}">
        <p>{{ $inputs['postcode']}}</p>
      </div>
    </div>

    <div class="mb-3 row">
      <label class="col-sm-2 col-form-label fw-bold">住所</label>
      <div class="col-sm-10">
        <input type="hidden" name="address" value="{{ $inputs['address']}}">
        <p>{{ $inputs['address']}}</p>
      </div>
    </div>

    <div class="mb-3 row">
      <label class="col-sm-2 col-form-label fw-bold">建物名</label>
      <div class="col-sm-10">
        <input type="hidden" name="building_name" value="{{ $inputs['building_name']}}">
        <p>{{ $inputs['building_name']}}</p>
      </div>
    </div>

    <div class="mb-3 row">
      <label class="col-sm-2 col-form-label fw-bold">ご意見</label>
      <div class="col-sm-10">
        <input type="hidden" name="opinion" value="{{ $inputs['opinion']}}">
        <p>{{ $inputs['opinion']}}</p>
      </div>
    </div>

    <div class="text-center">
      <button class="btn btn-dark px-5 mt-2 fw-bold" type="hidden" name="action" value="send">送信</button><br>
      <button class="btn btn-link px-5 mt-2" type="hidden" name="action" value="back">修正する</button>
    </div>
    </form>
  </div>
</div>