<?php


final class DocumentationController
{

	/**
	 * Action par defaut à executer à la racine Documentation MVC
	 *
	 * @return void
	 */
	public function defautAction()
	{
		View::show('panel/page/documentation');
	}

	public function userAction()
	{
		View::show('panel/page/user-documentation');
	}

}