echo "Don't start this script from a different location!"
mkdir -p logs/apache2
chmod -R 777 logs
docker run --rm -d \
  --name releasetoolCopy \
  -h releasetoolCopy \
  -v ~/Development/phpStormTest/releasetool/www:/var/www/html \
  -v ~/Development/phpStormTest/releasetool/config:/etc/releasetool \
  -v ~/Development/phpStormTest/releasetool/logs:/var/log \
  -v ~/Development/phpStormTest/releasetool/commits:/mnt/commits \
  -p 8012:80 \
  cnconsult/releasetool:latest
