<?php

namespace App\Console\Commands;

use App\Models\ZipCode;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;

class ImportZipCodes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:zip-codes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->info('Importing zip codes...');

        $filePath = public_path('zip_codes/CPdescarga.txt');

        if (!File::exists($filePath)) {
            $this->error('File not found');
            return;
        }

        $this->line('File founded...');

        $contentTxt = new \SplFileObject($filePath);

        $columnNames = [];
        foreach ($contentTxt as $index => $line) {

            if ($index == 0) {
                continue;
            }

            $this->line('Processing line: ' . $index);

            if ($index == 1) {
                $columnNames = explode('|',  Arr::get($line, 0));
                continue;
            }

            $zipCodeValues = $this->filterOrSanitizeValues($line);

            dd($zipCodeValues, $line);

            $lineItem = array_combine($columnNames, $zipCodeValues);

            try {
                ZipCode::create($lineItem);
            } catch (\Exception $e) {
                $this->error($e->getMessage());
            }
        }
    }

    protected function filterOrSanitizeValues($line)
    {
        $arr = explode('|',  Arr::get($line, 0));

        $filtered = [];
        foreach ($arr as $key => $value) {
            $filtered[$key] = utf8_encode($value);
        }

        return $filtered;
    }
}
