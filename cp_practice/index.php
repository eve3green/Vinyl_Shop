<?php
require_once 'applications/core/model.php';
require_once 'applications/core/view.php';
require_once 'applications/core/controller.php';

include 'applications/models/model_records.php';

include 'applications/controllers/controller_records.php';

// створюємо контролер
$controller = new controller_records;
// викликаємо метод handleRequest
$controller-> handleRequest();
?>