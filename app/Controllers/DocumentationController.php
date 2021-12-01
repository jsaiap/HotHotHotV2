<?php


final class DocumentationController
{

	/**
	 * Action par defaut à executer à la racine
	 *
	 * @return void
	 */
	public function defautAction()
	{
		View::show('panel/page/documentation');
	}

}