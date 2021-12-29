<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@php
    $user = [
        'password'=>"ThangNguyen",
        'email'=>"thang24122k@gmail.com",
        'age'=>'22'
        ];
@endphp
<x-forms.login :user="$user">
    <x-slot name="text">
        <p>Day la Data trang login</p>
    </x-slot>
    <strong>Whoops!</strong> Something went wrong!
</x-forms.login>
</body>
</html>
