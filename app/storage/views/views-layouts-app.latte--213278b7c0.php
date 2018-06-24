<?php
// source: D:\Tool\phpStudy\WWW\simpl-mvc\app\views\layouts\app.latte

use Latte\Runtime as LR;

class Template213278b7c0 extends Latte\Runtime\Template
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Simple-MVC</title>

    <link href="//cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="//cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body id="app-layout">
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand">
                <?php echo LR\Filters::escapeHtmlText($sitename) /* line 29 */ ?>

            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li><a href="<?php echo "http://simplemvc.com/home/index" ?>">Home</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                <li><a href="<?php echo "http://simplemvc.com/Todo/index" ?>"><i class="fa fa-btn fa-sign-out"></i>Todo</a></li>
<?php
		$auth=1;
		;
		if ($auth) {
			?>                    <!-- <li><a href="<?php echo "http://simplemvc.com/login" ?>">Login</a></li> -->
                    <!-- <li><a href="<?php echo "http://simplemvc.com/register" ?>">Register</a></li> -->
<?php
		}
		else {
?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <?php echo LR\Filters::escapeHtmlText($auth->name) /* line 50 */ ?> <span class="caret"></span>
                        </a>

 <!--                        <ul class="dropdown-menu" role="menu">
                            <li><a href="<?php echo "http://simplemvc.com/logout" ?>"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul> -->
                    </li>
<?php
		}
?>
            </ul>
        </div>
    </div>
</nav>

<?php
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('content', get_defined_vars());
?>

</body>
</html><?php
		return get_defined_vars();
	}


	function blockContent($_args)
	{
		
	}

}
