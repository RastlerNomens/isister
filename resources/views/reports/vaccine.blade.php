<html>
<head>
  <style>
    body{
      font-family: sans-serif;
    }
    @page {
      margin: 160px 50px;
    }
    header { position: fixed;
      left: 0px;
      top: -160px;
      right: 0px;
      height: 100px;
      background-color: #ddd;
      text-align: center;
    }
    header h1{
      margin: 10px 0;
    }
    header h2{
      margin: 0 0 10px 0;
    }
    footer {
      position: fixed;
      left: 0px;
      bottom: -50px;
      right: 0px;
      height: 40px;
      border-bottom: 2px solid #ddd;
    }
    footer .page:after {
      content: counter(page);
    }
    footer table {
      width: 100%;
    }
    footer p {
      text-align: right;
    }
    footer .izq {
      text-align: left;
    }
    .borderless {
        border-collapse: collapse;
        border: none;
    }
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }
    tr:nth-child(even) {
        background-color: #dddddd;
    }
  </style>
<body>
  <header>
    <h1>{{$pet['name']}}</h1>
    <h2>Informe de Vacunas</h2>
  </header>
  <footer>
    <table>
      <tr>
        <td class="borderless">
            <p class="izq">
              Isister
            </p>
        </td>
        <td class="borderless">
          <p class="page">
            Página
          </p>
        </td>
      </tr>
    </table>
  </footer>
  <div id="content">
    <table>
        <tr>
            <th>Nombre</th>
            <th>Fecha</th>
            <th>Proxima dosis</th>
            <th>Peso</th>
            <th>Nº Lote</th>
            <th>Veterinario</th>
        </tr>
        @foreach($vaccines as $vaccine)
        <tr>
            <td>
                @foreach($diseases as $disease)
                    @if ($disease['id'] == $vaccine['type'])
                        {{$disease['name']}}
                    @endif
                @endforeach
            </td>
            <td>
                {{$vaccine['date']}}
            </td>
            <td>
                {{$vaccine['next']}}
            </td>
            <td>
                {{$vaccine['weigth']}}
            </td>
            <td>
                {{$vaccine['batch']}}
            </td>
            <td>
                {{$vaccine['veterinary']}}
            </td>
        </tr>
        @endforeach
    </table>
  </div>
</body>
</html>