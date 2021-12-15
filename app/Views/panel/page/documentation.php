<h2>Documentation MVC</h2>
<h3>Ajouter une page</h3>
<p>Pour ajouter une nouvelle page, il suffit d'ajouter un fichier NomPage.php dans le dossier Views/panel/page/</p>
<p>Ensuite, il faut créer une classe NomPageController.php dans le dossier Controllers</p>
<h3>Le controller</h3>
<p>La classe du controller doit être en final. De plus, elle contient le code pour accéder à la view :</p>
<pre>	public static function defautAction()
	{
		View::show('panel/page/NomPage');
	}</pre>
