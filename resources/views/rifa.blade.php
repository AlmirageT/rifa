
        @extends('layouts.public.app')
        @section('content')
        
        <main class="main">
                <div class="container">
    <br> 

            <h2 class="display-4 azul centrar-titulos wow zoomIn">Prueba tu suerte y podrás ganar</h2>
      
     
 <div class="contenedor-premios wow slideInUp">
     <div class="cont-premios"><img class="img-premios" src="{{ asset('img/premios.png') }}" alt="segundo premio">
     <p><strong>Números de la Victoria</strong><br>8 premios de $1.000.000.- cada uno</p></div>
      <div class="cont-premio-mayor"><img class="img-premios" src="{{ asset('img/premio-mayor.png') }}" alt="primer premio"><p><strong>Primer Lugar</strong><br>Departamento de Lujo<br>Moto de Agua<br>Kit Palos de Golf <br>$2.000.000.- en efectivo</p></div>
      <div class="cont-premios"><img class="img-premios" src="{{ asset('img/premio-final.png') }}" alt="tercer premio"><strong>Último Premio</strong><br>$500.000.-</div>
 </div>
 <br>
            </div>
             <br>
          
        </main> <br> <br>
        <div class="container wow slideInUp">
            <br>
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{ asset('comprar-numeros') }}">
                        @csrf
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" name="nombreUsuario" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Correo</label>
                            <input type="email" name="correoUsuario" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Teléfono</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">+56</span>
                              </div>
                              <input type="number" class="form-control" name="telefonoUsuario" aria-describedby="basic-addon1" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>RUT/DNI/Pasaporte</label>
                            <input type="text" name="rutUsuario" class="form-control" id="rut" required>
                        </div>
                        <div class="form-group">
                            <label>Números</label>
                            <select class="js-example-basic-multiple form-control" id="numeros" name="numeros[]" multiple required>
                                @foreach($numeros as $numero)
                                    <option value="{{ $numero->idNumero }}">{{ $numero->numero }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <p>Total: <span id="total">$0</span></p>
                            <input type="hidden" id="totalOculto" name="totalOculto">
                        </div>
                        <div align="center">
                            <button class="btn btn-primary" type="submit">Comprar Número</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
@endsection
        @section('scripts')

        <script type="text/javascript">
            $(document).on('keypress', '.select2-search__field', function () {
                $(this).val($(this).val().replace(/[^\d].+/, ""));
                if ((event.which < 48 || event.which > 57)) {
                  event.preventDefault();
                }
            });
            $(document).ready(function(){
                $('.js-example-basic-multiple').select2({
                    language: "es",
                    placeholder: "Ingrese un número",
                    minimumInputLength: 3,
                    ajax: {
                        url: '{{ asset('api/numeros') }}',
                        dataType: "json",
                        type: "GET",
                        data: function (params) {
                            var queryParameters = {
                                consulta: params.term
                            }
                            return queryParameters;
                        },
                        processResults: function (data) {
                            var myResults = [];
                            $.each(data, function (index, item) {
                                myResults.push({
                                    'id': item.idNumero,
                                    'text': item.numero
                                });
                            });
                            return {
                                results: myResults
                            };
                        }
                    }
                });
            });
        </script>
        <script type="text/javascript">
            
            let $select = $('#numeros');
            $select.on('change', () => {
              let selecteds = [];

              // Buscamos los option seleccionados
              $select.children(':selected').each((idx, el) => {
                // Obtenemos los atributos que necesitamos
                selecteds.push({
                  id: el.id,
                  value: el.value
                });
              });
              
              //
              const cantidadNumeros = selecteds.length; 
              let total = 20000*cantidadNumeros;
              let valorFormatoCLP = Math.trunc(total).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
              document.getElementById('totalOculto').value = total;
              document.getElementById('total').innerHTML = '$'+valorFormatoCLP;
            });
        </script>
@endsection
