<?php
return [
    'use_alias' => env('WECHAT_USE_ALIAS', false),
    'app_id' => env('WECHAT_APPID', 'wx426b3015555a46be'), // 必填
    'secret' => env('WECHAT_SECRET', '7813490da6f1265e4901ffb80afaa36f'), // 必填
    'token' => env('WECHAT_TOKEN', '1900009851'), // 必填
    'encoding_key' => env('WECHAT_ENCODING_KEY', '8934e7d15453e97507ef794cf7b0519d') // 只有加密模式需要
];
/*	const APPID = 'wx426b3015555a46be';
	const MCHID = '1900009851';
	const KEY = '8934e7d15453e97507ef794cf7b0519d';
	const APPSECRET = '7813490da6f1265e4901ffb80afaa36f';*/
	