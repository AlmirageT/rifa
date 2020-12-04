        @extends('layouts.public.app')
        @section('content')
        
        <div class="container">
            <br>
            <br>
            <br>
            <br>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <h4>HAZ UNA TRANSFERENCIA</h4><br>
                            <p>
                                Muchas gracias por tu preferencia. Para activar tus números simplemente haz una transferencia a la siguiente cuenta bancaria e indica el numero de boleta en las notas de tu transferencia. <br>  <br>  
                                Una vez realices el pago, validaremos el ingreso y te enviaremos un email con tu comprobante de compra y los números asociados a tu transacción. <br> <br>
                                Suerte!!

                            </p>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h5><strong>Datos bancarios</strong></h5><br>
                                            <p><strong>IsBast REAL ESTATE TECHNOLOGY SPA</strong></p>
                                            <p><strong></strong></p>
                                        </div>
                                        <div class="col-lg-6">
                                            <p>Cuenta corriente: <strong id="p1">Banco ITAU 0214320278</strong></p>
                                        </div>
                                        <div class="col-lg-6" align="right">
                                            <a style="color: blue;cursor: pointer;" onclick="copiarAlPortapapeles('p1')">copiar</a>
                                        </div>
                                        <div class="col-lg-6">
                                            <p>Rut: <strong id="p2">76.697.209-8</strong></p>
                                        </div>
                                        <div class="col-lg-6" align="right">
                                            <a style="cursor: pointer;color: blue" onclick="copiarAlPortapapeles('p2')">copiar</a>
                                        </div>
                                        <div class="col-lg-6">
                                            <p>Email: <strong id="p3">pagos@rifomipropiedad.com</strong></p>
                                        </div>
                                        <div class="col-lg-6" align="right">
                                            <a style="cursor: pointer;color: blue" onclick="copiarAlPortapapeles('p3')">copiar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12"><br></div>
                        <div class="col-lg-6"></div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                   <div class="row">
                                        <div class="col-lg-6">
                                            <h5><strong>Números</strong></h5>
                                        </div>
                                        <div class="col-lg-6" align="right">
                                            <h5><strong>Total</strong></h5>
                                        </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    @foreach($numerosComprados as $numero)
                                                        <div class="col-lg-3">
                                                           <p>{{ $numero }}</p>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        <div class="col-lg-6" align="right">
                                            <p> ${{ number_format($total,0,',','.') }}</p>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <a href="{{  url()->previous() }}" class="btn btn-primary">Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

        <script type="text/javascript">
            function copiarAlPortapapeles(id_elemento) {
              var aux = document.createElement("input");
              aux.setAttribute("value", document.getElementById(id_elemento).innerHTML);
              document.body.appendChild(aux);
              aux.select();
              document.execCommand("copy");
              document.body.removeChild(aux);
              alert("Texto Copiado");
            }
        </script>
