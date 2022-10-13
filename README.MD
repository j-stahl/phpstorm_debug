PHPstorm does not apply namespaces and classes in subfolders correctly

## Requirements
1. PHPstorm 2022.2.3
2. Docker

## HowTo
1. Go to subfolder /releasetool/www/lib/YouTrackApi and execute `generate.sh`
2. check www/youtracktest.php for PHPstorm code analyzing
3. Merge generated `/releasetool/www/lib/YouTrackApi/composer.json` into `/releasetool/www/composer.json`
   --> I provide a merged file @folder /subproject1
4. create dev environment `docker build -t cnconsult/releasetool .`
5. modify start-docker.sh depending on your personal folder structure (The author was using ~/Development to clone projects here)
6. execute `start-docker.sh`
7. Open Shell in container: `docker exec -it releasetoolCopy /bin/bash`
7. execute `composer install`
8. check again youtracktest.php

use OpenAPI\Client\Configuration;    --> OK
use OpenAPI\Client\Api\DefaultApi;   --> NotOK
