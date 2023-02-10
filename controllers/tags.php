<?php

$tags = listTags();


view("tags.view.php",[
    'tags' => $tags
]);