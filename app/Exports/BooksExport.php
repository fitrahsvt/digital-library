<?php

namespace App\Exports;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BooksExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Book::select('id', 'title', 'description', 'amount')
        ->addSelect(['category_name' => Category::select('name')->whereColumn('categories.id', 'category_id')])
        ->addSelect(['created_by' => User::select('name')->whereColumn('users.id', 'created_by')])
        ->get();
    }

    public function headings(): array{
        return ["ID", "JUDUL", "DESKRIPSI", "JUMLAH HALAMAN", "KATEGORI", "DIBUAT OLEH"];
    }
}
