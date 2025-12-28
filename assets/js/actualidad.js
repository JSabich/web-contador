document.addEventListener("DOMContentLoaded", () => {
    const container = document.getElementById("indicadores-feed");
    if (!container) return;

    const CONFIG = {
        dolarApiUrl: "https://dolarapi.com/v1/dolares",
        riesgoApiUrl: "https://api.argentinadatos.com/v1/finanzas/indices/riesgo-pais",
        tiposDolar: ["oficial", "blue", "mep", "ccl"],
        carouselId: "carouselIndicadores",
        interval: 4000
    };

    const REFERENCIAS = {
        oficial: "Tipo de cambio oficial (BCRA)",
        blue: "Mercado informal",
        mep: "Dólar MEP",
        ccl: "Contado con Liquidación"
    };

    // ==================================================
    // FETCH DÓLAR
    // ==================================================
    const fetchDolar = fetch(CONFIG.dolarApiUrl)
        .then(r => {
            if (!r.ok) throw new Error("Error API dólar");
            return r.json();
        })
        .then(data => {
            return data
                .filter(item => CONFIG.tiposDolar.includes(item.casa))
                .map(item => ({
                    titulo: item.nombre.replace("Dólar ", ""),
                    valor: `$${Number(item.venta).toLocaleString("es-AR")}`,
                    referencia: REFERENCIAS[item.casa] || "Referencia"
                }));
        });

    // ==================================================
    // FETCH RIESGO PAÍS
    // ==================================================
    const fetchRiesgo = fetch(CONFIG.riesgoApiUrl)
        .then(r => {
            if (!r.ok) throw new Error("Error API riesgo país");
            return r.json();
        })
        .then(data => {
            // La API devuelve un array; usamos el último valor
            const ultimo = data[data.length - 1];

            return {
                titulo: "Riesgo País",
                valor: `${Number(ultimo.valor).toLocaleString("es-AR")} pts`,
                referencia: `Fuente: ArgentinaDatos (${ultimo.fecha})`
            };
        });

    // ==================================================
    // EJECUCIÓN CONJUNTA
    // ==================================================
    Promise.all([fetchDolar, fetchRiesgo])
        .then(([indicadoresDolar, indicadorRiesgo]) => {
            const indicadores = [
                ...indicadoresDolar,
                indicadorRiesgo
            ];
            renderCarousel(indicadores);
        })
        .catch(() => {
            container.innerHTML = `
                <p class="text-danger mb-0">
                    No se pudo cargar la información económica.
                </p>
            `;
        });

    // ==================================================
    // RENDER CARRUSEL
    // ==================================================
    function renderCarousel(indicadores) {

        const carousel = document.createElement("div");
        carousel.id = CONFIG.carouselId;
        carousel.className = "carousel slide";
        carousel.setAttribute("data-bs-ride", "carousel");

        const indicators = document.createElement("div");
        indicators.className = "carousel-indicators";

        const inner = document.createElement("div");
        inner.className = "carousel-inner";

        indicadores.forEach((item, index) => {

            // Puntitos indicadores
            const btn = document.createElement("button");
            btn.type = "button";
            btn.setAttribute("data-bs-target", `#${CONFIG.carouselId}`);
            btn.setAttribute("data-bs-slide-to", index);
            if (index === 0) btn.className = "active";
            indicators.appendChild(btn);

            // Slide
            const slide = document.createElement("div");
            slide.className = `carousel-item${index === 0 ? " active" : ""}`;

            const card = document.createElement("div");
            card.className = "p-3 border rounded text-center";

            const titulo = document.createElement("strong");
            titulo.textContent = item.titulo;

            const valor = document.createElement("div");
            valor.className = "fs-4 my-1";
            valor.textContent = item.valor;

            const ref = document.createElement("small");
            ref.className = "text-muted";
            ref.textContent = item.referencia;

            card.appendChild(titulo);
            card.appendChild(valor);
            card.appendChild(ref);
            slide.appendChild(card);
            inner.appendChild(slide);
        });

        carousel.appendChild(indicators);
        carousel.appendChild(inner);

        container.innerHTML = "";
        container.appendChild(carousel);

        new bootstrap.Carousel(carousel, {
            interval: CONFIG.interval,
            ride: "carousel",
            pause: "hover"
        });
    }
});
