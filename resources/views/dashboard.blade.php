<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="text-2xl font-semibold tracking-tight text-foreground">
                {{ __('Dashboard') }}
            </h2>
            <p class="text-sm text-muted-foreground mt-1">Overview of your payroll system.</p>
        </div>
    </x-slot>

    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4 mb-6">
        <x-ui.stat-card title="Total Karyawan" value="120" icon="users" />
        <x-ui.stat-card title="Total Gaji Bulan Ini" value="Rp 450M" icon="banknotes" />
        <x-ui.stat-card title="Menunggu Approval" value="12" icon="clock" />
        <x-ui.stat-card title="Departemen" value="8" icon="building" />
    </div>

    <div class="grid gap-6 md:grid-cols-2">
        <x-ui.card class="col-span-1">
            <h3 class="text-lg font-medium mb-4">Recent Activity</h3>
            <div class="text-sm text-muted-foreground flex items-center justify-center h-32 border-2 border-dashed border-border rounded-lg">
                No recent activity.
            </div>
        </x-ui.card>
        <x-ui.card class="col-span-1">
            <h3 class="text-lg font-medium mb-4">Quick Actions</h3>
            <div class="flex flex-col gap-3">
                <x-ui.button class="w-full justify-start">
                    Generate Payroll
                </x-ui.button>
                <x-ui.button variant="secondary" class="w-full justify-start">
                    Add Employee
                </x-ui.button>
                <x-ui.button variant="secondary" class="w-full justify-start">
                    View Reports
                </x-ui.button>
            </div>
        </x-ui.card>
    </div>
</x-app-layout>
