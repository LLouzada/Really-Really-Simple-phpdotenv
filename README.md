# Really Really Simple PHP Dotenv

## Installation

- Assuming you have [Composer](https://getcomposer.org/) installed, just add the following to your `composer.json` file:
  ```json
  
    "require": {
        "llouzada/really-really-simple-phpdotenv": "^0.1.1"
    },
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/llouzada/really-really-simple-phpdotenv.git"
        }
    ]
  ```

## Usage

- Create a `.env` file in your project root and add your environment variables.
- Use the `Dotenv` class to load the `.env` file and access the environment variables.
  ```php
  require_once APP_ROOT . '/vendor/autoload.php';

  RRSDotenv::load(APP_ROOT);

  echo getenv('APP_NAME');
  ```


