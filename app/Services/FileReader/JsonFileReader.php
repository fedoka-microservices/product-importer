<?php
namespace App\Services\FileReader;
use App\Services\FileReader\FileReaderInterface;

class JsonFileReader implements FileReaderInterface {
    private $path;

    public function setPath(string $path): void {
        $this->path = $path;
    }

    public function readFile(): array {
        try {
            $jsonContent = file_get_contents($this->path);
            if ($jsonContent === false) {
                throw new \Exception("Could not read file: " . $this->path);
            }
            $data = json_decode($jsonContent, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new \Exception("JSON decode error: " . json_last_error_msg());
            }
            return $data;
        } catch (\Exception $e) {
            throw new \RuntimeException("Error reading JSON file: " . $e->getMessage(), 0, $e);
        }
    }
}
