<form id="formulario" class="mb-4" data-aos="fade-down">
    <input class="bg-dark border radius px-4 py-1 w-50 text-light buscar" type="text" id="buscar-titulo" placeholder="Encuentra tu manga">
    <button class="btn btn-primary border radius px-3" type="submit">Buscar</button>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('formulario').addEventListener('submit', function(event) {
            event.preventDefault();

            let buscarTitulo = document.getElementById('buscar-titulo').value.toLowerCase();

            let mangas = document.getElementsByClassName('manga');

            for (let i = 0; i < mangas.length; i++) {
                let manga = mangas[i];
                let titulo = manga.querySelector('.titulo-manga').textContent.toLowerCase();

                if (titulo.includes(buscarTitulo)) {
                    manga.style.display = 'block';
                } else {
                    manga.style.display = 'none';
                }
            }
        });
    });
</script>