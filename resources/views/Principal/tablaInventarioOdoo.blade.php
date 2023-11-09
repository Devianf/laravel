<table class="table">
    <thead>
        <tr>
                <th>Internal Reference</th>
                <th>Product</th>
                <th>Lot/Serial Number</th> 
                <th>Quantity</th>
                <th>Counted Quantity</th>
                <th>Difference</th>
                <th>Scheduled Date</th>
                <th>Assigned To</th>
        </tr>
    </thead>
    <tbody>
        @foreach($excel as $excel)
        <tr>
        <td>{{ $excel->CODPRODUCTO}}</td>
        <td>{{ $excel->NOMPRODUCTO}}</td>
        <td></td>
        <td></td>
        <td>{{ $excel->STOCK}}</td>
        <td></td>
        <td>{{ \Carbon\Carbon::now()->toDateString() }}</td>
        <td></td>
        </tr>
        @endforeach
    </tbody>
</table>