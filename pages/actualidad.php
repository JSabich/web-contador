<?php
$pageTitle = "Actualidad";
include __DIR__ . "/../includes/header.php";
?>

<main class="container py-5">

    <section class="mb-5">
        <h2 class="mb-3">Actualidad Contable y Fiscal</h2>
        <p class="text-muted">
            En este espacio compartimos novedades relevantes del ámbito contable, impositivo,
            laboral y societario. Información clara y actualizada para acompañar la toma de
            decisiones de empresas y contribuyentes.
        </p>
    </section>

    <div class="row">

        <!-- COLUMNA CENTRAL -->
        <div class="col-md-8">

            <!-- BUSCADOR (INACTIVO) -->
            <section class="mb-4">
                <form method="get" action="#" autocomplete="off">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="row g-2 align-items-end">
                                <div class="col-md-9">
                                    <label for="q" class="form-label mb-1">
                                        Buscar en el archivo de noticias
                                    </label>
                                    <input
                                        type="text"
                                        id="q"
                                        name="q"
                                        class="form-control"
                                        placeholder="Palabras clave, tema o normativa"
                                        disabled>
                                </div>
                                <div class="col-md-3 d-grid">
                                    <button
                                        type="submit"
                                        class="btn btn-outline-secondary"
                                        disabled>
                                        Buscar
                                    </button>
                                </div>
                            </div>
                            <small class="text-muted d-block mt-2">
                                Próximamente podrá consultar noticias publicadas anteriormente.
                            </small>
                        </div>
                    </div>
                </form>
            </section>

            <!-- NOTICIAS -->
            <section class="mb-5">
                <h3 class="mb-4">Últimas Novedades</h3>

                <article class="mb-4">
                    <h5>Actualizaciones en el régimen de Monotributo</h5>
                    <p class="text-muted mb-1">Publicado: 10/01/2026</p>
                    <p>
                        Se introdujeron modificaciones en las escalas y parámetros del régimen
                        simplificado. Analizamos su impacto en pequeños contribuyentes.
                    </p>
                </article>

                <article class="mb-4">
                    <h5>Modificaciones recientes en cargas sociales</h5>
                    <p class="text-muted mb-1">Publicado: 05/01/2026</p>
                    <p>
                        Cambios normativos que afectan la liquidación de sueldos y contribuciones
                        patronales durante el primer trimestre del año.
                    </p>
                </article>

                <article class="mb-4">
                    <h5>Novedades de interés profesional</h5>
                    <p class="text-muted mb-1">Publicado: 02/01/2026</p>
                    <p>
                        Comunicaciones recientes de los Consejos Profesionales y organismos de
                        control relevantes para el ejercicio profesional.
                    </p>
                </article>
            </section>

        </div>

        <!-- SIDEBAR -->
        <div class="col-md-4">
            <aside class="mb-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-light">
                        <strong>Indicadores en tiempo real</strong>
                    </div>
                    <div class="card-body">
                        <div id="indicadores-feed">
                            <p class="text-muted mb-0">
                                Cargando información económica actualizada…
                            </p>
                        </div>
                    </div>
                </div>
            </aside>
        </div>

    </div>

</main>

<?php include __DIR__ . "/../includes/footer.php"; ?>