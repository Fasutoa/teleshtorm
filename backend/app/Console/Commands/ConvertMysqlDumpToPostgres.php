<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ConvertMysqlDumpToPostgres extends Command
{
    protected $signature = 'convert:mysql-to-pg {input} {output}';
    protected $description = 'Конвертировать MySQL dump в PostgreSQL dump';

    public function handle()
    {
        $inputFile = $this->argument('input');
        $outputFile = $this->argument('output');

        if (!file_exists($inputFile)) {
            $this->error("Файл {$inputFile} не найден.");
            return 1;
        }

        $out = fopen($outputFile, 'w');
        if (!$out) {
            $this->error("Не удалось открыть файл для записи: {$outputFile}");
            return 1;
        }

        foreach ($this->readLines($inputFile) as $line) {
            $line = $this->convertLine($line);
            fwrite($out, $line);
        }

        fclose($out);

        $this->info("Конвертация завершена. Новый файл: {$outputFile}");
        return 0;
    }

    // Генератор для построчного чтения
    private function readLines(string $file)
    {
        $handle = fopen($file, 'r');
        if (!$handle) {
            throw new \RuntimeException("Не удалось открыть файл: {$file}");
        }

        while (($line = fgets($handle)) !== false) {
            yield $line;
        }

        fclose($handle);
    }

    // Функция для конвертации одной строки
    private function convertLine(string $line): string
    {
        $replacements = [
            '/TINYINT\(1\)/i' => 'BOOLEAN',
            '/TINYINT\b/i' => 'SMALLINT',
            '/MEDIUMINT\b/i' => 'INTEGER',
            '/INT\(\d+\)/i' => 'INTEGER',
            '/BIGINT\b/i' => 'BIGINT',
            '/DECIMAL\((\d+),(\d+)\)/i' => 'NUMERIC($1,$2)',
            '/DATETIME\b/i' => 'TIMESTAMP',
            '/ENUM\(([^)]+)\)/i' => 'TEXT CHECK ($1)',
            '/SET\(([^)]+)\)/i' => 'TEXT',
            '/BIGINT AUTO_INCREMENT/i' => 'BIGSERIAL',
            '/INT AUTO_INCREMENT/i' => 'SERIAL',
            '/`([^`]*)`/' => '"$1"',
            '/UNSIGNED/i' => '',
            '/ENGINE=\w+\s*DEFAULT CHARSET=\w+/i' => '',
        ];

        foreach ($replacements as $pattern => $replace) {
            $line = preg_replace($pattern, $replace, $line);
        }

        return $line;
    }
}
