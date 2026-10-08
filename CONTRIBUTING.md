# Contributing to NL-Tools

Thank you for your interest in contributing to NL-Tools.

NL-Tools is an open-source PHP Composer package containing reusable utilities for Dutch data formats and conventions. Contributions, bug reports, and suggestions are welcome.

## Getting Started

### Requirements

- PHP 8.5 or higher
- Composer
- Git

### Setup

Clone the repository:

```bash
git clone https://github.com/Djessy-vd/NL-Tools.git
cd NL-Tools
```

Install the dependencies:

```bash
composer install
```

Run the test suite:

```bash
vendor/bin/phpunit
```

All tests should pass before making changes.

## Branches

The `main` branch contains the stable version of the project.

For new features or fixes, create a separate branch:

```bash
git checkout main
git pull
git checkout -b feature/your-feature
```

Use `fix/` for bug fixes:

```bash
git checkout -b fix/your-fix
```

## Making Changes

When adding or changing functionality:

1. Keep changes focused on one feature or fix.
2. Follow the existing project structure and coding style.
3. Add or update PHPUnit tests for your changes.
4. Make sure all tests pass locally.
5. Update the documentation when necessary.
6. Keep commits clear and descriptive.

## Testing

NL-Tools uses PHPUnit for automated testing.

Run the complete test suite with:

```bash
vendor/bin/phpunit
```

Pull requests are also automatically tested through GitHub Actions.

## Pull Requests

Before opening a pull request:

- Make sure all tests pass.
- Make sure your changes are documented where necessary.
- Keep the pull request focused on one feature or fix.
- Provide a clear description of what was changed and why.

Pull requests should target the `main` branch.

## Reporting Bugs

If you find a bug, please open a GitHub issue with:

- A clear description of the problem
- Steps to reproduce it
- The expected behavior
- The actual behavior
- Your PHP version
- Any relevant error messages

For security vulnerabilities, please follow the instructions in [SECURITY.md](SECURITY.md) instead of opening a public issue.

## Code Style

Please follow the existing coding style and naming conventions used throughout the project.

Keep the code simple, readable, and focused on the purpose of the utility.

## License

By contributing to NL-Tools, you agree that your contributions will be licensed under the [MIT License](LICENSE).
