# [1.2.0](https://github.com/PAYONE-GmbH/PCP-ServerSDK-php/compare/v1.0.1...v1.2.0) (2025-05-26)
### Bug Fixes
* fix: add missing description tag in AvsResult documentation ([c531b34d9e0387c5ed536353b0536a5aa5949a2f](https://github.com/PAYONE-GmbH/PCP-ServerSDK-php/commit/c531b34d9e0387c5ed536353b0536a5aa5949a2f))
* fix: format AVS result descriptions for better readability ([d07830248e7f7f4dc7b886bf6357292e9ed33fca](https://github.com/PAYONE-GmbH/PCP-ServerSDK-php/commit/d07830248e7f7f4dc7b886bf6357292e9ed33fca))
### Documentation
* docs: enhance documentation for category field in APIError model ([f781a11a6269e2d16708e549ec761e3acbe89d9f](https://github.com/PAYONE-GmbH/PCP-ServerSDK-php/commit/f781a11a6269e2d16708e549ec761e3acbe89d9f))
* docs: improve documentation for taxAmountPerUnit field in OrderLineDetailsInput ([c8347edd32c19123bc21385578327e1d6431ad0c](https://github.com/PAYONE-GmbH/PCP-ServerSDK-php/commit/c8347edd32c19123bc21385578327e1d6431ad0c))
* docs: improve documentation formatting across multiple model files ([a83642018ee5eae11014a148e44c27ffe1aab56e](https://github.com/PAYONE-GmbH/PCP-ServerSDK-php/commit/a83642018ee5eae11014a148e44c27ffe1aab56e))
* docs: update README to include new payment methods and their parameters ([0312ec9b91f28f3c9579a219e7816c5dd22fd154](https://github.com/PAYONE-GmbH/PCP-ServerSDK-php/commit/0312ec9b91f28f3c9579a219e7816c5dd22fd154))
### Features
* feat: add BusinessRelation enum and update Customer model to use it ([d045ec530e714c6548cf953319295d968282daa2](https://github.com/PAYONE-GmbH/PCP-ServerSDK-php/commit/d045ec530e714c6548cf953319295d968282daa2))
* feat: add CustomerAccount model and integrate it into Customer class ([5a2ff5448daa4abb923f77818bb693e86d391ef9](https://github.com/PAYONE-GmbH/PCP-ServerSDK-php/commit/5a2ff5448daa4abb923f77818bb693e86d391ef9))
* feat: add fraudNetId property and corresponding getters/setters to RedirectPaymentProduct840SpecificInput ([38b3ac4aff99c5340992b67487fd52d1ee00090f](https://github.com/PAYONE-GmbH/PCP-ServerSDK-php/commit/38b3ac4aff99c5340992b67487fd52d1ee00090f))
* feat: add RecurringPaymentSequenceIndicator enum and update CardRecurrenceDetails to use it ([18c20b6edafd7f1b39760f43ddcabd9380c812a6](https://github.com/PAYONE-GmbH/PCP-ServerSDK-php/commit/18c20b6edafd7f1b39760f43ddcabd9380c812a6))
* feat: add SerializedName annotations and improve property types in payment models ([e9c48160619fe9209736e13835d904e4cb40cf3e](https://github.com/PAYONE-GmbH/PCP-ServerSDK-php/commit/e9c48160619fe9209736e13835d904e4cb40cf3e))
* feat: implement api version 1.28.0 ([cd315b09555c227507e8938a23e1cc15ea432d0b](https://github.com/PAYONE-GmbH/PCP-ServerSDK-php/commit/cd315b09555c227507e8938a23e1cc15ea432d0b))
* feat: introduce ActionType enum and update MerchantAction to use it ([24e44c0547904134d3c6636290be32bd9cc6596a](https://github.com/PAYONE-GmbH/PCP-ServerSDK-php/commit/24e44c0547904134d3c6636290be32bd9cc6596a))
* feat: introduce AvsResult enum and update CardFraudResults to use it ([6681a4cee365c705ad6448702d1c9809fa8b75ff](https://github.com/PAYONE-GmbH/PCP-ServerSDK-php/commit/6681a4cee365c705ad6448702d1c9809fa8b75ff))
* feat: update DemoApp to use BusinessRelation enum and add bic field to BankAccountInformation ([bd7338318e2c77509b52b2e338fb4c90ba845e40](https://github.com/PAYONE-GmbH/PCP-ServerSDK-php/commit/bd7338318e2c77509b52b2e338fb4c90ba845e40))
* feat: update merchantAction instantiation to use ActionType enum in PaymentExecutionApiClientTest ([6717183e4166b56b2ad97dd97d4ec505c8505ee3](https://github.com/PAYONE-GmbH/PCP-ServerSDK-php/commit/6717183e4166b56b2ad97dd97d4ec505c8505ee3))
* feat: update payment models to add taxAmountPerUnit parameter ([261cfcfcc738781820b88e9eed141efcd787a5aa](https://github.com/PAYONE-GmbH/PCP-ServerSDK-php/commit/261cfcfcc738781820b88e9eed141efcd787a5aa))
# [1.1.0](https://github.com/PAYONE-GmbH/PCP-ServerSDK-php/compare/v1.28.0...v1.1.0) (2025-03-13)

### Features

- feat: implement api version 1.28.0 ([cd315b09555c227507e8938a23e1cc15ea432d0b](https://github.com/PAYONE-GmbH/PCP-ServerSDK-php/commit/cd315b09555c227507e8938a23e1cc15ea432d0b))

## [1.0.1](https://github.com/PAYONE-GmbH/PCP-ServerSDK-php/compare/v1.0.0...v1.0.1) (2024-12-12)

# [1.0.0](https://github.com/PAYONE-GmbH/PCP-ServerSDK-php/compare/v0.1.0...v1.0.0) (2024-08-22)

### Features

- feat: provide updated api endpoints when calling getPredefinedHosts() ([3927c7eafe34b2ac9fb66dcecd9869b5dad644c8](https://github.com/PAYONE-GmbH/PCP-ServerSDK-php/commit/3927c7eafe34b2ac9fb66dcecd9869b5dad644c8))

### BREAKING CHANGE

- When the host for CommunicatorConfiguration is provided
  `getPredefinedHosts()` it now points to a different url

# [0.1.0](https://github.com/PAYONE-GmbH/PCP-ServerSDK-php/compare/f7fc619bdc3a01a86a4d29d23946fa29d520fa31...v0.1.0) (2024-08-09)

### Bug Fixes

- fix: allow nullables to be compatible with api responses ([3d505149080ad09d1b9fe8eaa5a20928e5531bff](https://github.com/PAYONE-GmbH/PCP-ServerSDK-php/commit/3d505149080ad09d1b9fe8eaa5a20928e5531bff))
- fix: autoloading should be done by the consumer of the sdk ([eed5c914b0c041feea91e4865fbf2fd1c18e4dca](https://github.com/PAYONE-GmbH/PCP-ServerSDK-php/commit/eed5c914b0c041feea91e4865fbf2fd1c18e4dca))
- fix(communicator-configuration): ensure that not trailing slash is contained in host ([127ac40921a365f8701a8d70a5a0052b99223da7](https://github.com/PAYONE-GmbH/PCP-ServerSDK-php/commit/127ac40921a365f8701a8d70a5a0052b99223da7))
- fix: DateTime should be handle as time and not as an instance of DateTime class ([3e39d3420519dfc61d444675fa36aa89b53316de](https://github.com/PAYONE-GmbH/PCP-ServerSDK-php/commit/3e39d3420519dfc61d444675fa36aa89b53316de))
- fix(deserialization): recursive deserialization of array properties should result in actual objects ([7a57b9fed03efd89542b7cdf99d0193725c86aa5](https://github.com/PAYONE-GmbH/PCP-ServerSDK-php/commit/7a57b9fed03efd89542b7cdf99d0193725c86aa5))
- fix: handle json erros from symfony/serialize ([7702963832e3863abd0480449ccb583089fbd450](https://github.com/PAYONE-GmbH/PCP-ServerSDK-php/commit/7702963832e3863abd0480449ccb583089fbd450))
- fix: make optional properties nullable ([c5175b9d6a08eee2cea43972a322de473e3ce8c1](https://github.com/PAYONE-GmbH/PCP-ServerSDK-php/commit/c5175b9d6a08eee2cea43972a322de473e3ce8c1))
- fix: make properties optional as this is needed for responses ([b3f92a372c4ae27f4dc91d5171f4ef1c112e98ff](https://github.com/PAYONE-GmbH/PCP-ServerSDK-php/commit/b3f92a372c4ae27f4dc91d5171f4ef1c112e98ff))
- fix: mark optional properties as nullable ([789ca9a4f0cf44bdb697f039dd9f6dcd2b4e8836](https://github.com/PAYONE-GmbH/PCP-ServerSDK-php/commit/789ca9a4f0cf44bdb697f039dd9f6dcd2b4e8836))
- fix: only convert empty objects to '{}' not any array ([06baccaf5baf0a18b611d32cd80f092391cc113e](https://github.com/PAYONE-GmbH/PCP-ServerSDK-php/commit/06baccaf5baf0a18b611d32cd80f092391cc113e))
- fix: parsing error is thrown by symfony and must be handled ([392e57fbf9b40797ffc38c904670d45e67a13850](https://github.com/PAYONE-GmbH/PCP-ServerSDK-php/commit/392e57fbf9b40797ffc38c904670d45e67a13850))
- fix: serialize empty objects to '{}', add more extensive error information ([8bed1f5d9e3a6df96bb00c3484f15385877c8cb8](https://github.com/PAYONE-GmbH/PCP-ServerSDK-php/commit/8bed1f5d9e3a6df96bb00c3484f15385877c8cb8))
- fix: type error in call to makeApiCall, toQueryMap should be public ([2f750188f321495b22e928cfbd5d897d5eff2907](https://github.com/PAYONE-GmbH/PCP-ServerSDK-php/commit/2f750188f321495b22e928cfbd5d897d5eff2907))
- fix: typo in script name ([60626a18497b5c0f5ecf1fc5bf0ad1f3b51b8b25](https://github.com/PAYONE-GmbH/PCP-ServerSDK-php/commit/60626a18497b5c0f5ecf1fc5bf0ad1f3b51b8b25))
- fix: update out of date type annotations ([212d64efbff7b6b892d52babd2031b7ce83893c3](https://github.com/PAYONE-GmbH/PCP-ServerSDK-php/commit/212d64efbff7b6b892d52babd2031b7ce83893c3))
- fix: use correct type annotations in @var comments ([e5b09b353720f7130f1f4038fc340ca25e688b13](https://github.com/PAYONE-GmbH/PCP-ServerSDK-php/commit/e5b09b353720f7130f1f4038fc340ca25e688b13))
- fix: use string id as specified by the type ([7bce549e716d4dcf7b5675707dc2c76c608cabef](https://github.com/PAYONE-GmbH/PCP-ServerSDK-php/commit/7bce549e716d4dcf7b5675707dc2c76c608cabef))
- fix: wrap customer object to match expected json of the pcp api ([0fac63f9483ef7de278bb3c1772782dd76668b3f](https://github.com/PAYONE-GmbH/PCP-ServerSDK-php/commit/0fac63f9483ef7de278bb3c1772782dd76668b3f))

### Documentation

- docs: explain release flow and installation process from github via composer ([d864f9c8ed1fe96c9b67438c9e8f29fa67f3760b](https://github.com/PAYONE-GmbH/PCP-ServerSDK-php/commit/d864f9c8ed1fe96c9b67438c9e8f29fa67f3760b))

### Features

- feat: add helper function to convert apple pay response into PCP models ([1d7d32d26ea21c31afbe70c9fa5383804863093e](https://github.com/PAYONE-GmbH/PCP-ServerSDK-php/commit/1d7d32d26ea21c31afbe70c9fa5383804863093e))
- feat: add models for client side responses from apple pay ([24aad56e0380851d568369024b5e88a3de5b023e](https://github.com/PAYONE-GmbH/PCP-ServerSDK-php/commit/24aad56e0380851d568369024b5e88a3de5b023e))
- feat: expose serialization functions on api client instances, make serializer itsself unaccessible ([579631c347232a60f91b0d5da8da1981236ab625](https://github.com/PAYONE-GmbH/PCP-ServerSDK-php/commit/579631c347232a60f91b0d5da8da1981236ab625))
- feature(models): make properties optional to avoid exceptions when receiving response ([90d6d01b5a7227ceafcfe72d740c7d74c12c4c0f](https://github.com/PAYONE-GmbH/PCP-ServerSDK-php/commit/90d6d01b5a7227ceafcfe72d740c7d74c12c4c0f))
- feat: rename models to use correct product 302 for apple pay, make apple pay data structures defined by PCP api explicit in name ([29d7a0adb648af96bc7f7516dc5f5a7e941a0cd9](https://github.com/PAYONE-GmbH/PCP-ServerSDK-php/commit/29d7a0adb648af96bc7f7516dc5f5a7e941a0cd9))
- feat: serialization should be done via static methods as its state independent ([e61b08d426754127ab3b680ebed7c8c3ed9de47e](https://github.com/PAYONE-GmbH/PCP-ServerSDK-php/commit/e61b08d426754127ab3b680ebed7c8c3ed9de47e))
- feat: setup ci based sonarcloud scan to allow granular configuration and support for test coverage ([300a1fab78b156a893e2eb490332319ae07c6f39](https://github.com/PAYONE-GmbH/PCP-ServerSDK-php/commit/300a1fab78b156a893e2eb490332319ae07c6f39))
