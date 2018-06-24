<?php
// source: D:\Tool\phpStudy\WWW\simpl-mvc\app/views/home/index.latte

use Latte\Runtime as LR;

class Template2c300c8e84 extends Latte\Runtime\Template
{
	public $blocks = [
		'content' => 'blockContent',
	];

	public $blockTypes = [
		'content' => 'html',
	];


	function main()
	{
		extract($this->params);
?>

<?php
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('content', get_defined_vars());
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		$this->parentName = '../layouts/app.latte';
		
	}


	function blockContent($_args)
	{
?><div class="container">
    <h1 align=center>Welcome Use Simple MVC!</h1>
</div>
<?php
	}

}
