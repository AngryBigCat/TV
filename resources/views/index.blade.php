<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
@endif
<form action="{{ url('/player') }}" method="post">
    {{ csrf_field() }}
    <div>
        <label>问题1：</label>
        <input type="radio" name="answer_1" value="A"> A
        <input type="radio" name="answer_1" VALUE="B"> B
        <input type="radio" name="answer_1" VALUE="C"> C
        <input type="radio" name="answer_1" VALUE="D"> D
    </div>
    <div>
        <label>问题2：</label>
        <input type="radio" name="answer_2" value="A"> A
        <input type="radio" name="answer_2" VALUE="B"> B
        <input type="radio" name="answer_2" VALUE="C"> C
        <input type="radio" name="answer_2" VALUE="D"> D
    </div>
    <div>
        <label>问题3：</label>
        <input type="radio" name="answer_3" value="A"> A
        <input type="radio" name="answer_3" VALUE="B"> B
        <input type="radio" name="answer_3" VALUE="C"> C
        <input type="radio" name="answer_3" VALUE="D"> D
    </div>
    <div>
        <label>问题4：</label>
        <textarea name="answer_4" cols="30" rows="10"></textarea>
    </div>
    <div>
        <label>姓名：</label>
        <input type="text" name="name">
    </div>
    <div>
        <label>性别：</label>
        <input type="radio" name="sex" value="男"> 男
        <input type="radio" name="sex" value="女"> 女
    </div>
    <div>
        <label>手机：</label>
        <input type="text" name="phone">
    </div>
    <div>
        <label>地址：</label>
        <input type="text" name="address">
    </div>
    <div>
        <input type="submit" value="提交">
    </div>
</form>
</body>
</html>