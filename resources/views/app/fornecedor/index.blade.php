<h3>Fornecedor</h3>

@isset($fornecedores)

  @foreach($fornecedores as $indice => $fornecedores)
    Fornecedor:{{ $fornecedores['nome'] }}
    <br>
    Status:{{ $fornecedores['status']}}
    <br>
    CNPJ:{{$fornecedores['cnpj']}}
    <br>
    Telefone:({{$fornecedores['ddd'] ?? ''}}) {{$fornecedores['telefone'] ?? ''}}
    <hr>
  @endforeach

  <br>
@endisset