<?php namespace App\ViewComposers;

use Illuminate\Contracts\View\View;

class ViewComposer {

	public function compose(View $view) {
		/**
		 * Get current URL in order to identify the part of the system where the user is actually.
		 */
		$url = url()->current();
		if(preg_match('/map/', $url)) {
			$view->with('module', 'map');
		}
		else {
			$view->with('module', 'index');
		}

		$view->with('version', env('VERSION'));
	}
}