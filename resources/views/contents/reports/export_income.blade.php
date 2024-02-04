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
        <tr>
            <td rowspan="{{ $rowspan }}"> {{ $transaction->created_at }}</td>
        @for($i = 0; $i < 1; $i++)
            <td>
                {{$transaction->products[$i]->name }}
            </td>
            <td>
                {{ $transaction->products[$i]->pieces}}
            </td>
            <td> Rp. {{ $transaction->price }}</td>
        @endfor
        </tr>
        @if(count($transaction->products) > 0)
            @for($i = 0; $i < ($rowspan - 1); $i++)
            <tr>
                <td>
                    {{ $transaction->products[$i]->name }}
                </td>
                <td>
                    {{ $transaction->products[$i]->pieces }}
                </td>
            </tr>
            @endfor
        @else
            <tr>
                <td>
                    {{ $transaction->products[0]->name }}
                </td>
                <td>
                    {{ $transaction->products[0]->pieces }}
                </td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>
