<?php
$pageTitle = "Recursos";
require_once __DIR__ . "/../includes/config.php";
include __DIR__ . "/../includes/header.php";
?>

<main class="container py-5">

    <!-- ============================= -->
    <!-- ENCABEZADO -->
    <!-- ============================= -->
    <header class="mb-5">
        <h1 class="mb-3">Recursos</h1>
        <p class="text-muted">
            Recursos útiles para contribuyentes, empresas y profesionales del ámbito
            contable, financiero, tributario y laboral.
        </p>
    </header>

    <!-- ============================= -->
    <!-- ACORDEÓN PRINCIPAL -->
    <!-- ============================= -->
    <section class="accordion" id="recursosAccordion">

        <!-- ============================= -->
        <!-- VENCIMIENTOS -->
        <!-- ============================= -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingVencimientos">
                <button class="accordion-button"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapseVencimientos"
                        aria-expanded="true">
                    📅 Vencimientos impositivos
                </button>
            </h2>

            <div id="collapseVencimientos"
                 class="accordion-collapse collapse show"
                 data-bs-parent="#recursosAccordion">

                <div class="accordion-body">

                    <p class="text-muted">
                        Calendarios orientativos de vencimientos. Las fechas pueden variar
                        según normativa vigente y terminación de CUIT.
                    </p>

                    <div class="list-group">

                        <div class="list-group-item">
                            <strong>IVA</strong>
                            <div class="small text-muted">
                                Declaración jurada mensual y pagos.
                            </div>
                        </div>

                        <div class="list-group-item">
                            <strong>Impuesto a las Ganancias</strong>
                            <div class="small text-muted">
                                Personas humanas y sociedades.
                            </div>
                        </div>

                        <div class="list-group-item">
                            <strong>Ingresos Brutos</strong>
                            <div class="small text-muted">
                                Régimen local y convenios.
                            </div>
                        </div>

                        <div class="list-group-item">
                            <strong>Monotributo</strong>
                            <div class="small text-muted">
                                Pagos mensuales y recategorizaciones.
                            </div>
                        </div>

                        <div class="list-group-item">
                            <strong>Autónomos</strong>
                            <div class="small text-muted">
                                Aportes previsionales.
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <!-- ============================= -->
        <!-- PLANILLAS -->
        <!-- ============================= -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingPlanillas">
                <button class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapsePlanillas">
                    📊 Planillas y modelos
                </button>
            </h2>

            <div id="collapsePlanillas"
                 class="accordion-collapse collapse"
                 data-bs-parent="#recursosAccordion">

                <div class="accordion-body">

                    <div class="row g-3">

                        <div class="col-md-6">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">Planilla de control mensual</h5>
                                    <p class="card-text small text-muted">
                                        Registro básico de ingresos, egresos e impuestos.
                                    </p>
                                    <button class="btn btn-outline-secondary btn-sm" disabled>
                                        Próximamente
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">Modelo de flujo de fondos</h5>
                                    <p class="card-text small text-muted">
                                        Análisis financiero proyectado.
                                    </p>
                                    <button class="btn btn-outline-secondary btn-sm" disabled>
                                        Próximamente
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <!-- ============================= -->
        <!-- DOCUMENTOS -->
        <!-- ============================= -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingDocumentos">
                <button class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapseDocumentos">
                    📄 Documentos y guías
                </button>
            </h2>

            <div id="collapseDocumentos"
                 class="accordion-collapse collapse"
                 data-bs-parent="#recursosAccordion">

                <div class="accordion-body">

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            Guía básica para monotributistas
                        </li>
                        <li class="list-group-item">
                            Documentación habitual requerida para trámites contables
                        </li>
                    </ul>

                </div>
            </div>
        </div>

        <!-- ============================= -->
        <!-- LINKS DE INTERÉS -->
        <!-- ============================= -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingLinks">
                <button class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapseLinks">
                    🔗 Links de interés
                </button>
            </h2>

            <div id="collapseLinks"
                 class="accordion-collapse collapse"
                 data-bs-parent="#recursosAccordion">

                <div class="accordion-body">

                    <h5>Organismos públicos</h5>
                    <ul>
                        <li>ARCA</li>
                        <li>ANSES</li>
                        <li>AGIP</li>
                        <li>ARBA</li>
                        <li>INTI</li>
                    </ul>

                    <h5 class="mt-3">Ámbito laboral</h5>
                    <ul>
                        <li>Superintendencia de Riesgos del Trabajo</li>
                        <li>Ministerio de Trabajo</li>
                    </ul>

                    <h5 class="mt-3">Ámbito impositivo y contable</h5>
                    <ul>
                        <li>Consejo Profesional de Ciencias Económicas</li>
                        <li>Boletín Oficial</li>
                    </ul>

                </div>
            </div>
        </div>

    </section>

</main>

<?php include __DIR__ . "/../includes/footer.php"; ?>
