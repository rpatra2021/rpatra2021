<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttachmentFiles extends Model
{
    protected $table = "tbl_attachments";
    
    protected $fillable = [
        /** All string except file_size is integer length 8 */
        "file_original_name", "file_unique_name", "mime_type", "file_size", "file_extension"
    ];

}
