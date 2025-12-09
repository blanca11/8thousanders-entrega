
import Alpine from 'alpinejs'

document.addEventListener('alpine:init', () => {
  Alpine.data('artistaForm', (initialGenero = null, initialSubgenero = null) => ({
    generoSeleccionado: initialGenero,
    subgeneroSeleccionado: initialSubgenero,
    subgeneros: [],

    cargarSubgeneros() {
      if (! this.generoSeleccionado) {
        this.subgeneros = []
        return
      }

      let url = `/admin/artistas/subgeneros/${this.generoSeleccionado}`;

      fetch(url)
        .then((res) => res.json())
        .then((data) => {
          this.subgeneros = data
        })
        .catch(() => {
          this.subgeneros = []
        })
    },
  }))
})
