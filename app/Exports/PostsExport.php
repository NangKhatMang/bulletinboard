<?php

namespace App\Exports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PostsExport implements FromCollection, WithHeadings
{
    public function headings(): array {
        return [
           "Post Title","Post Description","Posted User","Posted Date"
        ];
      }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Post::select('title', 'description', 'create_user_id', 'created_at')->get();
    }
}
