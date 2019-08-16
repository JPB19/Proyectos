window.addEventListener('load' , function() {

//capturo el formulario

var theForm = document.querySelector('form');

//traigo todos los Imputs

var fImputs = Array.from (theForm.elements);

//imagenes permitidas

var allowedExtensions = /(.jpg|.jpeg|.png|.gif)$/i;


//saco primer posición

fImputs.shift();

//saco la ultima

fImputs.pop();

// objeto literal para la validación

var errorsObj = {};

//Expresión regular para el email

var regexEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.([a-zA-Z]{2,4})+$/;

//console.log(regexEmail.test("julian@yahoo.com.ar"));

var valorPassword = null;

// recorro los imputs para asignarle el evento on blur


fImputs.forEach(function (unImput) {
  unImput.addEventListener('blur' , function () {

    if (this.value.trim() === '' ) {

      // agrego al div el texo de console.error;
      if (this.name == 'avatar') {
        this.parentElement.classList.add('is-invalid');
        this.parentElement.nextElementSibling.innerHTML = 'Este campo <b>' + this.name + '</b> es obligatorio';
      } else {
        this.classList.add('is-invalid');
        this.nextElementSibling.innerHTML = 'Este campo <b>' + this.name + '</b> es obligatorio';
      }

      errorsObj[this.name] = true;
    }
    else {
      //saco que no es valido
      this.classList.remove('is-invalid');
      // agrego clase valido
      this.classList.add('is-valid');

      //saco el texo del sibling

      this.nextElementSibling.innerHTML = '';

      //elimino el valor la key del objeto en caso de que todo este ok

      delete errorsObj[this.name];

      //validacion de los tipos de datos

      if (this.name === 'name') {
        if(this.value.length > 20){

          this.classList.add('is-invalid');
          this.nextElementSibling.innerHTML = 'El nombre no puede superar los 20 caracteres';

          errorsObj[this.name] = true;

        }
      }

      if (this.name === 'user') {
        if(this.value.length > 20){

          this.classList.add('is-invalid');
          this.nextElementSibling.innerHTML = 'El nombre no puede superar los 20 caracteres';

          errorsObj[this.name] = true;

        }
      }

      if (this.name === 'email') {
        if (!regexEmail.test(this.value.trim())) {
          this.classList.add('is-invalid');
          this.nextElementSibling.innerHTML = 'Este campo tiene que tener Formato Email';

          errorsObj[this.name] = true;

        }

      }

      if (this.name ==='avatar') {

        //if (this.value !== allowedExtensions ) {
          if (!allowedExtensions.test(this.value)) {
          this.parentElement.classList.add('is-invalid');
          this.parentElement.nextElementSibling.innerHTML ='Los formatos perimtidos son jpg,jpeg,png,gif';

          errorsObj[this.name] = true;
        }
      }


      if(this.name === 'password'){

        if (this.value.length < 5) {
          this.classList.add('is-invalid');
          this.nextElementSibling.innerHTML = 'Este campo tiene que tener como minimo 5 caracteres';

          errorsObj[this.name] = true;
        }
        if (!this.value.match(/DH/g)) {
          this.classList.add('is-invalid');
          this.nextElementSibling.innerHTML = 'Este campo tiene que tener los caracteres "DH"';

          errorsObj[this.name] = true;
        }

        valorPassword = this.value;

      }

    }

    console.log(errorsObj);

    if(this.name === 'password_confirmation'){

      if (valorPassword) {
        var valorRePassword = this.value;
        console.log(valorPassword);
        console.log(valorRePassword);

        if (valorPassword != valorRePassword){

          this.classList.add('is-invalid');
          this.nextElementSibling.innerHTML = 'Las contraseñas no coinciden';

          errorsObj[this.name] = true;
        }

      }
    }



  })

});

//evito si los campos estan vacios que envie el formulario

theForm.addEventListener('submit',function(event) {

  fImputs.forEach(function (elInput) {

    // si los campos estan vacios
      if (elInput.value.trim() === '') {
        //asigno una key de errores en el objeto error
        errorsObj[elInput.name] = true;

        //traigo la clase css del div de invalid
        elInput.classList.add('is-invalid');
        //muestro el mensaje
        elInput.nextElementSibling.innerHTML = 'Este campo <b>' + elInput.name + '</b> es obligatorio';
      }
  });

  console.log('campos con errores' , errorsObj);

  if (Object.city(errorsObj)) {
    Object.city(errorsObj) = false;
  }

  if (Object.keys(errorsObj).length > 0){
    event.preventDefault();
  }
});

});
