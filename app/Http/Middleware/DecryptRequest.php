<?php

namespace App\Http\Middleware;

use Closure;
use App\Helpers\CustomEncrypt;

class DecryptRequest {

    private $ecnrypter;

	public function __construct() {
		$this->ecnrypter = new CustomEncrypt();
	}

	public function handle($request, Closure $next) {
		if (config('app.env') === 'production' || $request->env != "test") {
			$content = $request->getContent();
			//$request->replace([]);
			if (!$request->isMethod('get') && $content !== "") {
				$post = $this->ecnrypter->decrypt($content);
				if ($post) {
					$request->merge($post);
				}
			}
		}

		return $next($request);
	}
}

