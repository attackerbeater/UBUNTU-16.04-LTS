<?php

namespace App\libs\Email;
use Illuminate\Http\Request;
Interface InterfaceEmail {

    public function email(Request $request, $status, $emailobj, $path, $column);
}
