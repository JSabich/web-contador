<footer class="footer bg-dark text-white text-center py-4 mt-5">
    <div class="container">
        © <?= date('Y') ?> Sabich y Asociados. Todos los derechos reservados.
    </div>
</footer>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<?php if (isset($pageTitle) && $pageTitle === 'Actualidad'): ?>
    <script src="<?= BASE_URL; ?>assets/js/actualidad.js"></script>
<?php endif; ?>

</body>

</html>