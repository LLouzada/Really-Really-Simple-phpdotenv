<div align="center">
  <img src="https://github.com/llouzada/really-really-simple-phpdotenv/blob/main/assets/rrsdotenv-logo.webp" width=400">
</div>

# Really Really Simple PHP Dotenv

## Description

This package is a simple dotenv loader designed to support older PHP versions (5.3+). It enables loading environment variables from a `.env` file into the global `$_ENV` and `getenv()` functions, making it easier to manage environment configurations for legacy systems.

## Compatibility

- **PHP:** Tested from version 5.3 to 8.3.
- **Composer:** Requires Composer to manage dependencies.

## Installation

1. Ensure you have [Composer](https://getcomposer.org/) installed on your system.
2. Add the package to your `composer.json` file:
   ```json
   {
       "require": {
           "llouzada/really-really-simple-phpdotenv": "^0.1.1"
       },
       "repositories": [
           {
               "type": "vcs",
               "url": "https://github.com/llouzada/really-really-simple-phpdotenv.git"
           }
       ]
   }

3. Run composer install to install the package.

## Usage

1. Create a `.env` file in the root of your project and add your environment variables:
   ```makefile
   APP_NAME="Really Really Simple PHP Dotenv"
   APP_ENV=local
   APP_DEBUG=true

2. Load the `.env` file using the RRSDotenv class by passing the path to the directory containing the `.env` file as an argument 
   ```php
   require_once APP_ROOT . '/vendor/autoload.php';

   RRSDotenv::load(APP_ROOT);

   echo getenv('APP_NAME'); // Output: Really Really Simple PHP Dotenv

## License

This package is licensed under the [MIT License](https://mit-license.org/). See the LICENSE file for more details.

## Support

If you need support or have any questions, please open an issue on the GitHub repository or contact me directly at loumad.soft@gmail.com. Contributions are also welcome! Feel free to submit pull requests (PRs) to improve or enhance the project.

## Changelog

### 0.1.1
  
- Fixed minor bugs and improved compatibility with legacy PHP versions.
- Updated documentation.

### 0.1.0
  
- Initial release of the package.

<div align="center">
  <h1>Happy Coding 🚀</h1>
</div>

