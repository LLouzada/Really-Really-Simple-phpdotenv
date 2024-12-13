<?php

namespace ReallyReallySimplePhpDotenv;

class RRSDotenv
{
    public static function load($filePath)
    {
        $dotenvPath = rtrim($filePath, '/') . '/.env';
        if (!is_file($dotenvPath) || !is_readable($dotenvPath)) {
            return;
        }

        // Verify file permissions (must be <= 0644)
        $permissions = substr(sprintf('%o', fileperms($dotenvPath)), -4);
        if (octdec($permissions) > octdec('0644')) {
            throw new \RuntimeException("The .env file permissions must be <= 0644. Current permissions: $permissions");
        }

        $handle = fopen($dotenvPath, 'r');
        if (!$handle) {
            return;
        }

        while (($line = fgets($handle)) !== false) {
            $line = trim($line);

            // Ignorare empty lines and comments
            if ($line === '' || $line[0] === '#') {
                continue;
            }

            // Verify key=value format
            $parts = explode('=', $line, 2);
            if (count($parts) !== 2) {
                continue;
            }

            $key = trim($parts[0]);
            $value = trim($parts[1]);

            // Validate key format
            if (!preg_match('/^[A-Z0-9_]+$/i', $key)) {
                throw new \RuntimeException("Invalid key format in .env file: $key");
            }

            // Remove doubles quotes or single quotes
            if ((substr($value, 0, 1) === '"' && substr($value, -1) === '"') ||
                (substr($value, 0, 1) === "'" && substr($value, -1) === "'")
            ) {
                $value = substr($value, 1, -1);
            }

            // Set environment variables
            if (!isset($_ENV[$key]) && !isset($_SERVER[$key])) {
                putenv($key . '=' . $value);
                $_ENV[$key] = $value;
                $_SERVER[$key] = $value;
            }
        }

        fclose($handle);
    }
}
