<div class="fixed inset-0 z-50 overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" wire:click="$dispatch('close-modal')"></div>

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            <?php echo e($editMode ? 'Editar Seguimiento' : 'Nuevo Seguimiento'); ?>

                        </h3>

                        <form wire:submit.prevent="save" class="mt-4 space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Cliente *</label>
                                    <input type="text" wire:model="cliente" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500">
                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['cliente'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Línea Primaria</label>
                                    <input type="text" wire:model="linea_primaria" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Estado *</label>
                                    <select wire:model="estado" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500">
                                        <option value="pendiente">Pendiente</option>
                                        <option value="en_proceso">En Proceso</option>
                                        <option value="facturado">Facturado</option>
                                        <option value="facturado_y_pagado">Facturado y Pagado</option>
                                        <option value="recurrencia">Recurrencia</option>
                                        <option value="declinado">Declinado</option>
                                        <option value="anulado">Anulado</option>
                                    </select>
                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['estado'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Fecha Apertura</label>
                                    <input type="date" wire:model="fecha_apertura" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Fecha Cierre</label>
                                    <input type="date" wire:model="fecha_cierre" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Fecha Facturación</label>
                                    <input type="date" wire:model="fecha_facturacion" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Valor</label>
                                    <input type="number" step="0.01" wire:model="valor" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Estado Negocio</label>
                                    <input type="text" wire:model="estado_negocio" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Incoterm</label>
                                    <input type="text" wire:model="incoterm" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500">
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Anticipos</label>
                                    <textarea wire:model="anticipos" rows="2" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Tiempos Entrega</label>
                                    <textarea wire:model="tiempos_entrega" rows="2" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Forma Pago</label>
                                    <textarea wire:model="forma_pago" rows="2" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Facturación</label>
                                    <!--[if BLOCK]><![endif]--><?php if($isAdmin): ?>
                                        <textarea wire:model="facturacion" rows="2" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                                    <?php else: ?>
                                        <div class="mt-1 p-2 bg-gray-50 border border-gray-200 rounded text-sm text-gray-600"><?php echo e($facturacion ?: 'Sin información'); ?></div>
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Actas Cierre</label>
                                    <!--[if BLOCK]><![endif]--><?php if($isAdmin): ?>
                                        <textarea wire:model="actas_cierre" rows="2" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                                    <?php else: ?>
                                        <div class="mt-1 p-2 bg-gray-50 border border-gray-200 rounded text-sm text-gray-600"><?php echo e($actas_cierre ?: 'Sin información'); ?></div>
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Observaciones</label>
                                    <!--[if BLOCK]><![endif]--><?php if($isAdmin): ?>
                                        <textarea wire:model="observaciones" rows="2" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                                    <?php else: ?>
                                        <div class="mt-1 p-2 bg-gray-50 border border-gray-200 rounded text-sm text-gray-600"><?php echo e($observaciones ?: 'Sin información'); ?></div>
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                </div>
                            </div>

                            <div class="flex justify-end pt-4">
                                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                                    <?php echo e($editMode ? 'Actualizar' : 'Crear'); ?>

                                </button>
                            </div>
                        </form>

                        <!--[if BLOCK]><![endif]--><?php if($editMode): ?>
                        <div class="mt-6 border-t pt-4">
                            <h4 class="text-lg font-medium text-gray-900 mb-4">Facturas</h4>

                            <div class="mb-4 p-4 bg-gray-50 rounded-lg">
                                <div class="grid grid-cols-1 md:grid-cols-4 gap-3">
                                    <div>
                                        <label class="block text-xs font-medium text-gray-500">Número Factura</label>
                                        <input type="text" wire:model="newNumeroFactura" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-1.5 px-2 text-sm">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-medium text-gray-500">Fecha</label>
                                        <input type="date" wire:model="newFechaFactura" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-1.5 px-2 text-sm">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-medium text-gray-500">Valor</label>
                                        <input type="number" step="0.01" wire:model="newValorFactura" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-1.5 px-2 text-sm">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-medium text-gray-500">Descripción</label>
                                        <input type="text" wire:model="newDescripcionFactura" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-1.5 px-2 text-sm">
                                    </div>
                                </div>
                                <div class="mt-3 flex gap-2">
                                    <!--[if BLOCK]><![endif]--><?php if($facturaEditIndex !== null): ?>
                                        <button wire:click="updateFactura(<?php echo e($facturaEditIndex); ?>)" class="px-3 py-1 bg-green-600 text-white text-sm rounded hover:bg-green-700">Actualizar</button>
                                        <button wire:click="cancelEditFactura" class="px-3 py-1 bg-gray-300 text-gray-700 text-sm rounded hover:bg-gray-400">Cancelar</button>
                                    <?php else: ?>
                                        <button wire:click="addFactura" class="px-3 py-1 bg-indigo-600 text-white text-sm rounded hover:bg-indigo-700">Agregar Factura</button>
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                </div>
                            </div>

                            <!--[if BLOCK]><![endif]--><?php if(count($facturas) > 0): ?>
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Número</th>
                                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Fecha</th>
                                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Valor</th>
                                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Descripción</th>
                                            <th class="px-3 py-2 text-right text-xs font-medium text-gray-500 uppercase">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $facturas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $factura): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="px-3 py-2 text-sm text-gray-900"><?php echo e($factura['numero_factura']); ?></td>
                                            <td class="px-3 py-2 text-sm text-gray-500"><?php echo e($factura['fecha']); ?></td>
                                            <td class="px-3 py-2 text-sm text-gray-900">$<?php echo e(number_format((float)$factura['valor'], 2)); ?></td>
                                            <td class="px-3 py-2 text-sm text-gray-500"><?php echo e($factura['descripcion']); ?></td>
                                            <td class="px-3 py-2 text-right text-sm">
                                                <button wire:click="editFactura(<?php echo e($index); ?>)" class="text-indigo-600 hover:text-indigo-900 mr-2">Editar</button>
                                                <button wire:click="deleteFactura(<?php echo e($index); ?>)" class="text-red-600 hover:text-red-900">Eliminar</button>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                    </tbody>
                                </table>
                            </div>
                            <?php else: ?>
                            <p class="text-sm text-gray-500">No hay facturas registradas.</p>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                </div>
            </div>

            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button wire:click="$dispatch('close-modal')" class="w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm">
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\ImpreForms\resources\views/livewire/seguimiento/seguimiento-form.blade.php ENDPATH**/ ?>