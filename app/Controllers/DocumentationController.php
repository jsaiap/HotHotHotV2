<?php


final class DocumentationController {
	/**
	 * Action par defaut à executer à la racine
	 *
	 * @return void
	 */
	public static function defautAction()
	{
		View::show('panel/page/documentation');
	}

	public static function UserAction()
	{
		View::show('panel/page/user-documentation');
	}

}