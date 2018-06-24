<?php
// source: D:\Tool\phpStudy\WWW\Simple-MVC\app/views/todo/index.latte

use Latte\Runtime as LR;

class Template107a43e524 extends Latte\Runtime\Template
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
		if (isset($this->params['todo'])) trigger_error('Variable $todo overwritten in foreach on line 21');
		$this->parentName = '../layouts/app.latte';
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">所有事项</div>
                <div class="panel-body">


                    <form class="form-inline" role="form" action="<?php echo "http://simplemvc.com/todo/store" ?>" method="post">
                        <div class="form-group">
                            <label for="title" class="sr-only">请输入事项</label>
                            <input type="input" class="form-control" name="title" id="title" placeholder="请输入事项">
                        </div>
                        <button type="submit" class="btn btn-default">新增</button>
                    </form>


<?php
		$iterations = 0;
		foreach ($todos as $todo) {
?>
                    <div class="row">
                        <hr>
                        <div class="col-md-8">
                            <h4><?php
			if ($this->global->ifs[] = ($todo->status)) {
				?><s><?php
			}
			echo LR\Filters::escapeHtmlText($todo->title) /* line 25 */;
			if (array_pop($this->global->ifs)) {
				?></s><?php
			}
?>
</h4>
                        </div>
                        <div class="col-md-4">
                            <a href="<?php echo "http://simplemvc.com/todo/edit/$todo->id" ?>" class="btn btn-success">完成</a>
                            <form action="<?php echo "http://simplemvc.com/todo/destroy/$todo->id" ?>" method="POST" style="display: inline;">
                                <button type="submit" class="btn btn-danger">删除</button>
                            </form>
                        </div>
                    </div>
<?php
			$iterations++;
		}
?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php
	}

}
