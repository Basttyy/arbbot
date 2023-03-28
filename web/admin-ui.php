<?php

require_once './header.inc.php';

// echo "we returned in admin";

if (!WebDB::isAdminUIEnabled()) {
  exit(-1);
}

$result = WebDB::doAdminAction( $_POST );

echo json_encode( $result );
