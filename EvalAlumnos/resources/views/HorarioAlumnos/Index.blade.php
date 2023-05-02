<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Horarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</head>
<body>
    <script>
        function mostrarNombre() {


            if(document.querySelector('input[name="tipo"][value="1"]:checked')){
                var opcionSeleccionada = document.querySelector('input[name="inlineRadioOptions1"]:checked');
                var opcionSeleccionada2 = document.querySelector('input[name="inlineRadioOptions2"]:checked');
                var valorOpcionSeleccionada ="Teoria-" + opcionSeleccionada.value + " de "+ opcionSeleccionada2.value;
            }

            if(document.querySelector('input[name="tipo"][value="2"]:checked')){
                var opcionSeleccionada = document.querySelector('input[name="inlineRadioOptions3"]:checked');
                var opcionSeleccionada2 = document.querySelector('input[name="inlineRadioOptions4"]:checked');
                var valorOpcionSeleccionada ="Practica-" + opcionSeleccionada.value + " de "+ opcionSeleccionada2.value;
            }



            document.getElementById("tipocl").value = valorOpcionSeleccionada;



        }

        function editar(){
            document.getElementById("normalicion").hidden = false;
            document.getElementById("creacion").hidden = true;
        }

        function normal(){
            document.getElementById("normalicion").hidden = true;
            document.getElementById("creacion").hidden = false;
        }

        function sel1(){
            document.getElementById("teorias").hidden = false;
            document.getElementById("practicas").hidden = true;

            var radios = document.querySelectorAll('input[type="radio"][name="inlineRadioOptions3"]');
                for (var i = 0; i < radios.length; i++) {
                radios[i].checked = false;
                }

            var radios2 = document.querySelectorAll('input[type="radio"][name="inlineRadioOptions4"]');
                for (var ii = 0; ii < radios2.length; ii++) {
                radios2[ii].checked = false;
                }

        }

        function sel2(){
            document.getElementById("teorias").hidden = true;
            document.getElementById("practicas").hidden = false;

            var radios = document.querySelectorAll('input[type="radio"][name="inlineRadioOptions1"]');
                for (var i = 0; i < radios.length; i++) {
                radios[i].checked = false;
                }

            var radios2 = document.querySelectorAll('input[type="radio"][name="inlineRadioOptions2"]');
                for (var ii = 0; ii < radios2.length; ii++) {
                radios2[ii].checked = false;
                }

        }
      </script>

    <h1 class="display-2 text-center">Registrar Alumno</h1>
    <hr>
    <div class="card container" style="width: 25rem;">
        <div class="card-body">
            <form id="crear" action="{{route('horarioalumnos.store')}}" method="POST">
                @csrf
                <div class="container">

                    <div class="border">
                        <div class="input-group mb-3" style="padding: 6px">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroup-sizing-default">Dui:</span>
                            </div>
                            <input type="text" name="dui" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                          </div>

                        <div class="input-group mb-3" style="padding: 6px">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroup-sizing-default">Nombre:</span>
                            </div>
                            <input type="text" name="nombre" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                          </div>


                          <div class="input-group mb-3" style="padding: 6px">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroup-sizing-default">Apellido:</span>
                            </div>
                            <input type="text" name="apellido" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                          </div>

                          <div class="input-group mb-3" style="padding: 6px">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroup-sizing-default">Grupo:</span>
                            </div>
                            <input type="text" name="grupo" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                          </div>
                    </div>

                    <div class="border">
                        <div style="padding: 6px">
                            <label>Seleccione Tipo:</label>
                            <br>
                            <div class="form-check form-check-inline">
                                <input onclick="sel1()" class="form-check-input" type="radio" name="tipo" value="1">
                                <label class="form-check-label" >Teoria</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input onclick="sel2()" class="form-check-input" type="radio" name="tipo" value="2">
                                <label class="form-check-label" >Practica</label>
                            </div>
                        </div>
                    </div>

                        <div class="border" id="teorias" hidden>
                            <div style="padding: 6px">
                                <label>Dia de Teoria:</label>
                                <br>
                                <div class="form-check form-check-inline">
                                    <input onclick="mostrarNombre()" class="form-check-input" type="radio" name="inlineRadioOptions1" id="inlineRadio11" value="Lunes">
                                    <label class="form-check-label" for="inlineRadio1">Lunes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input onclick="mostrarNombre()" class="form-check-input" type="radio" name="inlineRadioOptions1" id="inlineRadio12" value="Miercoles">
                                    <label class="form-check-label" for="inlineRadio2">Miercoles</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input onclick="mostrarNombre()" class="form-check-input" type="radio" name="inlineRadioOptions1" id="inlineRadio13" value="Viernes">
                                    <label class="form-check-label" for="inlineRadio3">Viernes</label>
                                </div>
                            </div>

                            <div style="padding: 6px">
                                <label>Hora de Teoria:</label>
                                <br>
                                <div class="form-check form-check-inline">
                                    <input onclick="mostrarNombre()" class="form-check-input" type="radio" name="inlineRadioOptions2" id="inlineRadio21" value="10am-12pm">
                                    <label class="form-check-label" for="inlineRadio1">10am-12pm</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input onclick="mostrarNombre()" class="form-check-input" type="radio" name="inlineRadioOptions2" id="inlineRadio22" value="4pm-6pm">
                                    <label class="form-check-label" for="inlineRadio2">4pm-6pm</label>
                                </div>
                            </div>
                        </div>

                        <div class="border" id="practicas" hidden>
                            <div style="padding: 6px">
                                <label>Dia de Practica:</label>
                                <br>
                                <div class="form-check form-check-inline">
                                    <input onclick="mostrarNombre()" class="form-check-input" type="radio" name="inlineRadioOptions3" id="inlineRadio31" value="Lunes a Viernes">
                                    <label class="form-check-label" for="inlineRadio1">Lunes a Viernes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input onclick="mostrarNombre()" class="form-check-input" type="radio" name="inlineRadioOptions3" id="inlineRadio32" value="Sabado a Domingo" disabled>
                                    <label class="form-check-label" for="inlineRadio2">Sabado a Domingo</label>
                                </div>

                            </div>

                            <div style="padding: 6px">
                                <label>Hora de Laboratorio:</label>
                                <br>
                                <div class="form-check form-check-inline">
                                    <input onclick="mostrarNombre()" class="form-check-input" type="radio" name="inlineRadioOptions4" id="inlineRadio41" value="8am-10am">
                                    <label class="form-check-label" for="inlineRadio1">8am-10am</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input onclick="mostrarNombre()" class="form-check-input" type="radio" name="inlineRadioOptions4" id="inlineRadio42" value="10am-12pm">
                                    <label class="form-check-label" for="inlineRadio2">10am-12pm</label>
                                </div>
                            </div>
                        </div>

                        <input type="text" id="tipocl" name="hora" hidden>

                        <div style="padding: 6px">
                            <button id="creacion" myform="crear" class="btn btn-primary">Crear</button>
                            <button onclick="normal()" myform="editar" id="normalicion" class="btn btn-primary" hidden>Modificar</button>
                        </div>

                    </div>

             </form>
        </div>
      </div>
      <hr>


    <hr>
    <div class="container text-center">
        <table class="table border">
            <thead>
                <th>Id</th>
                <th>DUI</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Grupo</th>
                <th>Horario</th>
                <th>Eliminar</th>
            </thead>
            <tbody>
                @foreach ($horarios as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->dui}}</td>
                        <td>{{$item->nombre}}</td>
                        <td>{{$item->apellido}}</td>
                        <td>{{$item->grupo}}</td>
                        <td>{{$item->hora}}</td>


                            <form action="{{route('horarioalumnos.destroy', $item->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <td>
                                <button type="submit" class="btn btn-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                            </form>


                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</body>
</html>
