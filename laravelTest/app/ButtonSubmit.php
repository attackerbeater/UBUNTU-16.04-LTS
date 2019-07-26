<?php

namespace App;

class ButtonSubmit {

	public static function button($name){

		return "<div class=\"form-group\">
		<button class=\"btn btn-primary\" type=\"submit\">{$name}</button>
	</div>";
	}
}