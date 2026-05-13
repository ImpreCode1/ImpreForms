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
        <div class="min-h-screen bg-gradient-to-b from-gray-50 to-gray-100 py-8 px-4">
            <div class="max-w-7xl mx-auto">
                <div class="mb-6">
                    <h2 class="text-2xl font-bold text-center text-gray-900">Gestionar Usuarios</h2>
                    <p class="text-center text-gray-600 mt-1 text-sm">Administra los usuarios de la plataforma</p>
                </div>

                <form method="GET" action="<?php echo e(route('gestionar-usuarios')); ?>" class="mb-4">
                    <input type="text" name="search" value="<?php echo e($search); ?>" placeholder="Buscar usuarios..."
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                </form>

                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="overflow-x-auto" style="max-height: 60vh; overflow-y: auto;">
                        <table class="w-full min-w-full">
                            <thead class="bg-gray-50 sticky top-0 z-10">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rol</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                                    <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-3 text-sm text-gray-900 max-w-xs truncate"><?php echo e($user->name); ?></td>
                                    <td class="px-4 py-3 text-sm text-gray-500 max-w-xs truncate"><?php echo e($user->email); ?></td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <form method="POST" action="<?php echo e(route('usuarios.updateRol', $user->id)); ?>">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PATCH'); ?>
                                            <select name="rol" onchange="this.form.submit()" 
                                                class="text-xs border border-gray-300 rounded px-2 py-1.5 bg-white min-w-[100px] cursor-pointer hover:border-indigo-400 focus:outline-none focus:ring-1 focus:ring-indigo-500">
                                                <option value="Admin" <?php echo e($user->rol === 'Admin' ? 'selected' : ''); ?>>Administrador</option>
                                                <option value="User" <?php echo e($user->rol === 'User' ? 'selected' : ''); ?>>Usuario</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-500 whitespace-nowrap"><?php echo e($user->created_at->format('d/m/Y')); ?></td>
                                    <td class="px-4 py-3 whitespace-nowrap text-right">
                                        <form method="POST" action="<?php echo e(route('usuarios.destroy', $user->id)); ?>" class="inline">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="text-red-600 hover:text-red-900 p-1" onclick="return confirm('¿Eliminar usuario?')">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="px-4 py-3 border-t border-gray-200 bg-gray-50">
                        <?php echo $__env->make('components.pagination', ['paginator' => $users], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    </div>
                </div>
            </div>
        </div>

        <?php if(session('success')): ?>
        <div class="fixed top-5 right-5 z-50 flex items-center p-4 text-sm text-green-800 bg-green-200 border-l-4 border-green-600 rounded-lg shadow-xl">
            <?php echo e(session('success')); ?>

        </div>
        <?php endif; ?>
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
</div><?php /**PATH C:\laragon\www\ImpreForms\resources\views/gestionar-usuarios/index.blade.php ENDPATH**/ ?>