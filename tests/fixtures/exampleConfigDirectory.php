<?php

return array(
  'general.php' => '<?php return array();',
  'notAPhpFileOrFolder.md',
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
      'somefile.php' => '<?php return array();',
      'notaPhpFile.md' => '<?php return array();', 
      'notaPhpFile.txt' => '<?php return array();' 
    )
  )
);
