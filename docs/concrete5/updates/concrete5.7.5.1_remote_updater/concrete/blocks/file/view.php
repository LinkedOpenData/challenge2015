<?php  defined('C5_EXECUTE') or die("Access Denied.");
$f = $controller->getFileObject();
$fp = new Permissions($f);
if ($fp->canViewFile()) {
	$c = Page::getCurrentPage();
	if($c instanceof Page) {
		$cID = $c->getCollectionID();
	}
	?>
	<div class="ccm-block-file">
		<a href="<?php echo ($forceDownload ? $f->getForceDownloadURL() : $f->getDownloadURL()); ?>"><?php echo stripslashes($controller->getLinkText()) ?></a>
	</div>


<?php } ?>