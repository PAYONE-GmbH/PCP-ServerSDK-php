#!/bin/bash

# exit on failed command, fail on unknown variables
set -eu

VERSION=$1

# check if jq is available
if ! command -v jq; then
  echo "ERROR: $0 depends on 'jq', it either not installed or not available to this shell instance"
  exit 2
fi

# Check if an argument is provided
if [ -z "$VERSION" ]; then
  echo "Error: No version number provided."
  echo "Usage: $0 <version>"
  exit 1
fi

# Check if the argument matches the format int.int.int
if [[ "$VERSION" =~ ^[0-9]+\.[0-9]+\.[0-9]+$ ]]; then
  echo "Valid version number: $VERSION"
else
  echo "Error: Invalid version number format."
  echo "Usage: $0 <version>"
  exit 1
fi

# tag should start with a 'v'
TAG="v${VERSION}"
COMMUNICATOR_CONFIG_CLASS_PATH="./src/PayoneCommercePlatform/Sdk/CommunicatorConfiguration.php"
COMPOSER_JSON_PATH="./composer.json"
PACKAGE_JSON_PATH="./package.json"
PACKAGE_LOCK_JSON_PATH="./package-lock.json"

SED_COMMUNICATOR_CONFIG_CMD=$(printf 's/public const SDK_VERSION = .[0-9]*\.[0-9]*\.[0-9]*./public const SDK_VERSION = %s/' "'${VERSION}'")

# Update the version in the CommunicatorConfiguration class
sed -i '' "$SED_COMMUNICATOR_CONFIG_CMD" $COMMUNICATOR_CONFIG_CLASS_PATH

# Update the version number in the composer.json file
jq --arg version "$VERSION" '.version = $version' composer.json >tmp.json && mv tmp.json composer.json
# Update the version number in the package.json file
jq --arg version "$VERSION" '.version = $version' package.json >tmp.json && mv tmp.json package.json
# Update the version number in the package-lock.json file for changelog generation
jq --arg version "$VERSION" '
  .version = $version |
  .packages[""].version = $version
' package-lock.json >tmp.json && mv tmp.json package-lock.json
rm -f tmp.json

git add "$COMMUNICATOR_CONFIG_CLASS_PATH" "$COMPOSER_JSON_PATH"
git add $PACKAGE_JSON_PATH
git add $PACKAGE_LOCK_JSON_PATH
npm install
npm run changelog
git add CHANGELOG.md
git tag -a $TAG -m "Release version $VERSION"
git commit -m "Update version to $VERSION"

echo "Version updated to $VERSION and tagged in Git."
echo ""
echo "If this was a mistake, you can run"
echo "  git reset --soft HEAD~1"
echo "  git tag -d ${TAG}"
