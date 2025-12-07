<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="card text-center p-5" style="max-width: 600px; background: linear-gradient(135deg, #f8fbff, #eef5ff);">
        <div class="mb-3">
            <span style="font-size: 40px;">🎓</span>
        </div>
        <h3 class="fw-bold text-primary">Selamat Datang, <?php echo e(Auth::user()->name); ?>!</h3>
        <p class="mt-2 text-secondary">
            Anda login sebagai Admin
            <strong class="<?php echo e(Auth::user()->role == 'admin' ? 'text-danger' : 'text-success'); ?>">
                <?php echo e(ucfirst(Auth::user()->role)); ?>

            </strong>.
        </p>

        <?php if(Auth::user()->role == 'admin'): ?>
            <p>Kelola data kampus melalui menu berikut:</p>
            <div class="d-flex flex-wrap justify-content-center gap-3 mt-3">
                <a href="<?php echo e(route('mahasiswa.index')); ?>" class="btn btn-primary px-4 py-2">
                    👩‍🎓 Data Mahasiswa
                </a>
                <a href="<?php echo e(route('dosen.index')); ?>" class="btn btn-success px-4 py-2">
                    👨‍🏫 Data Dosen
                </a>
                <a href="<?php echo e(route('proyek.index')); ?>" class="btn btn-warning px-4 py-2">
                    📘 Data Proyek
                </a>
            </div>
        <?php else: ?>
            <p class="mt-3">Anda hanya dapat melihat informasi umum.</p>
            <a href="#" class="btn btn-outline-primary mt-3">
                🔍 Lihat Informasi
            </a>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\sistem-manajemen-kampus\resources\views/dashboard.blade.php ENDPATH**/ ?>