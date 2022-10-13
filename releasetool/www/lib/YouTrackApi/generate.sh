docker run --rm \
  -v ${PWD}:/local \
  openapitools/openapi-generator-cli generate \
  -i https://youtracktest.cn-consult.eu/api/openapi.json \
  -g php \
  -o /local
