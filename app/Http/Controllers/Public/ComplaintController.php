<?php

namespace App\Http\Controllers\Public;

use App\Models\Suspect;
use App\Models\Reporter;
use App\Models\Complaint;
use Illuminate\Http\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ReporterCategory;
use App\Models\ComplaintCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ComplaintController extends Controller
{
    public function create()
    {
        $data['complaintCategory'] = ComplaintCategory::show()->orderBy('title')->get();
        $data['reporterCategory'] = ReporterCategory::show()->orderBy('title')->get();
        return view('public.complaint.create', $data);
    }

    public function store(Request $request)
    {
        // validation input
        $request->validate([
            'complaint_category_id' => ['required'],
            'reporter_category_id'  => ['required'],
            'title'                 => ['required', 'string'],
            'description'           => ['required', 'string'],
            'date'                  => ['required', 'date'],
            'attachment'            => ['required', 'array'],
            'attachment.*'          => ['required', 'file', 'mimes:jpg,jpeg,png,gif,webp,mp4,webm,pdf'],
            'reporter_name'         => ['required', 'string'],
            'reporter_phone_number' => ['numeric'],
            'reporter_email'        => ['email'],
            'suspect_name'          => ['required', 'string'],
            'suspect_phone_number'  => ['numeric'],
            'suspect_email'         => ['email'],
        ]);

        // store and modification file
        $attachmentPaths = [];
        if ($request->hasFile('attachment')) {
            foreach ($request->file('attachment') as $file) {
                $path = 'attachment/' . now()->format('Y/m');
                $filename = Str::random(32) . '.' . $file->getClientOriginalExtension();
                $storedPath = Storage::putFileAs($path, new File($file), $filename);
                $attachmentPaths[] = $storedPath;
            }
        }

        // insert data to tabel 
        $complaint = Complaint::create([
            'complaint_category_id' => $request->complaint_category_id,
            'token' => Str::random(10),
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'location' => $request->location,
            'attachment' => $attachmentPaths,
        ]);

        Reporter::create([
            'complaint_id' => $complaint->id,
            'reporter_category_id' => $request->reporter_category_id,
            'name' => $request->reporter_name,
            'phone_number' => $request->reporter_phone_number,
            'email' => $request->reporter_email,
            'address' => $request->reporter_address,
        ]);

        Suspect::create([
            'complaint_id' => $complaint->id,
            'name' => $request->suspect_name,
            'phone_number' => $request->suspect_phone_number,
            'email' => $request->suspect_email,
            'address' => $request->suspect_address,
        ]);

        $flashData = [
            'message'               => 'Aduan berhasil dikirim',
            'alert'                 => 'primary',
            'icon'                  => 'bi bi-check2-square',
        ];

        return redirect()->route('complaint.create')->with($flashData);
    }
}
