<?php
namespace App\Services\FileReader;
use App\Services\FileReader\FileReaderInterface;
use App\Services\FileReader\CsvFileReader;
use App\Services\FileReader\JsonFileReader;
use InvalidArgumentException;

class FileReaderFactory {
    public static function create(string $type): FileReaderInterface {
        return match ($type) {
        'csv' => new CsvFileReader(),
        'json' => new JsonFileReader(),
        default => throw new InvalidArgumentException("Unsupported file type: {$type}"),
        };
    }
}
