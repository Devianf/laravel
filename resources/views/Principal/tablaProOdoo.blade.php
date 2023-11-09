
<table class="table">
    <thead>
        <tr>
                <th>Name</th>
                <th>Product Type</th>
                <th>Sales Price</th> 
                <th>Cost</th>
                <th>Weight</th>
                <th>Sales Description</th>
                <th>image</th>
                <th>Marca</th>               
                <th>Internal Reference</th>
        </tr>
    </thead>
    <tbody>
        @foreach($excel as $excel)
        <tr>
        <td>{{ $excel->NOMPRODUCTO}}</td>
        <td>Almacenable</td>
        <td>{{ $excel->VENTA}}</td>
        <td>{{ $excel->SOLES}}</td>
        <td></td>
        <td>{{ $excel->NOMPRODUCTO}}</td>
        <td>{{ str_replace('https://imagenes.deltron.com.pe', 'https://www.deltron.com.pe', $excel->URLI) }}</td>
        <td>{{ $excel->MARCA}}</td>
        <td>{{ $excel->CODPRODUCTO}}</td>
        
        </tr>
        @endforeach
    </tbody>
</table>