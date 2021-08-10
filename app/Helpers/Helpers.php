<?php

use App\Models\AttachmentFiles;

if (! function_exists('test_helper')) {
    function test_helper()
    {
        return "Working";
    }
}

/** Start of the helper functions used inside project */

if(!function_exists("add_slash_url_end")) {
    function add_slash_url_end($url) {
        if (substr($url, -1) != "/") {
            $url = $url . "/";
        }
        return $url;
    }
} //working

if (! function_exists('save_attachment_files')) {
    function save_attachment_files($file)
    {
        try {
            $fileUniqueName = time() . "_" . str_random(6) . '.' . $file->getClientOriginalExtension();
            $Attachments = new AttachmentFiles();
            $Attachments->file_original_name = $file->getClientOriginalName();
            $Attachments->file_unique_name = $fileUniqueName;
            $Attachments->mime_type = $file->getClientMimeType();
            $Attachments->file_size = $file->getSize();
            $Attachments->file_extension = $file->getClientOriginalExtension();
            $Attachments->save();
            $file->move(public_path(ATTACHMENT_FILE_PATH), $fileOriginalName);
            return $Attachments;
        } catch (Exception $e) {
            return null;
        }
    }
}

