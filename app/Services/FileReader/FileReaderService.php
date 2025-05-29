<?php
namespace App\Services\FileReader;
use App\Services\FileReader\FileReaderInterface;
use Faker\Core\File;
use Illuminate\Support\Facades\Log;

class FileReaderService {
    // private string $fileReaderClass = null;
    // private $fileTypes = [
    //     'csv' => CsvFileReader::class,
    //     'json' => JsonFileReader::class,
    // ];
    private $type;
    private $path;
    public function __construct(string $type, string $path){
        // $this->fileReaderClass = $this->fileTypes[$type] ?? null;
        $this->type = $type;
        $this->path = $path;
    }
    public function readFile(): array {
        $fileReader = FileReaderFactory::create($this->type);
        // $reader = new $this->fileReaderClass();
        $fileReader->setPath($this->path);
        return $fileReader->readFile();
    }
}
