
        @extends('layouts.public.app')
        @section('content')
        
        <main class="main">
                <div class="container">
            <br> 
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-1">
                  <div class="p-5 linea padding">
                           <h2 class="display-4 azul ">Escoge tus números preferidos.</h2>
                  </div>
                </div>
                <div class="col-lg-6 order-lg-2 ">
                  <div class="p-5 linea-bottom">
                    <p class="">Desde el número 100 en adelante .....</p>

                  </div>
                </div>
              </div>
             <br>
            </div>
             <br>
          
        </main> <br> <br>
        <div class="container">
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
                              <input type="text" class="form-control" name="telefonoUsuario" aria-describedby="basic-addon1" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Rut</label>
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
                    placeholder: "Ingrese un numero",
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
