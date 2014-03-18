<?php

return array(
  'general.php' => '<?php return array();',
  'development' => array(
    'db.php' => '<?php return 
      array(
        "host" => "localhost",
        "user" => "someusername",
        "password" => "somepassword"
      );'
  ),
  'production' => array(
    'db.php' => '<?php return 
      array(
        "host" => "localhost",
        "user" => "someusername",
        "password" => "somepassword"
      );',
    'anotherfolder' => array(
      'somefile.php' => '<?php return array();'
    )
  )
);
