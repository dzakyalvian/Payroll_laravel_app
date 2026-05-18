<!-- Bungkus komponen dalam satu root element -->
<div>

<!-- ✅ Flash Message Notifikasi Sukses -->
@if (session()->has('success'))
    <div class="max-w-7xl mx-auto px-4 pt-4">
        <div class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-500 px-4 py-3 rounded-lg flex items-center gap-2">
            <x-ui.icon name="check" class="w-5 h-5" />
            <span>{{ session('success') }}</span>
        </div>
    </div>
@endif

<div class="max-w-7xl mx-auto px-4 grid grid-cols-1 lg:grid-cols-3 gap-8 py-8">

    <!-- KOLOM KIRI: Form Tambah Karyawan -->
    <x-ui.card class="lg:col-span-1 h-fit border border-border">
        <!-- Judul Form Berubah Sesuai State (Reaktif) -->
        <h3 class="text-base font-semibold text-foreground mb-4">
            {{ $isEditMode ? 'Edit Karyawan' : 'Karyawan Baru' }}
        </h3>

        <!-- Submit form dikaitkan dengan fungsi "store" -->
        <form wire:submit="store">
            <div class="mb-4">
                <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-2">Nama Lengkap</label>
                <input type="text" wire:model.blur="name" class="mt-1 block w-full rounded-lg bg-background border border-border text-foreground focus:border-primary focus:ring-2 focus:ring-primary/10 focus:outline-none p-2.5 text-sm">
                @error('name') <span class="text-xs text-destructive mt-1 block">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-2">Nomor Induk / NIK</label>
                <input type="text" wire:model.blur="nik" class="mt-1 block w-full rounded-lg bg-background border border-border text-foreground focus:border-primary focus:ring-2 focus:ring-primary/10 focus:outline-none p-2.5 text-sm">
                @error('nik') <span class="text-xs text-destructive mt-1 block">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-2">No. Telepon</label>
                <input type="text" wire:model.blur="phone" class="mt-1 block w-full rounded-lg bg-background border border-border text-foreground focus:border-primary focus:ring-2 focus:ring-primary/10 focus:outline-none p-2.5 text-sm" placeholder="Contoh: 08123456789">
                @error('phone') <span class="text-xs text-destructive mt-1 block">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-2">Jabatan</label>
                <select wire:model="position" class="mt-1 block w-full rounded-lg bg-background border border-border text-foreground focus:border-primary focus:ring-2 focus:ring-primary/10 focus:outline-none p-2.5 text-sm">
                    <option value="" class="bg-card">-- Pilih Jabatan --</option>
                    <option value="Staff IT" class="bg-card">Staff IT</option>
                    <option value="HRD / Personalia" class="bg-card">HRD / Personalia</option>
                    <option value="Keuangan" class="bg-card">Keuangan</option>
                </select>
                @error('position') <span class="text-xs text-destructive mt-1 block">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-2">Alamat</label>
                <textarea wire:model.blur="address" class="mt-1 block w-full rounded-lg bg-background border border-border text-foreground focus:border-primary focus:ring-2 focus:ring-primary/10 focus:outline-none p-2.5 text-sm" rows="3" placeholder="Masukkan alamat lengkap"></textarea>
                @error('address') <span class="text-xs text-destructive mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div class="flex gap-2">
                <button type="submit"
                    wire:loading.attr="disabled"
                    class="flex-1 bg-primary text-primary-foreground font-semibold py-2.5 rounded-lg shadow-sm hover:bg-primary/90 disabled:opacity-50 transition-colors focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 focus:ring-offset-background text-sm flex items-center justify-center gap-1.5">
                    <x-ui.icon name="save" class="w-4 h-4" />
                    <span wire:loading.remove>Simpan</span>
                    <span wire:loading>Menyimpan...</span>
                </button>
                
                <!-- Tampilkan tombol Batal HANYA saat Mode Edit menyala -->
                @if($isEditMode)
                    <button type="button" wire:click="resetForm" class="flex-1 bg-secondary text-secondary-foreground font-semibold py-2.5 rounded-lg hover:bg-secondary/80 transition-colors text-sm">Batal</button>
                @endif
            </div>
        </form>
    </x-ui.card>

    <!-- KOLOM KANAN: Tabel Karyawan -->
    <x-ui.card class="lg:col-span-2 overflow-x-auto border border-border">
        <h3 class="text-base font-semibold text-foreground mb-4">Daftar Karyawan</h3>
        <table class="min-w-full divide-y divide-border text-sm">
            <thead>
                <tr class="bg-muted/30 text-left border-b border-border">
                    <th class="px-4 py-2.5 text-xs font-semibold text-muted-foreground uppercase tracking-wider">NIK</th>
                    <th class="px-4 py-2.5 text-xs font-semibold text-muted-foreground uppercase tracking-wider">Nama</th>
                    <th class="px-4 py-2.5 text-xs font-semibold text-muted-foreground uppercase tracking-wider">Jabatan</th>
                    <th class="px-4 py-2.5 text-xs font-semibold text-muted-foreground uppercase tracking-wider">Alamat</th>
                    <th class="px-4 py-2.5 text-xs font-semibold text-muted-foreground uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-border">
                
                <!-- Kita lakukan iterasi Database (Looping) -->
                @forelse($employees as $item)
                    <tr class="hover:bg-muted/10 transition-colors border-b border-border last:border-b-0">
                        <td class="px-4 py-2.5 text-foreground">{{ $item->nik }}</td>
                        <td class="px-4 py-2.5 font-semibold text-foreground">{{ $item->name }}</td>
                        <td class="px-4 py-2.5 text-foreground">{{ $item->position }}</td>
                        <td class="px-4 py-2.5 text-foreground">{{ $item->address }}</td>
                        <td class="px-4 py-2.5 text-sm font-medium">
                            <!-- Memanggil fungsi public yg ada di komponen PHP, disertai Parameter lemparan ID -->
                            <button wire:click="edit({{ $item->id }})" class="text-primary hover:underline font-semibold mr-3 text-xs">Edit</button>
                            
                            <!-- Menggunakan bawaan Javascript confirm Dialog untuk keamanan sebelum Delete -->
                            <button wire:click="delete({{ $item->id }})" wire:confirm="Yakin ingin menghapus karyawan ini?" class="text-destructive hover:underline font-semibold text-xs">Hapus</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-8 text-center text-muted-foreground">Data Karyawan masih kosong.</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </x-ui.card>
</div>
</div> <!-- penutup div root terluar -->