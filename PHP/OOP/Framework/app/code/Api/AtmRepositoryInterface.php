<?php
namespace code\Api;

// Api
interface AtmRepositoryInterface{
	public function setPassword($password);
	public function getPasswordHash();
	public function setAmount($amount);
	public function getAmount();
}
