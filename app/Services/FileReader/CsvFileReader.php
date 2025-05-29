<?php
namespace App\Services\FileReader;
use League\Csv\Reader;

class CsvFileReader implements FileReaderInterface {
    private $path;

    public function setPath(string $path): void {
        $this->path = $path;
    }
    public function readFile():array {
    try {
            $csv = Reader::createFromPath($this->path, 'r');
            $csv->setHeaderOffset(0); // Set the first row as header
            $records = $csv->getRecords(); // Returns an iterator of records
            return iterator_to_array($records);
        } catch (\Exception $e) {
            throw new \RuntimeException("Error reading csv file: " . $e->getMessage(), 0, $e);
        }
    }
}
