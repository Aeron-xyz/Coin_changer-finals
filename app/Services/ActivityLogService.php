<?php

namespace App\Services;

use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Http\Request;

class ActivityLogService
{
    /**
     * Record an activity log entry for the authenticated or given user.
     */
    public function log(
        string $action,
        ?string $description = null,
        ?User $user = null,
        ?Request $request = null
    ): ActivityLog {
        $request ??= request();

        return ActivityLog::create([
            'user_id' => $user?->id ?? auth()->id(),
            'action' => $action,
            'description' => $description,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);
    }
}
