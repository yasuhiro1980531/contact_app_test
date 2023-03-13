@extends('layout')
<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
<h1 class="my-4 text-center fw-bold">お問い合わせ</h1>
<div class="container">
  <div class="row justify-content-center">
    <form action="{{ route('contact.create') }}" method="post" class ="col-md-8">
    @csrf
    @if (count($errors) > 0)
    <p class="text-left alert alert-danger">必要事項を入力してください</p>
    @endif
    <div class="mb-3 row">
      <label class="col-sm-2 col-form-label fw-bold">お名前</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="fullname" value="{{ old('fullname') }}" required>
        @if ($errors->has('fullname'))
        <p class="alert alert-danger mt-2">{{ $errors->first('fullname') }}</p>
        @else
        <p class="text-black-50">例）山田太郎</p>
        @endif
      </div>
    </div>

    <div class="mb-3 row">
      <label class="col-sm-2 col-form-label fw-bold">性別</label>
      <div class="col-sm-10">
        <input type="radio" name="gender" value="1" checked>
        <label for="man">男性</label>
        <input type="radio" name="gender" value="2">
        <label for="woman">女性</label>
      </div>
    </div>

    <div class="mb-3 row">
      <label class="col-sm-2 col-form-label fw-bold">メールアドレス</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
        @if ($errors->has('email'))
        <p class="alert alert-danger mt-2">
          {{ $errors->first('email') }}</p>
        @else
        <p class="text-black-50">例）test@example.com</p>
        @endif
      </div>
    </div>

    <div class="mb-3 row">
      <label class="col-sm-2 col-form-label fw-bold">郵便番号</label>
      <div class="col-sm-1 fw-bold">
        <p class="">〒</p>
      </div>
      <div class="col-sm-9">
        <input type="text" class="form-control" name="postcode" value="{{ old('postcode') }}" onKeyUp="AjaxZip3.zip2addr('postcode', '', 'address', 'address');" pattern="\d{3}-?\d{4}" required>
        @if ($errors->has('postcode'))
        <p class="alert alert-danger mt-2">
        {{ $errors->first('postcode') }}</p>
        @else
        <p class="text-black-50">例）123-4567</p>
        @endif
      </div>
    </div>

    <div class="mb-3 row">
      <label class="col-sm-2 col-form-label fw-bold">住所</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="address" value="{{ old('address') }}" required>
        @if ($errors->has('address'))
        <p class="alert alert-danger mt-2">
          {{ $errors->first('address') }}</p>
        @else
        <p class="text-black-50">東京都渋谷区千駄ヶ谷1-2-3</p>
        @endif
      </div>
    </div>
    <div class="mb-3 row">
      <label class="col-sm-2 col-form-label fw-bold">建物名</label>
      <div class="col-sm-10">
      <input type="text" class="form-control" name="building_name" value="{{ old('building_name') }}">
        @if($errors->has('building_name'))
        <p class="alert alert-danger mt-2">
          {{ $errors->first('building_name') }}</p>
        @elseif(count($errors) > 0)
        <p></p>
        @else
        <p class="text-black-50">例）千駄ヶ谷マンション101</p>
        @endif
      </div>
    </div>

    <div class="mb-3 row">
      <label class="col-sm-2 col-form-label fw-bold">ご意見</label>
      <div class="col-sm-10">
      <input type="text" class="form-control" name="opinion" value="{{ old('opinion') }}" maxlength="120" style="height:100px" required>
      @if ($errors->has('opinion'))
      <p class="alert alert-danger mt-2">
        {{ $errors->first('opinion') }}</p>
      @endif
      </div>
    </div>

    <div class="text-center">
      <button class="btn btn-dark px-5 mt-2 fw-bold">確認</button>
    </div>
    </form>
  </div>
</div>