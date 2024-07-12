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
use Barryvdh\DomPDF\PDF;
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
    // dd($request->all());
    // validation input
    $request->validate([
      'complaint_category_id' => ['required'],
      'reporter_category_id'  => ['required'],
      'title'                 => ['required', 'string'],
      'description'           => ['required', 'string'],
      'date'                  => ['required', 'date'],
      'attachment'            => ['array'],
      'attachment.*'          => ['file', 'mimes:jpg,jpeg,png,gif,webp,mp4,webm,pdf'],
      'reporter_name'         => ['required', 'string'],
      'suspect_name'          => ['required', 'string'],
      'suspect_phone_number'  => ['string'],
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
      'message' => 'Aduan berhasil dikirim',
      'alert'  => 'primary',
      'icon'   => 'bi bi-check2-square',
    ];

    return redirect()->route('complaint.download.view', $complaint->id);
  }

  public function viewDownload($id)
  {
    return view('public.complaint.download', ['id' => $id]);
  }

  public function download($complaintId)
  {
    // Ambil data pengaduan berdasarkan ID
    $complaint = Complaint::find($complaintId);
    $reporter = Reporter::where('complaint_id', $complaintId)->first();
    $suspect = Suspect::where('complaint_id', $complaintId)->first();

    // Periksa apakah data ditemukan
    if (!$complaint || !$reporter || !$suspect) {
      abort(404);
    }

    // Generate PDF
    // compact('complaint', 'reporter', 'suspect')
    $pdf = \PDF::loadView('public.complaint.pdf', compact('complaint', 'reporter', 'suspect'));

    // Unduh PDF
    return $pdf->download("Laporan_Pengaduan_{$complaint->id}.pdf");
  }
}
