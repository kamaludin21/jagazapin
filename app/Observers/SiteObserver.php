<?php

namespace App\Observers;

use App\Models\Site;
use Illuminate\Support\Facades\Storage;

class SiteObserver
{
    /**
     * Handle the Site "created" event.
     */
    public function created(Site $site): void
    {
        //
    }

    /**
     * Handle the Site "updated" event.
     */
    public function updated(Site $site): void
    {
        if ($site->isDirty('logo')) {
            $oldLogos = $site->getOriginal('logo'); // Nilai asli dari 'logo'
            $newLogos = $site->logo; // Nilai baru dari 'logo'
    
            // Pastikan kedua variabel adalah array
            if (is_array($oldLogos) && is_array($newLogos)) {
                // Cari item yang ada di $oldLogos tapi tidak ada di $newLogos
                $logosToDelete = array_diff($oldLogos, $newLogos);
    
                // Hapus setiap item yang ditemukan
                foreach ($logosToDelete as $item) {
                    Storage::disk('public')->delete($item);
                }
            }
        }

        if ($site->isDirty('favicon')) {
            Storage::disk('public')->delete($site->getOriginal('favicon'));
        }

        if ($site->isDirty('medsos')) {
            $oldMedsos = $site->getOriginal('medsos'); // Nilai asli dari 'logo'
            $newMedsos = $site->logo; // Nilai baru dari 'logo'
    
            // Pastikan kedua variabel adalah array
            if (is_array($oldMedsos) && is_array($newMedsos)) {
                // Cari item yang ada di $oldMedsos tapi tidak ada di $newMedsos
                $medsosToDelete = array_diff($oldMedsos, $newMedsos);
    
                // Hapus setiap item yang ditemukan
                foreach ($medsosToDelete as $item) {
                    Storage::disk('public')->delete($item);
                }
            }
        }
    }

    /**
     * Handle the Site "deleted" event.
     */
    public function deleted(Site $site): void
    {
        //
    }

    /**
     * Handle the Site "restored" event.
     */
    public function restored(Site $site): void
    {
        //
    }

    /**
     * Handle the Site "force deleted" event.
     */
    public function forceDeleted(Site $site): void
    {
        //
    }
}