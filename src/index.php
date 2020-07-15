<?php

require __DIR__.'/bootstrap.php';

use Google\Cloud\Firestore\FirestoreClient;

$app = new App(new FirestoreClient());

$app->run();
