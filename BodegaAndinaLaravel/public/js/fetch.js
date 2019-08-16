window.addEventListener('load' , function() {

  var selectPaises = document.querySelector('#country');
  var selectProvincias = document.querySelector('#provincia');
  var contenedorProvincias = selectProvincias.parentElement.parentElement;

//console.log(selectPaises);
//console.log(selectProvincias);
  //llamo por FETCH

  function llamoporFetch(endPoint , callback) {
    fetch(endPoint)
    .then(function (response) {
      return response.json();
    })
    .then(function (data) {
      callback(data);
    })
    .catch(function (error) {
      console.log('error de fetch : ' + error);
    });

  }

  //Traigo los Paises al select con un foreach

  function paisesFetch(paises) {
    paises.forEach(function (pais) {
      selectPaises.innerHTML += `<option value="${pais.name}">${pais.name}</option>`;

    });

  }

//Traigo la api de los paises con la funcion llamoporFetch y los inserto en el select con la funcion


llamoporFetch('https://restcountries.eu/rest/v2/all' , paisesFetch);

//Ahora hago el select de provincias

function provinciasFetch(provincia) {
  provincia.provincias.forEach(function (unaProvincia) {
    selectProvincias.innerHTML += `<option value="${unaProvincia.nombre}">${unaProvincia.nombre}</option>`;
  })

}
selectPaises.addEventListener('change', function () {
  if (this.value.toLowerCase() === 'argentina') {
    contenedorProvincias.style.display = 'flex';
    llamoporFetch('https://apis.datos.gob.ar/georef/api/provincias' , provinciasFetch);
  }
  else {
    contenedorProvincias.style.display = 'none';
    selectProvincias.innerHTML = '<option value="">Seleccione una Provincia</option>'
  }

})

});
