<?php 
namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Model\Product;

class SampleProducts implements FromCollection, WithHeadings
{
    use Exportable;

    private $data;
 
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return collect([]);
    }

    public function headings(): array
    {
        return $this->data;
    }
}