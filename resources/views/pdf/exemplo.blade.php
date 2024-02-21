<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <h2>Relatório</h2>

    <table>
        <thead>
            <tr>
                <th>Tipo de Pergunta</th>
                <th>Pergunta</th>
                <th>Resposta</th>
            </tr>
        </thead>
        <tbody>
            @foreach($responses as $response)
                <tr>
                    @if($response['form']['form_type'] == 'dados_pessoais')
                        <td>Dados Pessoais</td>
                    @elseif($response['form']['form_type'] == 'profissional')
                        <td>Profissional</td>
                    @elseif($response['form']['form_type'] == 'academico')
                        <td>Acadêmico</td>
                    @elseif($response['form']['form_type'] == 'feedback')
                        <td>Feedback</td>
                    @endif
                    <td>{{ $response['form']['question'] }}</td>
                    <td>
                        @if(is_array($response['value']))
                            {{ implode(', ', $response['value']) }}
                        @else
                            {{ $response['value'] }}
                        @endif
                    </td>
                    <!-- Adicione mais colunas conforme necessário -->
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
