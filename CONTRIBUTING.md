# Contributing to the PAYONE Commerce Platform PHP SDK

Thank you for considering contributing to the PAYONE Commerce Platform PHP SDK! We appreciate your efforts to help improve this project. Below are guidelines for contributing.

## How to Contribute

### Pull Requests

We welcome pull requests! Please follow these steps to submit one:

1. **Fork** the repository and create your branch from `main`.
2. **Install** any dependencies and ensure the project builds and passes tests.

   ```bash
   composer install
   composer dumb-autoload
   ```

3. **Develop** your changes.
4. **Test** your changes thoroughly.
   ```bash
   composer run-script test
   # or for coverage
   composer run-script coverage-report
   ```
5. **Write** clear, concise, and self-explanatory commit messages.
6. **Open** a pull request with a clear title and description of what your change does.
7. **Ensure** your pull request follows the [style guides](#style-guides).

### Reporting Bugs

If you encounter any bugs, please report them using one of the following methods:

1. **Issue Tracker**: Submit an issue through our [issues tracker](https://github.com/PAYONE-GmbH/PCP-ServerSDK-php/issues/new).
2. **Security Issues**: For security-related issues, please contact our IT support via email at tech.support@payone.com with a clear subject line indicating that it is a security issue. This ensures that the issue will be visible to and handled by the PAYONE tech support team.

## Style Guides

### Code Style

Please ensure that you follow the coding standards. You can use `composer run-script lint` to check for potential errors with `phpstan`. Use `composer run-script format` to ensure you're code is formatted consistently.
