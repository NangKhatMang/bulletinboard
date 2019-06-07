<?php

namespace App\Exports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PostsExport implements FromCollection, WithHeadings
{
    public function headings(): array {
        return [
           "Post ID",
           "Post Title",
           "Post Description",
           "Post Status",
           "Created User ID",
           "Updated User ID",
           "Deleted User ID",
           "Created At",
           "Updated At",
           "Deleted At"
        ];
      }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Post::all();
    }
}
