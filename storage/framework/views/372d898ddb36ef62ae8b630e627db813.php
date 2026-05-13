<div class="flex items-center justify-between">
    <div class="text-xs text-gray-500">
        Página <?php echo e($paginator->currentPage()); ?> de <?php echo e($paginator->lastPage()); ?>

    </div>
    <div class="flex items-center gap-1">
        <?php if($paginator->onFirstPage()): ?>
            <span class="px-2 py-1 text-xs text-gray-400 bg-gray-100 rounded">Ant</span>
        <?php else: ?>
            <a href="<?php echo e($paginator->previousPageUrl()); ?>" class="px-2 py-1 text-xs bg-white border border-gray-300 rounded hover:bg-gray-50 text-gray-700">Ant</a>
        <?php endif; ?>

        <?php for($i = 1; $i <= $paginator->lastPage(); $i++): ?>
            <?php if($i >= $paginator->currentPage() - 1 && $i <= $paginator->currentPage() + 1): ?>
                <?php if($i == $paginator->currentPage()): ?>
                    <span class="px-2 py-1 text-xs bg-indigo-600 text-white rounded"><?php echo e($i); ?></span>
                <?php else: ?>
                    <a href="<?php echo e($paginator->url($i)); ?>" class="px-2 py-1 text-xs bg-white border border-gray-300 rounded hover:bg-gray-50 text-gray-700"><?php echo e($i); ?></a>
                <?php endif; ?>
            <?php endif; ?>
        <?php endfor; ?>

        <?php if($paginator->hasMorePages()): ?>
            <a href="<?php echo e($paginator->nextPageUrl()); ?>" class="px-2 py-1 text-xs bg-white border border-gray-300 rounded hover:bg-gray-50 text-gray-700">Sig</a>
        <?php else: ?>
            <span class="px-2 py-1 text-xs text-gray-400 bg-gray-100 rounded">Sig</span>
        <?php endif; ?>
    </div>
</div><?php /**PATH C:\laragon\www\ImpreForms\resources\views/components/pagination.blade.php ENDPATH**/ ?>