<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StatusBadge extends Component
{
    public function __construct(public string $status)
    {
    }

    public function render(): View|Closure|string
    {
        $isActive = strcasecmp($this->status, 'Aktif') === 0;

        $class = $isActive
            ? 'bg-emerald-100 text-emerald-700'
            : 'bg-amber-100 text-amber-700';

        return view('components.status-badge', [
            'status' => $this->status,
            'class' => $class,
        ]);
    }
}
