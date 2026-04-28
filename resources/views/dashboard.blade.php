<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between" style="margin-bottom: 18px;">
            <h2 style="font-size: 56px; font-weight: 800; line-height: 1.1; color: white;">
                Dashboard
            </h2>

            <a href="{{ route('items.create') }}"
               class="inline-flex items-center rounded-2xl bg-gradient-to-r from-pink-500 to-purple-600 px-4 py-2.5 text-sm font-semibold text-white shadow-lg transition hover:opacity-95">
                + Add Item
            </a>
        </div>
    </x-slot>

    <div class="pb-8 px-4">
        <div class="max-w-7xl mx-auto space-y-8">

            <div class="backdrop-blur-xl bg-white/10 border border-white/15 rounded-3xl shadow-2xl p-8">
                <h3 class="text-2xl font-bold text-white mb-2">
                    Welcome back 👋
                </h3>
                <p class="text-white/70">
                    Here’s an overview of your inventory today.
                </p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 24px; margin-top: 8px; margin-bottom: 32px;">
                <div class="bg-white/10 border border-white/10 rounded-3xl p-6 backdrop-blur-md">
                    <p class="text-sm text-white/60">Total Suppliers</p>
                    <h4 class="mt-3 text-3xl font-bold text-white">{{ $totalSuppliers }}</h4>
                </div>

                <div class="bg-white/10 border border-white/10 rounded-3xl p-6 backdrop-blur-md">
                    <p class="text-sm text-white/60">Total Items</p>
                    <h4 class="mt-3 text-3xl font-bold text-white">{{ $totalItems }}</h4>
                </div>

                <div class="bg-white/10 border border-white/10 rounded-3xl p-6 backdrop-blur-md">
                    <p class="text-sm text-white/60">Transactions</p>
                    <h4 class="mt-3 text-3xl font-bold text-white">{{ $totalTransactions }}</h4>
                </div>

                <div class="bg-white/10 border border-white/10 rounded-3xl p-6 backdrop-blur-md">
                    <p class="text-sm text-white/60">Low Stock</p>
                    <h4 class="mt-3 text-3xl font-bold text-pink-300">{{ $lowStockItems->count() }}</h4>
                </div>
            </div>

            <style>
                .chart-row-fixed {
                    display: flex;
                    gap: 24px;
                    margin-top: 16px;
                    align-items: stretch;
                    flex-direction: column;
                }

                .chart-line-col,
                .chart-pie-col {
                    min-width: 0;
                }

                @media (min-width: 1024px) {
                    .chart-row-fixed {
                        flex-direction: row;
                    }

                    .chart-line-col {
                        width: 66.6667%;
                    }

                    .chart-pie-col {
                        width: 33.3333%;
                    }
                }
            </style>

            <div class="chart-row-fixed">
                <div class="chart-line-col bg-white/10 border border-white/10 rounded-3xl p-6 backdrop-blur-md">
                    <div class="flex items-center justify-between mb-5">
                        <h3 class="text-lg font-semibold text-white">
                            Monthly Transaction Trend
                        </h3>
                        <span class="text-sm text-white/60">This Year</span>
                    </div>

                    <div class="w-full h-[320px] sm:h-[360px]">
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>

                <div class="chart-pie-col bg-white/10 border border-white/10 rounded-3xl p-6 backdrop-blur-md">
                    <div class="flex items-center justify-between mb-5">
                        <h3 class="text-lg font-semibold text-white">
                            Transaction Type
                        </h3>
                    </div>

                    <div class="w-full h-[320px] sm:h-[360px]">
                        <canvas id="pieChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 xl:grid-cols-3 gap-6 mt-4">
                <div class="xl:col-span-2 bg-white/10 border border-white/10 rounded-3xl p-6 backdrop-blur-md">
                    <div class="flex items-center justify-between mb-5">
                        <h3 class="text-lg font-semibold text-white">
                            Low Stock Items
                        </h3>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full border-separate border-spacing-0 text-left text-sm text-white/85">
                            <thead>
                                <tr>
                                    <th class="px-4 py-4 border-b border-white/15 text-white font-semibold">Item Name</th>
                                    <th class="px-4 py-4 border-b border-white/15 text-white font-semibold text-center">Stock</th>
                                    <th class="px-4 py-4 border-b border-white/15 text-white font-semibold text-center">Min Stock</th>
                                    <th class="px-4 py-4 border-b border-white/15 text-white font-semibold text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($lowStockItems as $item)
                                    <tr class="hover:bg-white/5 transition">
                                        <td class="px-4 py-4 border-b border-white/10">{{ $item->name }}</td>
                                        <td class="px-4 py-4 border-b border-white/10 text-center">{{ $item->stock }}</td>
                                        <td class="px-4 py-4 border-b border-white/10 text-center">{{ $item->min_stock }}</td>
                                        <td class="px-4 py-4 border-b border-white/10 text-center">
                                            <span class="inline-flex items-center rounded-full bg-pink-500/15 border border-pink-300/20 px-3 py-1 text-xs font-semibold text-pink-200">
                                                Low Stock
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-4 py-6 text-center text-white/60">
                                            No low stock items
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="bg-white/10 border border-white/10 rounded-3xl p-6 backdrop-blur-md">
                        <h3 class="text-lg font-semibold text-white mb-4">
                            Quick Actions
                        </h3>

                        <div class="space-y-3">
                            <a href="{{ route('items.create') }}"
                               class="block w-full rounded-2xl px-4 py-3 text-sm font-medium text-white"
                               style="background: rgba(255,255,255,0.05); border: 1px solid rgba(244,114,182,0.20); transition: all 0.3s ease;"
                               onmouseover="this.style.background='rgba(236,72,153,0.20)'; this.style.borderColor='rgba(244,114,182,0.45)'; this.style.boxShadow='0 10px 25px rgba(236,72,153,0.18)'; this.style.transform='translateY(-2px)'"
                               onmouseout="this.style.background='rgba(255,255,255,0.05)'; this.style.borderColor='rgba(244,114,182,0.20)'; this.style.boxShadow='none'; this.style.transform='translateY(0)'"
                               onmousedown="this.style.transform='scale(0.98)'"
                               onmouseup="this.style.transform='translateY(-2px)'">
                                Add New Item
                            </a>

                            <a href="{{ route('suppliers.index') }}"
                               class="block w-full rounded-2xl px-4 py-3 text-sm font-medium text-white"
                               style="background: rgba(255,255,255,0.05); border: 1px solid rgba(244,114,182,0.20); transition: all 0.3s ease;"
                               onmouseover="this.style.background='rgba(236,72,153,0.20)'; this.style.borderColor='rgba(244,114,182,0.45)'; this.style.boxShadow='0 10px 25px rgba(236,72,153,0.18)'; this.style.transform='translateY(-2px)'"
                               onmouseout="this.style.background='rgba(255,255,255,0.05)'; this.style.borderColor='rgba(244,114,182,0.20)'; this.style.boxShadow='none'; this.style.transform='translateY(0)'"
                               onmousedown="this.style.transform='scale(0.98)'"
                               onmouseup="this.style.transform='translateY(-2px)'">
                                Manage Suppliers
                            </a>

                            <a href="{{ route('transactions.index') }}"
                               class="block w-full rounded-2xl px-4 py-3 text-sm font-medium text-white"
                               style="background: rgba(255,255,255,0.05); border: 1px solid rgba(244,114,182,0.20); transition: all 0.3s ease;"
                               onmouseover="this.style.background='rgba(236,72,153,0.20)'; this.style.borderColor='rgba(244,114,182,0.45)'; this.style.boxShadow='0 10px 25px rgba(236,72,153,0.18)'; this.style.transform='translateY(-2px)'"
                               onmouseout="this.style.background='rgba(255,255,255,0.05)'; this.style.borderColor='rgba(244,114,182,0.20)'; this.style.boxShadow='none'; this.style.transform='translateY(0)'"
                               onmousedown="this.style.transform='scale(0.98)'"
                               onmouseup="this.style.transform='translateY(-2px)'">
                                View Transactions
                            </a>
                        </div>
                    </div>

                    <div class="bg-white/10 border border-white/10 rounded-3xl p-6 backdrop-blur-md">
                        <h3 class="text-lg font-semibold text-white mb-4">
                            Inventory Summary
                        </h3>

                        <div class="space-y-4">
                            <div>
                                <div class="flex justify-between text-sm text-white/70 mb-1">
                                    <span>Stock In</span>
                                    <span>{{ $inCount }}</span>
                                </div>
                                <div class="h-2 rounded-full bg-white/10 overflow-hidden">
                                    <div class="h-full rounded-full bg-gradient-to-r from-pink-500 to-purple-500"
                                         style="width: {{ ($inCount + $outCount) > 0 ? ($inCount / ($inCount + $outCount)) * 100 : 0 }}%">
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="flex justify-between text-sm text-white/70 mb-1">
                                    <span>Stock Out</span>
                                    <span>{{ $outCount }}</span>
                                </div>
                                <div class="h-2 rounded-full bg-white/10 overflow-hidden">
                                    <div class="h-full rounded-full bg-gradient-to-r from-fuchsia-500 to-pink-500"
                                         style="width: {{ ($inCount + $outCount) > 0 ? ($outCount / ($inCount + $outCount)) * 100 : 0 }}%">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @push('scripts')
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const lineCanvas = document.getElementById('lineChart');
                    const pieCanvas = document.getElementById('pieChart');

                    if (!lineCanvas || !pieCanvas) return;

                    const axisColor = 'rgba(255,255,255,0.15)';
                    const labelColor = 'rgba(255,255,255,0.75)';

                    const monthlyLabels = @json(
                        $monthlyData->map(fn($item) => \Carbon\Carbon::create()->month((int)$item->month)->format('M'))->values()
                    );
                    const monthlyIn = @json($monthlyData->pluck('total_in')->values());
                    const monthlyOut = @json($monthlyData->pluck('total_out')->values());

                    new Chart(lineCanvas, {
                        type: 'line',
                        data: {
                            labels: monthlyLabels,
                            datasets: [
                                {
                                    label: 'Stock In',
                                    data: monthlyIn,
                                    borderColor: '#ec4899',
                                    backgroundColor: 'rgba(236,72,153,0.18)',
                                    fill: true,
                                    tension: 0.4,
                                    pointBackgroundColor: '#ec4899',
                                    pointRadius: 4
                                },
                                {
                                    label: 'Stock Out',
                                    data: monthlyOut,
                                    borderColor: '#a855f7',
                                    backgroundColor: 'rgba(168,85,247,0.15)',
                                    fill: true,
                                    tension: 0.4,
                                    pointBackgroundColor: '#a855f7',
                                    pointRadius: 4
                                }
                            ]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    labels: { color: labelColor }
                                }
                            },
                            scales: {
                                x: {
                                    ticks: { color: labelColor },
                                    grid: { color: axisColor }
                                },
                                y: {
                                    ticks: { color: labelColor },
                                    grid: { color: axisColor }
                                }
                            }
                        }
                    });

                    new Chart(pieCanvas, {
                        type: 'doughnut',
                        data: {
                            labels: ['Stock In', 'Stock Out'],
                            datasets: [{
                                data: [{{ $inCount }}, {{ $outCount }}],
                                backgroundColor: ['#ec4899', '#a855f7'],
                                borderWidth: 0
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            cutout: '68%',
                            plugins: {
                                legend: {
                                    position: 'bottom',
                                    labels: {
                                        color: labelColor,
                                        padding: 18
                                    }
                                }
                            }
                        }
                    });
                });
            </script>
        @endpush
    </div>
</x-app-layout>