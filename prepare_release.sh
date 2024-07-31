#!/bin/bash

VERSION=$1

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

SED_COMMUNICATOR_CONFIG_CMD=$(printf 's/public const SDK_VERSION = .[0-9]*\.[0-9]*\.[0-9]*./public const SDK_VERSION = %s/' "'${VERSION}'")
SED_COMPOSER_JSON_CMD=$(printf 's/"version": "[0-9]*\.[0-9]*\.[0-9]*"/"version": "%s"/' "${VERSION}")

# Update the version in the CommunicatorConfiguration class
sed -i '' "$SED_COMMUNICATOR_CONFIG_CMD" $COMMUNICATOR_CONFIG_CLASS_PATH
# Update the version in the composer.json file
sed -i ''  "$SED_COMPOSER_JSON_CMD" $COMPOSER_JSON_PATH

git add "$COMMUNICATOR_CONFIG_CLASS_PATH" "$COMPOSER_JSON_PATH"
git commit -m "Update version to $VERSION"
git tag -a $TAG -m "Release version $VERSION"

echo "Version updated to $VERSION and tagged in Git."
echo ""
echo "If this was a mistake, you can run"
echo "  git reset --soft HEAD~1"
echo "  git tag -d ${TAG}"

