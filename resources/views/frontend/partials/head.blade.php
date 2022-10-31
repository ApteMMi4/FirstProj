<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="{{asset('img/favicon.ico')}}" type="image/x-icon">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="theme-color" content="#111111">
	<meta name="csrf-token" content="{{csrf_token()}}">
	<title>Apipay.is</title>

	<link rel="stylesheet" href=" {{asset('frontend/css/vendor.css')}} ">
	<link rel="stylesheet" href=" {{asset('frontend/css/main.css')}} ">
	<link rel="stylesheet" href=" {{asset('frontend/custom/custom.css')}}?ver={{Str::random(16)}}">

</head>

<body>
