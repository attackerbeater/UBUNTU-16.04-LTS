<?php
namespace code\Abstracts;

abstract class AbstractModel {
	// checks if method is call
	function __call($method, $args){
		try {
			if(!method_exists($this, $method)){
				throw new Exception("unknown method $method called");
			}
		} catch (Exception $e) {
			print $e->getMessage();
		}
	}
}
