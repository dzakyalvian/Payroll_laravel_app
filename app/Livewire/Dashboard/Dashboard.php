<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use App\Models\Payroll;

class Dashboard extends Component
{
    public function render()
    {
        //Gunakan kolom month_year (bukan created_at) agar filter periode konsisten
        $periodeBulanini = \Carbon\Carbon::now()->locale('id')->isoFormat('MMMM YYYY');

        return view('livewire.dashboard.dashboard',
        [
            'totalKaryawan' => Employee::count(),
            'totalGaji' => Payroll::where('month_year', $periodeBulanini)->sum('net_salary'),

        ])->layout('layouts.app');
    }
}
