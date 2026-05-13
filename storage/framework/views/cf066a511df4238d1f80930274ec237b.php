<div>
    <?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
        <div class="min-h-screen bg-gradient-to-b from-gray-50 to-gray-100 py-8">
            <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Header con estadísticas -->
                <div class="mb-8">
                    <div class="container mx-auto px-4 py-8">
                        <h2 class="text-3xl font-bold text-center text-gray-900 mb-6">Solicitudes Recibidas</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                            <!-- Total Formularios -->
                            <div
                                class="bg-gradient-to-br from-blue-100 to-blue-300 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 p-5 text-center">
                                <div class="relative mx-auto w-24 h-24 mb-4">
                                    <svg class="absolute inset-0 w-full h-full" viewBox="0 0 36 36"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path class="text-gray-200" fill="none" stroke-width="3"
                                            stroke="currentColor" d="M18 2 a16 16 0 1 1 0 32 a16 16 0 1 1 0 -32" />
                                        <path class="text-blue-500" fill="none" stroke-width="3"
                                            stroke-linecap="round" stroke="currentColor" stroke-dasharray="100, 100"
                                            stroke-dashoffset="25" d="M18 2 a16 16 0 1 1 0 32 a16 16 0 1 1 0 -32" />
                                    </svg>
                                    <div
                                        class="absolute inset-0 flex items-center justify-center text-blue-500 text-3xl font-bold">
                                        
                                        =
                                    </div>

                                </div>
                                <div class="text-gray-800">
                                    <p class="text-sm font-medium">Total de Solicitudes</p>
                                    <p class="text-xl font-bold"><?php echo e($totalFormularios); ?></p>
                                </div>
                            </div>

                            <div
                                class="bg-gradient-to-br from-purple-100 to-purple-300 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 p-5 text-center">
                                <div class="relative mx-auto w-24 h-24 mb-4">
                                    <svg class="absolute inset-0 w-full h-full" viewBox="0 0 36 36"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path class="text-gray-200" fill="none" stroke-width="3"
                                            stroke="currentColor" d="M18 2 a16 16 0 1 1 0 32 a16 16 0 1 1 0 -32" />
                                        <path class="text-purple-500" fill="none" stroke-width="3"
                                            stroke-linecap="round" stroke="currentColor" stroke-dasharray="60, 100"
                                            stroke-dashoffset="20" d="M18 2 a16 16 0 1 1 0 32 a16 16 0 1 1 0 -32" />
                                    </svg>
                                    <div
                                        class="absolute inset-0 flex items-center justify-center text-purple-500 text-2xl font-bold">
                                        #
                                    </div>
                                </div>

                                
                                <div class="text-gray-800">
                                    <p class="text-sm font-medium">Total solicitudes completadas</p>
                                    <p class="text-xl font-bold"><?php echo e($completedContracts->count()); ?></p>
                                </div>
                            </div>

                            <!-- Porcentaje de Anticipo -->
                            <div
                                class="bg-gradient-to-br from-yellow-100 to-yellow-300 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 p-5 text-center">
                                <div class="relative mx-auto w-24 h-24 mb-4">
                                    <svg class="absolute inset-0 w-full h-full" viewBox="0 0 36 36"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path class="text-gray-200" fill="none" stroke-width="3"
                                            stroke="currentColor" d="M18 2 a16 16 0 1 1 0 32 a16 16 0 1 1 0 -32" />
                                        <path class="text-yellow-500" fill="none" stroke-width="3"
                                            stroke-linecap="round" stroke="currentColor" stroke-dasharray="40, 100"
                                            stroke-dashoffset="30" d="M18 2 a16 16 0 1 1 0 32 a16 16 0 1 1 0 -32" />
                                    </svg>
                                    <div
                                        class="absolute inset-0 flex items-center justify-center text-yellow-500 text-3xl font-bold">
                                        %
                                    </div>
                                </div>
                                <div class="text-gray-800">
                                    <p class="text-sm font-medium">Total solicitudes en proceso</p>
                                    <p class="text-xl font-bold"><?php echo e($incompleteContracts->count()); ?></p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!--[if BLOCK]><![endif]--><?php if(session()->has('message')): ?>
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                        id="alert">
                        <span class="block sm:inline"><?php echo e(session('message')); ?></span>
                        <button
                            class="absolute top-0 right-0 p-2 text-green-700 hover:text-green-900 focus:outline-none"
                            onclick="closeAlert()">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                <br>
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <!-- Barra de herramientas -->
                    <div class="p-6 border-b border-gray-200 bg-gray-50">
                        <div
                            class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0 gap-4">
                            <div class="relative w-full max-w-md group">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400 group-hover:text-gray-600 transition-colors"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input wire:model.live="search" type="text"
                                    placeholder="Buscar por código, nombre o n° oportunidad"
                                    class="w-full px-4 pl-10 py-3 text-sm text-gray-900
                                              bg-white border-2 border-gray-200 rounded-xl
                                              focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500
                                              hover:border-gray-300
                                              transition-all duration-300
                                              placeholder:text-gray-500
                                              shadow-sm hover:shadow-md" />
                            </div>

                            <div class="flex items-center space-x-4 w-full md:w-auto">
                                <select wire:change="setSorting($event.target.value)"
                                    class="w-full md:w-48 px-4 py-3 text-sm text-gray-700
                                               bg-white border-2 border-gray-200 rounded-xl
                                               focus:outline-none focus:ring-2 focus:ring-indigo-500
                                               hover:border-gray-300
                                               transition-all duration-300
                                               appearance-none
                                               cursor-pointer">
                                    <option value="" disabled selected>Ordenar por</option>
                                    <option value="created_at">Fecha - Reciente</option>
                                    <option value="created_at_asc">Fecha - Antiguo</option>
                                </select>

                                <button wire:click="exportar"
                                    class="group relative px-4 py-2 text-xs font-semibold text-white
                                        bg-gradient-to-r from-blue-500 to-blue-600
                                        rounded-lg shadow-md
                                      hover:from-blue-600 hover:to-blue-700
                                        focus:outline-none focus:ring-4 focus:ring-blue-300
                                        transition-all duration-300
                                        transform hover:scale-105 active:scale-95
                                        flex items-center justify-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5 3a1 1 0 011-1h8a1 1 0 011 1v14a1 1 0 01-1 1H6a1 1 0 01-1-1V3zm3 10.293a1 1 0 011.414 0L10 13.586l.293-.293a1 1 0 011.414 1.414l-1 1a1 1 0 01-1.414 0l-2-2a1 1 0 010-1.414l2-2a1 1 0 011.414 1.414L10 12.586l-.293-.293z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Generar Reporte
                                </button>



                            </div>
                        </div>


                    </div>

                    <!-- Mensaje de "No hay resultados" -->
                    <!--[if BLOCK]><![endif]--><?php if(!$formularios || count($formularios) === 0): ?>
                        <div class="mt-4">
                            <div
                                class="flex flex-col items-center justify-center p-6 text-center text-gray-600 bg-gray-100 rounded-lg shadow">
                                <svg class="mx-auto h-24 w-24 text-gray-400 mb-6" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <p class="text-lg font-medium">No se encontraron resultados</p>
                                <p class="text-sm text-gray-500 mt-2">Intenta con un término de búsqueda diferente.</p>
                            </div>
                        </div>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                    <!-- Tabla -->
                    <!--[if BLOCK]><![endif]--><?php if($formularios->isNotEmpty()): ?>
                        <div class="overflow-x-auto max-w-full" wire:poll.visible.60s>
                            <table class="min-w-full border-collapse bg-white text-sm">
                                <thead class="sticky top-0 bg-white shadow z-10">
                                    <tr class="bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-200">
                                        <th
                                            class="px-2 py-3 text-left font-bold text-gray-700 uppercase tracking-wider">
                                            Solicitante</th>
                                        <th
                                            class="px-2 py-3 text-left font-bold text-gray-700 uppercase tracking-wider">
                                            Código cliente</th>
                                        <th
                                            class="px-2 py-3 text-left font-bold text-gray-700 uppercase tracking-wider">
                                            Nombre cliente</th>
                                        <th
                                            class="px-2 py-3 text-left font-bold text-gray-700 uppercase tracking-wider">
                                            N° oportunidad</th>
                                        <th
                                            class="px-2 py-3 text-left font-bold text-gray-700 uppercase tracking-wider">
                                            Información</th>
                                        <th
                                            class="px-2 py-3 text-left font-bold text-gray-700 uppercase tracking-wider">
                                            Descargar</th>
                                        <th
                                            class="px-2 py-3 text-left font-bold text-gray-700 uppercase tracking-wider">
                                            Fecha de envío</th>
                                        <th
                                            class="px-2 py-3 text-left font-bold text-gray-700 uppercase tracking-wider">
                                            Links</th>
                                        <th
                                            class="px-2 py-3 text-left font-bold text-gray-700 uppercase tracking-wider">
                                            Restablecer</th>
                                        <th
                                            class="px-2 py-3 text-center font-bold text-gray-700 uppercase tracking-wider">
                                            Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $formularios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $formulario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr wire:key="formulario-<?php echo e($formulario->id); ?>"
                                            class="hover:bg-gray-50 transition-all duration-200">
                                            <td class="px-2 py-3 text-gray-700 break-words">
                                                <?php echo e($formulario->user->name ?? 'No especificado'); ?></td>
                                            <td class="px-2 py-3 text-gray-600 break-words">
                                                <?php echo e($formulario->infonegocio->codigo_cliente); ?></td>
                                            <td class="px-2 py-3 text-gray-600 break-words">
                                                <?php echo e($formulario->infonegocio->nombre); ?></td>
                                            <td class="px-2 py-3 text-gray-600 break-words">
                                                <?php echo e($formulario->infonegocio->n_oportunidad_crm); ?></td>
                                            <td class="px-2 py-3 text-center align-middle">
                                                <div class="flex justify-center">
                                                    <button wire:click="loadFormulario(<?php echo e($formulario->id); ?>)"
                                                        class="inline-flex items-center px-2 py-1 rounded bg-blue-50 text-blue-600 hover:bg-blue-100 text-xs">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                        </svg>
                                                        Ver
                                                    </button>
                                                </div>
                                            </td>
                                            <td class="px-2 py-3">
                                                <a href="<?php echo e(route('formularios.download', $formulario->id)); ?>"
                                                    class="inline-flex items-center px-2 py-1 rounded bg-amber-50 text-amber-600 hover:bg-amber-100 text-xs">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                                    </svg>
                                                    Descargar
                                                </a>
                                            </td>
                                            <td class="px-2 py-3 text-xs text-gray-700">
                                                <?php echo e($formulario->created_at->format('d/m/Y')); ?></td>
                                            <td class="px-2 py-3 text-xs">
                                                <div class="flex flex-col gap-1">
                                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $formulario->formLinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <!--[if BLOCK]><![endif]--><?php if(!$link->isExpired()): ?>
                                                            <?php
                                                                $isOperaciones = $link->type === 'operaciones';
                                                                $isCompleted = $link->isCompleted();
                                                                $label = $isOperaciones ? 'Operaciones' : 'Financiera';

                                                                // Ruta activa siempre
                                                                $route = $isOperaciones
                                                                    ? route('formulario-operaciones', [
                                                                        'link' => $link->link,
                                                                    ])
                                                                    : route('formulario-financiera', [
                                                                        'link' => $link->link,
                                                                    ]);

                                                                // Colores: si no está completado, mostrar en gris
                                                                $bgColor = $isCompleted
                                                                    ? ($isOperaciones
                                                                        ? 'bg-indigo-50 text-indigo-700 hover:bg-indigo-100'
                                                                        : 'bg-emerald-50 text-emerald-700 hover:bg-emerald-100')
                                                                    : 'bg-gray-100 text-gray-500 hover:bg-gray-200';
                                                            ?>

                                                            <a href="<?php echo e($route); ?>" target="_blank"
                                                                class="inline-flex items-center px-2 py-1 rounded <?php echo e($bgColor); ?> text-xs transition-all duration-200"
                                                                title="<?php echo e($isCompleted ? 'Formulario diligenciado' : 'Pendiente por diligenciar'); ?>">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="h-3.5 w-3.5 mr-1" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                                                </svg>
                                                                <?php echo e($label); ?>

                                                            </a>
                                                        <?php else: ?>
                                                            <span
                                                                class="inline-flex items-center px-2 py-1 rounded bg-red-50 text-red-700 text-xs">Expirado</span>
                                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

                                                </div>
                                            </td>
                                            <td class="px-2 py-3 text-center align-middle">
                                                <div class="flex justify-center">
                                                    <!--[if BLOCK]><![endif]--><?php if($formulario->formLinks->contains(fn($link) => $link->isExpired())): ?>
                                                        <button wire:click="resetLinks(<?php echo e($formulario->id); ?>)"
                                                            class="w-7 h-7 rounded-full bg-purple-50 text-purple-600 hover:bg-purple-100 flex items-center justify-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                                fill="none" viewBox="0 0 24 24"
                                                                stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                                            </svg>
                                                        </button>
                                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                </div>
                                            </td>
                                            <td class="px-2 py-3 text-center">
                                                <div class="flex justify-center space-x-1">
                                                    <?php
                                                        $activeLinks = $formulario->formLinks->filter(
                                                            fn($link) => !$link->isExpired(),
                                                        );
                                                        $hasOperaciones = $activeLinks->contains(
                                                            fn($l) => $l->type === 'operaciones',
                                                        );
                                                        $hasFinanciera = $activeLinks->contains(
                                                            fn($l) => $l->type === 'financiera',
                                                        );
                                                    ?>

                                                    <!--[if BLOCK]><![endif]--><?php if($hasOperaciones && $hasFinanciera): ?>
                                                        <button wire:click="approveFormulario(<?php echo e($formulario->id); ?>)"
                                                            class="w-7 h-7 rounded-full bg-green-50 text-green-600 hover:bg-green-100 flex items-center justify-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                                fill="none" viewBox="0 0 24 24"
                                                                stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" d="M5 13l4 4L19 7" />
                                                            </svg>
                                                        </button>
                                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                                    <a href="mailto:<?php echo e($formulario->correo_electronico ?? ''); ?>?subject=Observación del contrato&body=Buen día,"
                                                        class="w-7 h-7 rounded-full bg-blue-50 text-blue-600 hover:bg-blue-100 flex items-center justify-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <div class="flex flex-col items-center justify-center py-12 px-4 bg-white rounded-lg shadow">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-300 mb-4"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <h3 class="text-lg font-medium text-gray-700">No hay formularios disponibles</h3>
                            <p class="text-sm text-gray-500 mt-2">Los formularios enviados aparecerán aquí</p>
                        </div>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->


                    <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
                        <div class="flex flex-col sm:flex-row items-center justify-between space-y-4 sm:space-y-0">
                            <p class="text-sm text-gray-700">
                                Mostrando <span class="font-medium"><?php echo e($formularios->firstItem()); ?></span> a <span
                                    class="font-medium"><?php echo e($formularios->lastItem()); ?></span> de <span
                                    class="font-medium"><?php echo e($formularios->total()); ?></span> entradas
                            </p>
                            <div class="flex items-center space-x-2">
                                <button wire:click="previousPage"
                                    class="px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-50"
                                    <?php echo e($formularios->onFirstPage() ? 'disabled' : ''); ?>>
                                    Anterior
                                </button>
                                <div class="flex items-center space-x-2">
                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $formularios->getUrlRange(1, $formularios->lastPage()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <button wire:click="gotoPage(<?php echo e($page); ?>)"
                                            class="px-4 py-2 text-sm font-medium <?php echo e($page == $formularios->currentPage() ? 'bg-indigo-600 text-white' : 'bg-white text-gray-700 border border-gray-300'); ?> rounded-lg hover:bg-gray-50">
                                            <?php echo e($page); ?>

                                        </button>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                </div>
                                <button wire:click="nextPage"
                                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50"
                                    <?php echo e($formularios->hasMorePages() ? '' : 'disabled'); ?>>
                                    Siguiente
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
                <!--[if BLOCK]><![endif]--><?php if($selectedFormulario): ?>
                    <div x-data="{
                        open: <?php if ((object) ('open') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('open'->value()); ?>')<?php echo e('open'->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('open'); ?>')<?php endif; ?>
                    }" x-show="open" x-cloak class="fixed inset-0 z-50 overflow-y-auto"
                        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                        <div class="fixed inset-0 bg-black opacity-50"></div>
                        <div class="relative min-h-screen flex items-center justify-center p-4">
                            <div
                                class="relative bg-white rounded-lg shadow-inner max-w-4xl w-full max-h-[90vh] overflow-y-auto">
                                <div
                                    class="sticky top-0 bg-white border-b px-6 py-4 flex justify-between items-center">
                                    <h2 class="text-xl font-semibold text-gray-800">Información Detallada</h2>
                                    <button wire:click="closeModal" class="text-gray-400 hover:text-gray-600">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </div>

                                <div class="max-w-4xl mx-auto p-6 space-y-6 bg-blue-50">
                                    
                                    <div class="bg-white rounded-lg shadow-md border border-slate-200 max-w-full">

                                        <div class="border-b border-slate-200 px-6 py-4 bg-indigo-50">
                                            <h2 class="text-lg font-semibold text-slate-900">Tipo de Solicitud</h2>
                                            </h2>
                                        </div>

                                        <div class="p-6">
                                            <div class="grid md:grid">
                                                <div class="">
                                                    <p class="text-sm text-slate-900">
                                                        <?php echo e($selectedFormulario->tipo_solicitud ?? 'No especificado'); ?>

                                                    </p>
                                                    <div class="h-px bg-slate-200 mt-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Información del Negocio -->
                                    <div class="bg-white rounded-lg shadow-md border border-slate-200">
                                        <div class="border-b border-slate-200 px-6 py-4 bg-indigo-50">
                                            <h2 class="text-lg font-semibold text-slate-900">Información del Negocio
                                            </h2>
                                        </div>

                                        <div class="p-6">
                                            <div class="grid md:grid-cols-3 gap-x-8 gap-y-6">
                                                <div class="space-y-1">
                                                    <p class="text-sm font-medium text-black">Código del cliente
                                                    </p>
                                                    <p class="text-sm text-slate-900">
                                                        <?php echo e($selectedFormulario->infonegocio->codigo_cliente ?? 'No especificado'); ?>

                                                    </p>
                                                    <div class="h-px bg-slate-200 mt-2"></div>
                                                </div>

                                                <div class="space-y-1">
                                                    <p class="text-sm font-medium text-black">Nombre del cliente</p>
                                                    <p class="text-sm text-slate-900">
                                                        <?php echo e($selectedFormulario->infonegocio->nombre ?? 'No especificado'); ?>

                                                    </p>
                                                    <div class="h-px bg-slate-200 mt-2"></div>
                                                </div>

                                                <div class="space-y-1">
                                                    <p class="text-sm font-medium text-black">Nombre del representante
                                                        legal</p>
                                                    <p class="text-sm text-slate-900">
                                                        <?php echo e($selectedFormulario->infonegocio->nom_rep ?? 'No especificado'); ?>

                                                    </p>
                                                    <div class="h-px bg-slate-200 mt-2"></div>
                                                </div>

                                                <div class="space-y-1">
                                                    <p class="text-sm font-medium text-black">Correo electrónico del
                                                        representante legal
                                                    </p>
                                                    <p class="text-sm text-slate-900">
                                                        <?php echo e($selectedFormulario->infonegocio->correo ?? 'No especificado'); ?>

                                                    </p>
                                                    <div class="h-px bg-slate-200 mt-2"></div>
                                                </div>

                                                <div class="space-y-1">
                                                    <p class="text-sm font-medium text-black">Número de celular</p>
                                                    <p class="text-sm text-slate-900">
                                                        <?php echo e($selectedFormulario->infonegocio->numero_celular ?? 'No especificado'); ?>

                                                    </p>
                                                    <div class="h-px bg-slate-200 mt-2"></div>
                                                </div>

                                                <div class="space-y-1">
                                                    <p class="text-sm font-medium text-black">N° Oportunidad CRM
                                                    </p>
                                                    <p class="text-sm text-slate-900">
                                                        <?php echo e($selectedFormulario->infonegocio->n_oportunidad_crm ?? 'No especificado'); ?>

                                                    </p>
                                                    <div class="h-px bg-slate-200 mt-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Orden de compra -->
                                    <div class="bg-white rounded-lg shadow-md border border-slate-200">
                                        <div class="border-b border-slate-200 px-6 py-4 bg-indigo-50">
                                            <h2 class="text-lg font-semibold text-slate-900">Orden de compra</h2>
                                        </div>

                                        <div class="p-6">
                                            <div class="grid md:grid-cols-2 gap-x-8 gap-y-6">
                                                <div class="space-y-1">
                                                    <p class="text-sm font-medium text-black">Fecha</p>
                                                    <p class="text-sm text-slate-900">
                                                        <?php echo e(\Carbon\Carbon::parse($selectedFormulario->fecha)->format('Y-m-d') ?? 'No especificado'); ?>

                                                    </p>
                                                    <div class="h-px bg-slate-200 mt-2"></div>
                                                </div>

                                                <div class="space-y-1">
                                                    <p class="text-sm font-medium text-black">N° OC</p>
                                                    <p class="text-sm text-slate-900">
                                                        <?php echo e($selectedFormulario->n_oc ?? 'No especificado'); ?>

                                                    </p>
                                                    <div class="h-px bg-slate-200 mt-2"></div>
                                                </div>

                                                <div class="space-y-1">
                                                    <p class="text-sm font-medium text-black">¿Incluye IVA?</p>
                                                    <p class="text-sm text-slate-900">
                                                        <?php echo e($this->selectedFormulario->pago->isNotEmpty() && $this->selectedFormulario->pago->first()->incluye_iva ? 'Sí' : 'No'); ?>

                                                    </p>

                                                    <div class="h-px bg-slate-200 mt-2"></div>
                                                </div>

                                                <div class="space-y-1">
                                                    <p class="text-sm font-medium text-black">Precio de venta que debe
                                                        quedar en el contrato</p>
                                                    <p class="text-sm text-slate-900">
                                                        <?php echo e($selectedFormulario->precio_venta ?? 'No especificado'); ?>

                                                    </p>
                                                    <div class="h-px bg-slate-200 mt-2"></div>
                                                </div>

                                                <div class="space-y-1">
                                                    <p class="text-sm font-medium text-black">Moneda</p>
                                                    <p class="text-sm text-slate-900">
                                                        $
                                                        <?php echo e($selectedFormulario->moneda_precio_venta ?? 'No especificado'); ?>

                                                    </p>
                                                    <div class="h-px bg-slate-200 mt-2"></div>
                                                </div>

                                                
                                            </div>
                                        </div>
                                    </div>

                                    
                                    <div class="bg-white rounded-lg shadow-md border border-slate-200 max-w-full">

                                        <div class="border-b border-slate-200 px-6 py-4 bg-indigo-50">
                                            <h2 class="text-lg font-semibold text-slate-900">Tipo de Solicitud</h2>
                                            </h2>
                                        </div>

                                        <div class="p-6">
                                            <div class="grid md:grid">
                                                <div class="">
                                                    <p class="text-sm text-slate-900">
                                                        <?php echo e($selectedFormulario->tipo_contrato ?? 'No especificado'); ?>

                                                    </p>
                                                    <div class="h-px bg-slate-200 mt-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <h4 class="text-3xl font-bold mb-6 text-center text-stone-950 tracking-wide">
                                        Información del Equipo Comercial
                                    </h4>
                                    <!-- Gerente de producto -->
                                    <div class="bg-white rounded-lg shadow-md border border-slate-200">
                                        <div class="border-b border-slate-200 px-6 py-4 bg-indigo-50">
                                            <h2 class="text-lg font-semibold text-slate-900">Gerente de producto</h2>
                                        </div>

                                        <div class="p-6">
                                            <div class="grid md:grid-cols-3 gap-x-8 gap-y-6">
                                                <div class="space-y-1">
                                                    <p class="text-sm font-medium text-black">Línea</p>
                                                    <p class="text-sm text-slate-900">
                                                        <?php echo e($selectedFormulario->linea ?? 'No especificado'); ?>

                                                    </p>
                                                    <div class="h-px bg-slate-200 mt-2"></div>
                                                </div>

                                                <div class="space-y-1">
                                                    <p class="text-sm font-medium text-black">Código de la línea
                                                    </p>
                                                    <p class="text-sm text-slate-900">
                                                        <?php echo e($selectedFormulario->codigo_linea ?? 'No especificado'); ?>

                                                    </p>
                                                    <div class="h-px bg-slate-200 mt-2"></div>
                                                </div>

                                                <div class="space-y-1">
                                                    <p class="text-sm font-medium text-black">Nombre</p>
                                                    <p class="text-sm text-slate-900">
                                                        <?php echo e($selectedFormulario->nombre ?? 'No especificado'); ?></p>
                                                    <div class="h-px bg-slate-200 mt-2"></div>
                                                </div>
                                                

                                                <div class="space-y-1">
                                                    <p class="text-sm font-medium text-black">Correo electrónico
                                                    </p>
                                                    <p class="text-sm text-slate-900">
                                                        <?php echo e($selectedFormulario->correo_electronico ?? 'No especificado'); ?>

                                                    </p>
                                                    <div class="h-px bg-slate-200 mt-2"></div>
                                                </div>
                                            </div>


                                            <div class="mt-8 pt-6 border-t border-slate-200">
                                                <p class="text-sm font-medium text-black">Información Director</p>
                                                <br>
                                                <div class="grid md:grid-cols-3 gap-x-8 gap-y-6">

                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">Director</p>
                                                        <p class="text-sm text-slate-900">
                                                            <?php echo e($selectedFormulario->director ?? 'No especificado'); ?>

                                                        </p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>

                                                    

                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">Correo
                                                            electrónico</p>
                                                        <p class="text-sm text-slate-900">
                                                            <?php echo e($selectedFormulario->correo_director ?? 'No especificado'); ?>

                                                        </p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="mt-8 pt-6 border-t border-slate-200">
                                                <p class="text-sm font-medium text-black">Información Ejecutivo</p>
                                                <br>
                                                <div class="grid md:grid-cols-3 gap-x-8 gap-y-6">
                                                    

                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">Nombre</p>
                                                        <p class="text-sm text-slate-900">
                                                            <?php echo e($selectedFormulario->nombre_ejc ?? 'No especificado'); ?>

                                                        </p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>

                                                    

                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">Correo electronico
                                                        </p>
                                                        <p class="text-sm text-slate-900">
                                                            <?php echo e($selectedFormulario->email_ejc ?? 'No especificado'); ?>

                                                        </p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-8 pt-6 border-t border-slate-200">
                                                <p class="text-sm font-medium text-black">Información adicional (si se
                                                    requiere)</p>
                                                <br>
                                                <div class="grid md:grid-cols-3 gap-x-8 gap-y-6">
                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">Nombre</p>
                                                        <p class="text-sm text-slate-900">
                                                            <?php echo e($selectedFormulario->otro ?? 'No especificado'); ?></p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>

                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">Telefono</p>
                                                        <p class="text-sm text-slate-900">
                                                            <?php echo e($selectedFormulario->cel ?? 'No especificado'); ?></p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>

                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">Correo
                                                            electrónico</p>
                                                        <p class="text-sm text-slate-900">
                                                            <?php echo e($selectedFormulario->email ?? 'No especificado'); ?></p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <!-- Información de Entrega -->
                                    <div class="bg-white rounded-lg shadow-md border border-slate-200">
                                        <div class="border-b border-slate-200 px-6 py-4 bg-indigo-50">
                                            <h2 class="text-lg font-semibold text-slate-900">Información de Entrega
                                            </h2>
                                        </div>

                                        <div class="p-6">
                                            <div class="grid md:grid-cols-2 gap-x-8 gap-y-6">
                                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->selectedFormulario->informacion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $informacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">¿Quién realiza la
                                                            entrega a cliente?</p>
                                                        <p class="text-sm text-slate-900">
                                                            <?php echo e($informacion->realiza_entrega_cliente ?? 'No especificado'); ?>

                                                        </p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>

                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">¿Cuántas entregas se
                                                            van a realizar al cliente y en que fecha?</p>
                                                        <p class="text-sm text-slate-900">
                                                            <?php echo e($informacion->entrega_realizar ?? 'No especificado'); ?>

                                                        </p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>

                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">Lugar de entrega
                                                            y dirección</p>
                                                        <p class="text-sm text-slate-900">
                                                            <?php echo e($informacion->lugar_entrega ?? 'No especificado'); ?></p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>

                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">Especificar país
                                                        </p>
                                                        <p class="text-sm text-slate-900">
                                                            <?php echo e($informacion->pais ?? 'No especificado'); ?></p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>

                                                    

                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">Tiempo de entrega
                                                        </p>
                                                        <p class="text-sm text-slate-900">
                                                            <?php echo e($informacion->tiempo_entrega ?? 'No especificado'); ?></p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>

                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">Fecha inicio
                                                            término de entrega</p>
                                                        <p class="text-sm text-slate-900">
                                                            <?php echo e(\Carbon\Carbon::parse($informacion->fecha_inicio_termino)->format('Y-m-d') ?? 'No especificado'); ?>

                                                        </p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>

                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">Tipo de incoterms
                                                        </p>
                                                        <p class="text-sm text-slate-900">
                                                            <?php echo e($informacion->tipo_incoterms ?? 'No especificado'); ?></p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Información del Servicio -->
                                    <div class="bg-white rounded-lg shadow-md border border-slate-200">
                                        <div class="border-b border-slate-200 px-6 py-4 bg-indigo-50">
                                            <h2 class="text-lg font-semibold text-slate-900">Información del Servicio
                                            </h2>
                                        </div>

                                        <div class="p-6">
                                            <div class="grid md:grid-cols-2 gap-x-8 gap-y-6">
                                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->selectedFormulario->informacion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $informacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">Servicio a
                                                            prestar</p>
                                                        <p class="text-sm text-slate-900">
                                                            <?php echo e($informacion->servicio_a_prestar ?? 'No especificado'); ?>

                                                        </p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>

                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">Frecuencia de
                                                            suministro</p>
                                                        <p class="text-sm text-slate-900">
                                                            <?php echo e($informacion->frecuencia_suministro ?? 'No especificado'); ?>

                                                        </p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>

                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">Fecha de inicio
                                                        </p>
                                                        <p class="text-sm text-slate-900">
                                                            <?php echo e(\Carbon\Carbon::parse($informacion->fecha_inicio)->format('Y-m-d') ?? 'No especificado'); ?>

                                                        </p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>

                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">Fecha de
                                                            finalización</p>
                                                        <p class="text-sm text-slate-900">
                                                            <?php echo e(\Carbon\Carbon::parse($informacion->fecha_finalizacion)->format('Y-m-d') ?? 'No especificado'); ?>

                                                        </p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Pago -->
                                    <div class="bg-white rounded-lg shadow-md border border-slate-200">
                                        <div class="border-b border-slate-200 px-6 py-4 bg-indigo-50">
                                            <h2 class="text-lg font-semibold text-slate-900">Información del Pago
                                            </h2>
                                        </div>

                                        <div class="p-6">
                                            <div class="grid md:grid-cols-2 gap-x-8 gap-y-6">
                                                <div class="space-y-1">
                                                    <p class="text-sm font-medium text-black">Forma de pago</p>
                                                    <p class="text-sm text-slate-900">
                                                        $ <?php echo e($selectedFormulario->forma_pago ?? 'No especificado'); ?>

                                                    </p>
                                                    <div class="h-px bg-slate-200 mt-2"></div>
                                                </div>

                                                <div class="space-y-1">
                                                    <p class="text-sm font-medium text-black">Forma de pago</p>
                                                    <p class="text-sm text-slate-900">
                                                        $
                                                        <?php echo e($selectedFormulario->fecha_cada_pago ?? 'No especificado'); ?>

                                                    </p>
                                                    <div class="h-px bg-slate-200 mt-2"></div>
                                                </div>

                                                <div class="space-y-1">
                                                    <p class="text-sm font-medium text-black">Moneda</p>
                                                    <p class="text-sm text-slate-900">
                                                        $ <?php echo e($selectedFormulario->moneda ?? 'No especificado'); ?>

                                                    </p>
                                                    <div class="h-px bg-slate-200 mt-2"></div>
                                                </div>

                                                <div class="space-y-1">
                                                    <p class="text-sm font-medium text-black">¿Incluye IVA?</p>
                                                    <p class="text-sm text-slate-900">
                                                        <?php echo e($selectedFormulario->incluir_iva == 1 ? 'Sí' : 'No'); ?>

                                                    </p>
                                                    <div class="h-px bg-slate-200 mt-2"></div>
                                                </div>

                                                <div class="space-y-1">
                                                    <p class="text-sm font-medium text-black">¿Hay anticipo?</p>
                                                    <p class="text-sm text-slate-900">
                                                        <?php echo e($selectedFormulario->hay_anticipo == 1 ? 'Sí' : 'No'); ?>

                                                    </p>

                                                    <div class="h-px bg-slate-200 mt-2"></div>
                                                </div>

                                                <div class="space-y-1">
                                                    <p class="text-sm font-medium text-black">Porcentaje del anticipo
                                                    </p>
                                                    <p class="text-sm text-slate-900">
                                                        <?php echo e($selectedFormulario->porcentaje_anticipo ?? 'No especificado'); ?>

                                                    </p>
                                                    <div class="h-px bg-slate-200 mt-2"></div>
                                                </div>

                                                <div class="space-y-1">
                                                    <p class="text-sm font-medium text-black">Fecha del anticipo</p>
                                                    <p class="text-sm text-slate-900">
                                                        <?php echo e($selectedFormulario->fecha_pago_anticipo ?? 'No especificado'); ?>

                                                    </p>
                                                    <div class="h-px bg-slate-200 mt-2"></div>
                                                </div>

                                                <div class="space-y-1">
                                                    <p class="text-sm font-medium text-black">Otros</p>
                                                    <p class="text-sm text-slate-900">
                                                        <?php echo e($selectedFormulario->otros_pago ?? 'No especificado'); ?>

                                                    </p>
                                                    <div class="h-px bg-slate-200 mt-2"></div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>


                                    <!-- Garantia -->
                                    <div class="bg-white rounded-lg shadow-md border border-slate-200">
                                        <div class="border-b border-slate-200 px-6 py-4 bg-indigo-50">
                                            <h2 class="text-lg font-semibold text-slate-900">Garantias</h2>
                                        </div>

                                        <div class="p-6">
                                            <div class="flex space-x-8">
                                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->selectedFormulario->informacion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $informacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $informacion->producto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="space-y-1 w-1/2">
                                                            <p class="text-sm font-medium text-black">¿Aplica algún
                                                                tipo de garantía?</p>
                                                            <p class="text-sm text-slate-900">
                                                                <?php echo e($producto->aplica_garantia ?? 'No especificado'); ?>

                                                            </p>
                                                            <div class="h-px bg-slate-200 mt-2"></div>
                                                        </div>


                                                        <div class="space-y-1 w-1/2">
                                                            <p class="text-sm font-medium text-black">¿Cuál es el
                                                                termino de la garantía?</p>
                                                            <p class="text-sm text-slate-900">
                                                                <?php echo e($producto->termino_garantia ?? 'No especificado'); ?>

                                                            </p>
                                                            <div class="h-px bg-slate-200 mt-2"></div>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Pólizas -->
                                    <div class="bg-white rounded-lg shadow-md border border-slate-200">
                                        <div class="border-b border-slate-200 px-6 py-4 bg-indigo-50">
                                            <h2 class="text-lg font-semibold text-slate-900">Pólizas</h2>
                                        </div>

                                        <div class="p-6">
                                            <div class="grid md:grid-cols-2 gap-x-8 gap-y-6">
                                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->selectedFormulario->informacion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $informacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $informacion->producto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div>
                                                            <p
                                                                class="text-sm font-medium text-black whitespace-nowrap mb-2">
                                                                ¿Aplica algún tipo de póliza?
                                                            <p class="text-sm text-slate-900 whitespace-nowrap">
                                                                <?php echo e($producto->aplica_poliza ?? 'No especificado'); ?>

                                                            </p>
                                                            <div class="h-px bg-slate-200 mt-2"></div>
                                                        </div>
                                                        <div>
                                                            <p
                                                                class="text-sm font-medium text-black whitespace-nowrap mb-2">
                                                                ¿Cuál es el porcentaje?
                                                            <p class="text-sm text-slate-900 whitespace-nowrap">
                                                                
                                                                
                                                                <?php echo e($producto->porcentaje_poliza ?? 'No especificado'); ?>


                                                                %

                                                            </p>
                                                            <div class="h-px bg-slate-200 mt-2"></div>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                            </div>
                                        </div>
                                    </div>






                                    <h4 class="text-3xl font-bold mb-6 text-center text-stone-950 tracking-wide">
                                        Información condiciones operaciones
                                    </h4>
                                    <!-- logística -->
                                    <div class="bg-white rounded-lg shadow-md border border-slate-200">
                                        <div class="border-b border-slate-200 px-6 py-4 bg-indigo-50">
                                            <h2 class="text-lg font-semibold text-slate-900">Logística</h2>
                                        </div>

                                        <div class="p-6">
                                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->selectedFormulario->infoEntrega; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $infoEntrega): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="grid md:grid-cols-2 gap-x-8 gap-y-6">

                                                    <!-- entrega a cliente -->
                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">¿Quien realiza la
                                                            entrega a cliente?</p>
                                                        <p class="text-sm text-slate-900">
                                                            <?php echo e($infoEntrega->entrega_cliente ?? 'No especificado'); ?>

                                                        </p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>

                                                    <!-- Lugar de entrega -->
                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">Lugar de entrega</p>
                                                        <p class="text-sm text-slate-900">
                                                            <?php echo e($infoEntrega->lugar_entrega ?? 'No especificado'); ?>

                                                        </p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>

                                                    <!-- Icoterm -->
                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">Especificar pais</p>
                                                        <p class="text-sm text-slate-900">
                                                            <?php echo e($infoEntrega->pais ?? 'No especificado'); ?>

                                                        </p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>


                                                    <!-- Puerto -->
                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">Puerto</p>
                                                        <p class="text-sm text-slate-900">
                                                            <?php echo e($infoEntrega->puerto ?? 'No especificado'); ?>

                                                        </p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>

                                                    <!-- Icoterm -->
                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">Icoterm</p>
                                                        <p class="text-sm text-slate-900">
                                                            <?php echo e($infoEntrega->incoterm ?? 'No especificado'); ?>

                                                        </p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>


                                                    <!-- Transporte -->
                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">Transporte</p>
                                                        <p class="text-sm text-slate-900">
                                                            <?php echo e($infoEntrega->transporte ?? 'No especificado'); ?>

                                                        </p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>

                                                    <!-- Origen -->
                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">Origen</p>
                                                        <p class="text-sm text-slate-900">
                                                            <?php echo e($infoEntrega->origen ?? 'No especificado'); ?>

                                                        </p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>

                                                    <!-- Destino -->
                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">Destino</p>
                                                        <p class="text-sm text-slate-900">
                                                            <?php echo e($infoEntrega->destino ?? 'No especificado'); ?>

                                                        </p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>

                                                    <!-- Condiciones -->
                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">Condiciones de
                                                            entrega local</p>
                                                        <p class="text-sm text-slate-900">
                                                            <?php echo e($infoEntrega->condiciones ?? 'No especificado'); ?>

                                                        </p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>

                                                    <!-- Otros -->
                                                    <div class="space-y-1">
                                                        <p class="text-sm font-medium text-black">Otros</p>
                                                        <p class="text-sm text-slate-900">
                                                            <?php echo e($infoEntrega->otros ?? 'No especificado'); ?>

                                                        </p>
                                                        <div class="h-px bg-slate-200 mt-2"></div>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                        </div>
                                    </div>




                                    <h4 class="text-3xl font-bold mb-6 text-center text-stone-950 tracking-wide">
                                        Información condiciones financieras
                                    </h4>
                                    <?php
                                        $financierasValidas = $this->selectedFormulario->financiera->filter(function (
                                            $fin,
                                        ) {
                                            return $fin->forma_pago ||
                                                $fin->plazo ||
                                                $fin->moneda ||
                                                $fin->garantiascredit ||
                                                $fin->existencia_anticipo ||
                                                $fin->porcentaje ||
                                                $fin->fecha_pago ||
                                                $fin->otros;
                                        });
                                    ?>
                                    

                                    <div class="bg-white rounded-lg shadow-md border border-slate-200">
                                        <div class="border-b border-slate-200 px-6 py-4 bg-indigo-50">
                                            <h2 class="text-lg font-semibold text-slate-900">Condiciones Pago</h2>
                                        </div>
                                        <div class="p-6">
                                            <div class="grid md:grid-cols-3 gap-x-8 gap-y-6">
                                                <!--[if BLOCK]><![endif]--><?php if($financierasValidas->isNotEmpty()): ?>
                                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->selectedFormulario->financiera; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $financiera): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="space-y-1">
                                                            <p class="text-sm font-medium text-black">Forma De Pago</p>
                                                            <p class="text-sm text-slate-900">
                                                                <?php echo e($financiera->forma_pago ?? 'No especificado'); ?>

                                                            </p>
                                                            <div class="h-px bg-slate-200 mt-2"></div>
                                                        </div>

                                                        

                                                        <div class="space-y-1">
                                                            <p class="text-sm font-medium text-black">Plazo</p>
                                                            <p class="text-sm text-slate-900">
                                                                <?php echo e($financiera->plazo ?? 'No especificado'); ?>

                                                            </p>
                                                            <div class="h-px bg-slate-200 mt-2"></div>
                                                        </div>

                                                        <div class="space-y-1">
                                                            <p class="text-sm font-medium text-black">Moneda</p>
                                                            <p class="text-sm text-slate-900">
                                                                <?php echo e($financiera->moneda ?? 'No especificado'); ?>

                                                            </p>
                                                            <div class="h-px bg-slate-200 mt-2"></div>
                                                        </div>

                                                        <div class="space-y-1">
                                                            <p class="text-sm font-medium text-black">Garantías de
                                                                Crédito</p>
                                                            <p class="text-sm text-slate-900">
                                                                <?php echo e($financiera->garantiascredit ?? 'No especificado'); ?>

                                                            </p>
                                                            <div class="h-px bg-slate-200 mt-2"></div>
                                                        </div>

                                                        <div class="space-y-1">
                                                            <p class="text-sm font-medium text-black">¿Hay existencia
                                                                de anticipo?</p>
                                                            <p class="text-sm text-slate-900">
                                                                <?php echo e($financiera->existencia_anticipo ? 'Sí' : 'No'); ?>

                                                            </p>
                                                            <div class="h-px bg-slate-200 mt-2"></div>
                                                        </div>

                                                        <div class="space-y-1">
                                                            <p class="text-sm font-medium text-black">¿Qué porcentaje?
                                                            </p>
                                                            <p class="text-sm text-slate-900">
                                                                <!--[if BLOCK]><![endif]--><?php if(isset($financiera->porcentaje)): ?>
                                                                    <?php echo e(number_format($financiera->porcentaje, 0)); ?>%
                                                                <?php else: ?>
                                                                    N.A
                                                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                            </p>
                                                            <div class="h-px bg-slate-200 mt-2"></div>
                                                        </div>
                                                        <div class="space-y-1">
                                                            <p class="text-sm font-medium text-black">Fecha de pago del
                                                                anticipo</p>
                                                            <p class="text-sm text-slate-900">
                                                                <!--[if BLOCK]><![endif]--><?php if(isset($financiera->fecha_pago)): ?>
                                                                    <?php echo e(\Carbon\Carbon::parse($financiera->fecha_pago)->format('Y-m-d')); ?>

                                                                <?php else: ?>
                                                                    N.A
                                                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                            </p>
                                                            <div class="h-px bg-slate-200 mt-2"></div>
                                                        </div>

                                                        <div class="space-y-1">
                                                            <p class="text-sm font-medium text-black">Otros</p>
                                                            <p class="text-sm text-slate-900">
                                                                <?php echo e($financiera->otros ?? 'No especificado'); ?>

                                                            </p>
                                                            <div class="h-px bg-slate-200 mt-2"></div>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Archivos Adjuntos -->
                                    <div class="bg-white rounded-xl shadow-lg border border-slate-200 mt-6">
                                        <div
                                            class="border-b border-slate-200 px-6 py-4 bg-gradient-to-r from-indigo-50 to-white">
                                            <h2 class="text-lg font-semibold text-gray-800">Archivos Adjuntos o
                                                Anexos
                                            </h2>
                                        </div>

                                        <div class="p-6">
                                            <!--[if BLOCK]><![endif]--><?php if($selectedFormulario->documento->count() > 0): ?>
                                                <div class="space-y-4">
                                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $selectedFormulario->documento; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $documento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div
                                                            class="w-full bg-white rounded-lg shadow-sm hover:shadow-md transition-all duration-200 overflow-hidden border border-slate-200">
                                                            <div
                                                                class="flex items-center justify-between p-3 space-x-3">
                                                                <!-- Icono con estilo que combina -->
                                                                <div
                                                                    class="p-2.5 rounded-lg bg-blue-50 border border-blue-100">
                                                                    <i
                                                                        class="fas fa-<?php echo e($this->getFileIcon($documento->nombre_original)); ?> text-2xl text-blue-600"></i>
                                                                </div>

                                                                <!-- Nombre del documento -->
                                                                <h3 class="flex-1 text-sm font-medium text-slate-700 truncate"
                                                                    title="<?php echo e($documento->nombre_original); ?>">
                                                                    <?php echo e($documento->nombre_original); ?>

                                                                </h3>

                                                                <!-- Botón de ver -->
                                                                <a href="<?php echo e(route('documentos.ver', $documento)); ?>"
                                                                    target="_blank"
                                                                    class="inline-flex items-center px-3.5 py-1.5 text-xs font-medium text-blue-700 bg-blue-50 rounded-md hover:bg-blue-100 border border-blue-200 transition-colors duration-200">
                                                                    <i class="ri-eye-line mr-1.5"></i>
                                                                    Ver
                                                                </a>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                                </div>
                                            <?php else: ?>
                                                <div class="text-center text-gray-500 p-4 bg-gray-100 rounded-lg">
                                                    <p>No se han adjuntado archivos para este formulario.</p>
                                                </div>
                                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                        </div>
                                    </div>
                                </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
</div>


<script>
    function closeAlert() {
        document.getElementById('alert').style.display = 'none';
    }
</script>
<?php /**PATH C:\laragon\www\ImpreForms\resources\views/livewire/formularios-recibidos.blade.php ENDPATH**/ ?>