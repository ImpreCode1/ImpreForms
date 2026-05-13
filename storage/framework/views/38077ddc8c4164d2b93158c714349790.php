<div>
    <div class="min-h-screen bg-gradient-to-b from-gray-50 to-gray-100 py-8">
        <div class="p-4 sm:p-6 lg:p-8">
            <div class="mb-6">
                <h2 class="text-3xl font-bold text-center text-gray-900">Seguimiento de Proyectos</h2>
                <p class="text-center text-gray-600 mt-2">Gestiona las oportunidades y proyectos</p>
            </div>

            <div class="bg-white rounded-xl shadow-lg">
                <div class="p-4 border-b border-gray-200">
                    <div class="flex flex-wrap items-center justify-between gap-3 mb-4 md:mb-0">
                        <div class="flex flex-wrap items-center gap-2">
                            <select wire:model="filtroEstado" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="">Todos los estados</option>
                                <option value="anulado">Anulado</option>
                                <option value="declinado">Declinado</option>
                                <option value="en_proceso">En Proceso</option>
                                <option value="facturado">Facturado</option>
                                <option value="facturado_y_pagado">Facturado y Pagado</option>
                                <option value="pendiente">Pendiente</option>
                                <option value="recurrencia">Recurrencia</option>
                            </select>
                            <input type="text" wire:model.live.debounce.300ms="filtroCliente" placeholder="Buscar cliente..."
                                class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        <div class="shrink-0">
                            <!--[if BLOCK]><![endif]--><?php if($isAdmin): ?>
                            <button wire:click="openModal(null)" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                Nuevo Seguimiento
                            </button>
                            <button wire:click="exportar" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 flex items-center gap-2 ml-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Exportar Excel
                            </button>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                    </div>
                </div>

                <div class="overflow-x-auto rounded-lg border border-gray-200">
                    <table class="min-w-full min-w-[800px] divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Cliente</th>
                                <th class="whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Línea Primary</th>
                                <th class="whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Estado</th>
                                <th class="whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Valor</th>
                                <th class="whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Fecha Apertura</th>
                                <th class="whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Fecha Facturación</th>
                                <th class="whitespace-nowrap px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $seguimientos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="hover:bg-gray-50">
                                <td class="whitespace-nowrap px-4 py-4 text-sm text-gray-900"><?php echo e($seg->cliente); ?></td>
                                <td class="whitespace-nowrap px-4 py-4 text-sm text-gray-500"><?php echo e($seg->linea_primaria); ?></td>
                                <td class="whitespace-nowrap px-4 py-4">
                                    <?php
                                    $colors = [
                                        'anulado' => 'bg-red-100 text-red-800',
                                        'declinado' => 'bg-gray-100 text-gray-800',
                                        'en_proceso' => 'bg-blue-100 text-blue-800',
                                        'facturado' => 'bg-green-100 text-green-800',
                                        'facturado_y_pagado' => 'bg-green-700 text-white',
                                        'pendiente' => 'bg-yellow-100 text-yellow-800',
                                        'recurrencia' => 'bg-purple-100 text-purple-800',
                                    ];
                                    ?>
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full <?php echo e($colors[$seg->estado] ?? 'bg-gray-100 text-gray-800'); ?>">
                                        <?php echo e(ucfirst(str_replace('_', ' ', $seg->estado))); ?>

                                    </span>
                                </td>
                                <td class="whitespace-nowrap px-4 py-4 text-sm text-gray-900">$<?php echo e(number_format($seg->valor, 2)); ?></td>
                                <td class="whitespace-nowrap px-4 py-4 text-sm text-gray-500"><?php echo e($seg->fecha_apertura?->format('d/m/Y')); ?></td>
                                <td class="whitespace-nowrap px-4 py-4 text-sm text-gray-500"><?php echo e($seg->fecha_facturacion?->format('d/m/Y')); ?></td>
                                <td class="whitespace-nowrap px-4 py-4 text-right text-sm font-medium">
                                    <button wire:click="openModal(<?php echo e($seg->id); ?>)" class="text-indigo-600 hover:text-indigo-900">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="7" class="px-4 py-8 text-center text-gray-500">
                                    No hay seguimientos registrados
                                </td>
                            </tr>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </tbody>
                    </table>
                </div>

                <div class="px-6 py-4 border-t border-gray-200">
                    <?php echo e($seguimientos->links()); ?>

                </div>
            </div>
        </div>
    </div>

    <!--[if BLOCK]><![endif]--><?php if($showModal): ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('seguimiento.seguimiento-form', ['seguimientoId' => $seguimientoId,'@closeModal.window' => '$wire.set(\'showModal\', false); $wire.set(\'seguimientoId\', null)']);

$__html = app('livewire')->mount($__name, $__params, $seguimientoId ?? 'new-' . now()->timestamp, $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div>
<?php /**PATH C:\laragon\www\ImpreForms\resources\views/livewire/seguimiento/seguimiento-index.blade.php ENDPATH**/ ?>