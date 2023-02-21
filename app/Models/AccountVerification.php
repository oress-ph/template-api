<?php

namespace App\Models;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class AccountVerification extends Model
{
	protected $table = 'account_verifications';

	protected $fillable = [
		'user_id',
		'name',
		'username',
		'token',
		'expiry',
		'is_used',
	];

	public static function generateJWT($userID, $dateString) {
		$secretKey = Config::get('app.key');
		$payload = [
			"user_id" => $userID,
			"timestamp" => $dateString,
		];
		$jwt = JWT::encode($payload, $secretKey, 'HS256');
		return $jwt;
	}

	public static function parseJWT($token) {
		$secretKey = Config::get('app.key');
		$jwt = JWT::decode($token, new Key($secretKey, 'HS256'));
		return $jwt;
	}

    use HasFactory;
}
