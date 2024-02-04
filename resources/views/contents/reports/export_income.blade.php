<table>
    <thead>
    <tr>
        <th>Tanggal Beli</th>
        <th>Nama Produk</th>
        <th>Kuantitas</th>
        <th>Total Harga</th>
    </tr>
    </thead>
    <tbody>
    @foreach($transactions as $transaction)
    @php $rowspan = count($transaction->products); @endphp
        <tr >
            <td rowspan="{{ $rowspan }}"> {{ $transaction->created_at }}</td>
        @for($i = 0; $i < 1; $i++)
            <td>
                {{$transaction->products[$i]->name }}
            </td>
            <td>
                {{ $transaction->products[$i]->pieces}}
            </td>
        @endfor
        </tr>
        @for($i = 1; $i < $rowspan; $i++)
        <tr>
            <td>
                {{ $transaction->products[$i]->name }}
            </td>
            <td>
                {{ $transaction->products[$i]->pieces }}
            </td>
            @if ($rowspan == ($i + 1))
                <td> Rp. {{ $transaction->price }}</td>
            @endif
        </tr>
        @endfor
    @endforeach
    </tbody>
</table>
