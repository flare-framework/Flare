<?php

use Latte\Runtime as LR;

/** source: C:\laragon\www\tp\sazman-flare\flare4.2.0\Flare\Controllers/../View/latte/page/welcome.latte */
final class Templatef3667c4b8f extends Latte\Runtime\Template
{
	public const Blocks = [
		['title' => 'blockTitle', 'content' => 'blockContent'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		$this->renderBlock('title', get_defined_vars()) /* line 2 */;
		echo "\n";
		$this->renderBlock('content', get_defined_vars()) /* line 3 */;
	}


	public function prepare(): array
	{
		extract($this->params);

		$this->parentName = '../layouts/@w-layout.latte';
		return get_defined_vars();
	}


	/** {block title} on line 2 */
	public function blockTitle(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo LR\Filters::escapeHtmlText($title) /* line 2 */;
	}


	/** {block content} on line 3 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<div id=\'stars\'></div>
<div id=\'stars2\'></div>
<div id=\'stars3\'></div>
<div id=\'title\'>
<span>Welcome to</span><br>
<span>';
		echo LR\Filters::escapeHtmlText($welcome) /* line 9 */;
		echo '</span><br>
<img src="Flare.png" alt="Flare - logo" width="20%" height="20%">
<br>
<span style="font-size: xx-large">
';
		/* line 13 */;
		echo 'PHP VERSION' .PHP_VERSION.'| Flare VERSION : 4.2.0'  ;
		$jdf = new jdf() ;
		echo  '<br>'.$jdf->jstrftime('%c');
		echo '©  Sajjad eftekhari ';
		echo LR\Filters::escapeHtmlText(date('Y')) /* line 17 */;
		echo '</span>
</div>
';
	}
}
