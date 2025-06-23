<?php
include_once __DIR__ . '/../../index.php';
require_once PATH_AUTOLOADER;

use Core\Views\RendererViews\RendererViews;

?>
<!DOCTYPE html>
<html lang="fr">
<?php include_once __DIR__ . '/../headers/index.php'; ?>
<body>
<h1><?= RendererViews::get('controller_name') ?></h1>
</body>
</html>
