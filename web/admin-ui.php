<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once "./header.inc.php";

require_once "./header.inc.php";

use Basttyy\Web\WebDB;

if (!WebDB::isAdminUIEnabled()) {
  exit(-1);
}

$result = WebDB::doAdminAction( $_POST );

echo json_encode( $result );
