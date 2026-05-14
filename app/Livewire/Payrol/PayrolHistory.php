<?php

namespace App\Livewire\Payrol;

use Livewire\Component;
use App\Models\Payroll;
use Livewire\WithPagination;

class PayrolHistory extends Component
{
    use WithPagination;
    public string $filterPeriod = '';

    // Reset ke halaman pertama setiap kali kamu dropdown filter berubah
    public function updatingFilterPeriod()
    {
        $this->resetPage();
    }


    public function render()
    {
        // $query HARUS di-assign ulang - where() memgembalikan instance baru, tidak mengubah query asli
        $query = Payroll::with('employee')->orderBy('created_at', 'desc');

        if ($this->filterPeriod) {
            $query = $query->where('month_year', $this->filterPeriod);
        }

        return view('livewire.payrol.payrol-history', [
            'payrolls' => $query->paginate(10),
            'periods' => PayrolL::select('month_year')->distinct()->orderBy('month_year', 'desc')->pluck('month_year')
        ])->layout('layouts.app');
    }
}
