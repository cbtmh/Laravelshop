@extends('layout')
@section('content')
    
<div class="container">
  <h1 style="color:#0081C9">Thông tin tài khoản</h1>

     @foreach ($user_info as $key => $info)
        <table>
            <div class="form-group">
      <label for="name" >Tên khách hàng</label>
      <input type="text" class="form-control" id="username" disabled value ="{{$info->customer_name}}">
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" disabled value ="{{$info->customer_email}}">
    </div>

    <div class="form-group">
      <label for="phone">SDT</label>
      <input type="text" class="form-control" id="phone" disabled value ="{{$info->customer_phone}}">
    </div>

        </table>
    @endforeach

</div>


@endsection