<?php
namespace App\Services\FileReader;
interface FileReaderInterface {
    public function readFile(): array;
    public function setPath(string $path): void;
}
