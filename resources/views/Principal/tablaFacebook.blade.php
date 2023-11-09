
<table class="table">
    <thead>
        <tr>
                <th>id</th>
                <th>title</th>
                <th>description</th> 
                <th>availability</th>
                <th>condition</th>
                <th>price</th>
                <th>link</th>
                <th>image_link</th> 
                <th>brand</th>
                <th>google_product_category</th>
        </tr>
    </thead>
    <tbody>
        @foreach($excel as $excel)
        <tr>
        <td>{{ $excel->ID}}</td>
        <td>{{ $excel->NOMPRODUCTO}}</td>
        <td>{{ $excel->NOMPRODUCTO}}</td>
        <td>in stock</td>
        <td>new</td>
        <td>{{ $excel->VENTA}}</td>
        <td>{{ $excel->URLP}}</td>
        <td>{{ str_replace('https://imagenes.deltron.com.pe', 'https://www.deltron.com.pe', $excel->URLI) }}</td>
        <td>{{ $excel->MARCA}}</td>
        
            @if($excel->CATEGORIA == 'acc, muebles de computo')
                <td>Electrónica > Ordenadores y tabletas > Componentes y hardware para ordenadores</td>
            @elseif($excel->CATEGORIA == 'accesorios')
                <td>Electrónica > Accesorios</td>
            @elseif($excel->CATEGORIA == 'accesorios usb')
                <td>Electrónica > Accesorios > Cables, cargadores y adaptadores</td>
            @elseif($excel->CATEGORIA == 'barebones para pc')
                <td>Electrónica > Ordenadores y tabletas > Componentes y hardware para ordenadores</td>
            @elseif($excel->CATEGORIA == 'cases atx p4 ver1.1')
                <td>Electrónica > Ordenadores y tabletas > Componentes y hardware para ordenadores</td>
            @elseif($excel->CATEGORIA == 'cases atx ver2.0')
                <td>Electrónica > Ordenadores y tabletas > Componentes y hardware para ordenadores</td>
            @elseif($excel->CATEGORIA == 'cases con fuente p/gamers')
                <td>Electronica > Consolas de videojuegos y videojuegos > Accesorios para videojuegos</td>
            @elseif($excel->CATEGORIA == 'cases micro atx')
                <td>Electrónica > Ordenadores y tabletas > Componentes y hardware para ordenadores</td>
            @elseif($excel->CATEGORIA == 'cases sin fuente p/gamers')
                <td>Electronica > Consolas de videojuegos y videojuegos > Accesorios para videojuegos</td>
            @elseif($excel->CATEGORIA == 'cases, accesorios')
                <td>Electrónica > Accesorios > Periféricos para ordenadores</td>
            @elseif($excel->CATEGORIA == 'cases, fan')
                <td>Electrónica > Accesorios > Periféricos para ordenadores</td>
            @elseif($excel->CATEGORIA == 'cases, fuente para')
                <td>Electrónica > Accesorios > Periféricos para ordenadores</td>
            @elseif($excel->CATEGORIA == 'cases, fuente para gaming')
                <td>Electrónica > Accesorios > Periféricos para ordenadores</td>
            @elseif($excel->CATEGORIA == 'computadora aio celeron')
                <td>Electrónica > Ordenadores y tabletas > Ordenadores de sobremesa</td>
            @elseif($excel->CATEGORIA == 'computadora aio core i3')
                <td>Electrónica > Ordenadores y tabletas > Ordenadores de sobremesa</td>
            @elseif($excel->CATEGORIA == 'computadora aio core i5')
                <td>Electrónica > Ordenadores y tabletas > Ordenadores de sobremesa</td>
            @elseif($excel->CATEGORIA == 'computadora core i3')
                <td>Electrónica > Ordenadores y tabletas > Ordenadores de sobremesa</td>
            @elseif($excel->CATEGORIA == 'computadora core i5')
                <td>Electrónica > Ordenadores y tabletas > Ordenadores de sobremesa</td>
            @elseif($excel->CATEGORIA == 'computadora core i7')
                <td>Electrónica > Ordenadores y tabletas > Ordenadores de sobremesa</td>
            @elseif($excel->CATEGORIA == 'cpu amd ryzen 5 sam4 3xxx')
                <td>Electrónica > Ordenadores y tabletas > Componentes y hardware para ordenadores</td>
            @elseif($excel->CATEGORIA == 'cpu amd ryzen 5 sam4 4xxx')
                <td>Electrónica > Ordenadores y tabletas > Componentes y hardware para ordenadores</td>
            @elseif($excel->CATEGORIA == 'cpu amd ryzen 5 sam4 5xxx')
                <td>Electrónica > Ordenadores y tabletas > Componentes y hardware para ordenadores</td>
            @elseif($excel->CATEGORIA == 'cpu amd ryzen 5 sam5 7xxx')
                <td>Electrónica > Ordenadores y tabletas > Componentes y hardware para ordenadores</td>
            @elseif($excel->CATEGORIA == 'cpu amd ryzen 7 sam4 2xxx')
                <td>Electrónica > Ordenadores y tabletas > Componentes y hardware para ordenadores</td>
            @elseif($excel->CATEGORIA == 'cpu amd ryzen 7 sam4 5xxx')
                <td>Electrónica > Ordenadores y tabletas > Componentes y hardware para ordenadores</td>
            @elseif($excel->CATEGORIA == 'cpu amd ryzen 9 sam4 5xxx')
                <td>Electrónica > Ordenadores y tabletas > Componentes y hardware para ordenadores</td>
            @elseif($excel->CATEGORIA == 'cpu amd ryzen 9 sam5 7xxx')
                <td>Electrónica > Ordenadores y tabletas > Componentes y hardware para ordenadores</td>
            @elseif($excel->CATEGORIA == 'cpu ci3 10xxx s1200')
                <td>Electrónica > Ordenadores y tabletas > Componentes y hardware para ordenadores</td>
            @elseif($excel->CATEGORIA == 'cpu ci3 12xxx s1700')
                <td>Electrónica > Ordenadores y tabletas > Componentes y hardware para ordenadores</td>
            @elseif($excel->CATEGORIA == 'cpu ci3 9xxx s1151-v2')
                <td>Electrónica > Ordenadores y tabletas > Componentes y hardware para ordenadores</td>
            @elseif($excel->CATEGORIA == 'cpu ci5 10xxx s1200')
                <td>Electrónica > Ordenadores y tabletas > Componentes y hardware para ordenadores</td>
            @elseif($excel->CATEGORIA == 'cpu ci5 11xxx s1200')
                <td>Electrónica > Ordenadores y tabletas > Componentes y hardware para ordenadores</td>
            @elseif($excel->CATEGORIA == 'cpu ci5 12xxx s1700')
                <td>Electrónica > Ordenadores y tabletas > Componentes y hardware para ordenadores</td>
            @elseif($excel->CATEGORIA == 'cpu ci5 7xxx s1151')
                <td>Electrónica > Ordenadores y tabletas > Componentes y hardware para ordenadores</td>
            @elseif($excel->CATEGORIA == 'cpu ci5 8xxx s1151-v2')
                <td>Electrónica > Ordenadores y tabletas > Componentes y hardware para ordenadores</td>
            @elseif($excel->CATEGORIA == 'cpu ci5 9xxx s1151-v2')
                <td>Electrónica > Ordenadores y tabletas > Componentes y hardware para ordenadores</td>
            @elseif($excel->CATEGORIA == 'cpu ci7 10xxx s1200')
                <td>Electrónica > Ordenadores y tabletas > Componentes y hardware para ordenadores</td>
            @elseif($excel->CATEGORIA == 'cpu ci7 11xxx s1200')
                <td>Electrónica > Ordenadores y tabletas > Componentes y hardware para ordenadores</td>
            @elseif($excel->CATEGORIA == 'cpu ci7 12xxx s1700')
                <td>Electrónica > Ordenadores y tabletas > Componentes y hardware para ordenadores</td>
            @elseif($excel->CATEGORIA == 'cpu ci7 13xxx s1700')
                <td>Electrónica > Ordenadores y tabletas > Componentes y hardware para ordenadores</td>
            @elseif($excel->CATEGORIA == 'cpu ci7 7xxx s1151')
                <td>Electrónica > Ordenadores y tabletas > Componentes y hardware para ordenadores</td>
            @elseif($excel->CATEGORIA == 'cpu ci9 12xxx s1700')
                <td>Electrónica > Ordenadores y tabletas > Componentes y hardware para ordenadores</td>
            @elseif($excel->CATEGORIA == 'cpu, cooler/adaptador de')
                <td>Electrónica > Ordenadores y tabletas > Componentes y hardware para ordenadores</td>
            @elseif($excel->CATEGORIA == 'disco duro 3.5 sata')
                <td>Electrónica > Ordenadores y tabletas > Componentes y hardware para ordenadores</td>
            @elseif($excel->CATEGORIA == 'disco duro externo')
                <td>Electrónica > Accesorios > Dispositivos de almacenamiento multimedia vacíos</td>
            @elseif($excel->CATEGORIA == 'disco duro externo 2.5')
                <td>Electrónica > Accesorios > Dispositivos de almacenamiento multimedia vacíos</td>
            @elseif($excel->CATEGORIA == 'disco duro solido externo')
                <td>Electrónica > Accesorios > Dispositivos de almacenamiento multimedia vacíos</td>
            @elseif($excel->CATEGORIA == 'disco duro ssd 2.5')
                <td>Electrónica > Ordenadores y tabletas > Componentes y hardware para ordenadores</td>
            @elseif($excel->CATEGORIA == 'disco duro ssd m.2 nvme')
                <td>Electrónica > Ordenadores y tabletas > Componentes y hardware para ordenadores</td>
            @elseif($excel->CATEGORIA == 'disco duro ssd m.2 sata')
                <td>Electrónica > Ordenadores y tabletas > Componentes y hardware para ordenadores</td>
            @elseif($excel->CATEGORIA == 'disco duro ssd, otros')
                <td>Electrónica > Ordenadores y tabletas > Componentes y hardware para ordenadores</td>
            @elseif($excel->CATEGORIA == 'dvd-writer sata')
                <td>Electrónica > Ordenadores y tabletas > Componentes y hardware para ordenadores</td>
            @elseif($excel->CATEGORIA == 'estabilizador de tension')
                <td>Electrónica > Accesorios > Pilas y fuentes de alimentación</td>
            @elseif($excel->CATEGORIA == 'imagenes, accesorios disp')
                <td>Electrónica > Accesorios > Periféricos para ordenadores</td>
            @elseif($excel->CATEGORIA == 'imagenes, proyector')
                <td>Electrónica > Proyectores</td>
            @elseif($excel->CATEGORIA == 'impresora de tinta')
                <td>Electronica > Impresoras y escáneres</td>
            @elseif($excel->CATEGORIA == 'impresora multifun tinta')
                <td>Electronica > Impresoras y escáneres</td>
            @elseif($excel->CATEGORIA == 'impresora termica')
                <td>Electronica > Impresoras y escáneres</td>
            @elseif($excel->CATEGORIA == 'mb ci7 s1151-v2')
                <td>Electrónica > Ordenadores y tabletas > Componentes y hardware para ordenadores</td>
            @elseif($excel->CATEGORIA == 'mb ci7 s1200')
                <td>Electrónica > Ordenadores y tabletas > Componentes y hardware para ordenadores</td>
            @elseif($excel->CATEGORIA == 'mb ci7 s1200 gaming')
                <td>Electrónica > Ordenadores y tabletas > Componentes y hardware para ordenadores</td>
            @elseif($excel->CATEGORIA == 'mb ci9 s1700')
                <td>Electrónica > Ordenadores y tabletas > Componentes y hardware para ordenadores</td>
            @elseif($excel->CATEGORIA == 'mb ci9 s1700 gaming')
                <td>Electrónica > Ordenadores y tabletas > Componentes y hardware para ordenadores</td>
            @elseif($excel->CATEGORIA == 'mb socket am4 amd')
                <td>Electrónica > Ordenadores y tabletas > Componentes y hardware para ordenadores</td>
            @elseif($excel->CATEGORIA == 'mb socket am4 amd gaming')
                <td>Electrónica > Ordenadores y tabletas > Componentes y hardware para ordenadores</td>
            @elseif($excel->CATEGORIA == 'mb socket am5 amd')
                <td>Electrónica > Ordenadores y tabletas > Componentes y hardware para ordenadores</td>
            @elseif($excel->CATEGORIA == 'mb socket am5 amd gaming')
                <td>Electrónica > Ordenadores y tabletas > Componentes y hardware para ordenadores</td>
            @elseif($excel->CATEGORIA == 'mb socket i c/cpu intel')
                <td>Electrónica > Ordenadores y tabletas > Componentes y hardware para ordenadores</td>
            @elseif($excel->CATEGORIA == 'mem ddr3 1600 pc3-12800')
                <td>Electrónica > Ordenadores y tabletas > Componentes y hardware para ordenadores</td>
            @elseif($excel->CATEGORIA == 'mem ddr4 2666 pc4-21300')
                <td>Electrónica > Ordenadores y tabletas > Componentes y hardware para ordenadores</td>
            @elseif($excel->CATEGORIA == 'mem ddr4 3200 pc4-25600')
                <td>Electrónica > Ordenadores y tabletas > Componentes y hardware para ordenadores</td>
            @elseif($excel->CATEGORIA == 'mem ddr4 3600 pc4-28800')
                <td>Electrónica > Ordenadores y tabletas > Componentes y hardware para ordenadores</td>
            @elseif($excel->CATEGORIA == 'mem ddr5 5200 pc5-41600')
                <td>Electrónica > Ordenadores y tabletas > Componentes y hardware para ordenadores</td>
            @elseif($excel->CATEGORIA == 'mem flash, secure digital')
                <td>Electrónica > Accesorios > Dispositivos de almacenamiento multimedia vacíos</td>
            @elseif($excel->CATEGORIA == 'mem flash, usb drive')
                <td>Electrónica > Accesorios > Dispositivos de almacenamiento multimedia vacíos</td>
            @elseif($excel->CATEGORIA == 'mem sodimm ddr3 1600')
                <td>Electrónica > Ordenadores y tabletas > Componentes y hardware para ordenadores</td>
            @elseif($excel->CATEGORIA == 'mem sodimm ddr4 2666')
                <td>Electrónica > Ordenadores y tabletas > Componentes y hardware para ordenadores</td>
            @elseif($excel->CATEGORIA == 'mem sodimm ddr4 3200')
                <td>Electrónica > Ordenadores y tabletas > Componentes y hardware para ordenadores</td>
            @elseif($excel->CATEGORIA == 'merchandising')
                <td>Electrónica > Accesorios</td>
            @elseif($excel->CATEGORIA == 'monitores 21+')
                <td>Electrónica > Televisores y monitores > Monitores de ordenador</td>
            @elseif($excel->CATEGORIA == 'monitores gaming')
                <td>Electrónica > Televisores y monitores > Monitores de ordenador</td>
            @elseif($excel->CATEGORIA == 'monitores tft 15 - 19')
                <td>Electrónica > Televisores y monitores > Monitores de ordenador</td>
            @elseif($excel->CATEGORIA == 'monitores tft 20 - 23')
                <td>Electrónica > Televisores y monitores > Monitores de ordenador</td>
            @elseif($excel->CATEGORIA == 'monitores tft 24 - 28')
                <td>Electrónica > Televisores y monitores > Monitores de ordenador</td>
            @elseif($excel->CATEGORIA == 'monitores tft 29 +')
                <td>Electrónica > Televisores y monitores > Monitores de ordenador</td>
            @elseif($excel->CATEGORIA == 'monitores, accesorios')
                <td>Electrónica > Accesorios > Periféricos para ordenadores</td>
            @elseif($excel->CATEGORIA == 'mouse inalambrico')
                <td>Electrónica > Accesorios > Periféricos para ordenadores</td>
            @elseif($excel->CATEGORIA == 'mouse pad/mat, accesorios')
                <td>Electrónica > Accesorios > Periféricos para ordenadores</td>
            @elseif($excel->CATEGORIA == 'mouse para gamers')
                <td>Electronica > Consolas de videojuegos y videojuegos > Accesorios para videojuegos</td>
            @elseif($excel->CATEGORIA == 'mouse usb')
                <td>Electrónica > Accesorios > Periféricos para ordenadores</td>
            @elseif($excel->CATEGORIA == 'ms esd aplicaciones')
                <td>Electronica > Software</td>
            @elseif($excel->CATEGORIA == 'ms esd office')
                <td>Electronica > Software</td>
            @elseif($excel->CATEGORIA == 'ms esd office 365')
                <td>Electronica > Software</td>
            @elseif($excel->CATEGORIA == 'ms esd windows business')
                <td>Electronica > Software</td>
            @elseif($excel->CATEGORIA == 'ms esd windows consumer')
                <td>Electronica > Software</td>
            @elseif($excel->CATEGORIA == 'ms windows business')
                <td>Electronica > Software</td>
            @elseif($excel->CATEGORIA == 'ms windows consumer')
                <td>Electronica > Software</td>
            @elseif($excel->CATEGORIA == 'ms windows server')
                <td>Electronica > Software</td>
            @elseif($excel->CATEGORIA == 'multim, joystick/gamepad')
                <td>Electrónica > Consolas de videojuegos y videojuegos > Accesorios para videojuegos</td>
            @elseif($excel->CATEGORIA == 'multim, mic/headph')
                <td>Electrónica > Sonido y video para el hogar</td>
            @elseif($excel->CATEGORIA == 'multim, mic/headph gaming')
                <td>Electrónica > Sonido y video para el hogar</td>
            @elseif($excel->CATEGORIA == 'multim, parlantes otros')
                <td>Electrónica > Sonido y video para el hogar</td>
            @elseif($excel->CATEGORIA == 'multim, video conferencia')
                <td>Electornica > Camaras > Videocamaras</td>
            @elseif($excel->CATEGORIA == 'multimedia, accesorios')
                <td>Electrónica > Accesorios</td>
            @elseif($excel->CATEGORIA == 'multimedia, video tv')
                <td>Electronica > Televisores y monitores > Televisores</td>
            @elseif($excel->CATEGORIA == 'notebook 2-in-1 celeron')
                <td>Electrónica > Ordenadores y tabletas > Portátiles</td>
            @elseif($excel->CATEGORIA == 'notebook amd athlon')
                <td>Electrónica > Ordenadores y tabletas > Portátiles</td>
            @elseif($excel->CATEGORIA == 'notebook amd ryzen 3')
                <td>Electrónica > Ordenadores y tabletas > Portátiles</td>
            @elseif($excel->CATEGORIA == 'notebook amd ryzen 5')
                <td>Electrónica > Ordenadores y tabletas > Portátiles</td>
            @elseif($excel->CATEGORIA == 'notebook amd ryzen 7')
                <td>Electrónica > Ordenadores y tabletas > Portátiles</td>
            @elseif($excel->CATEGORIA == 'notebook celeron')
                <td>Electrónica > Ordenadores y tabletas > Portátiles</td>
            @elseif($excel->CATEGORIA == 'notebook core i3')
                <td>Electrónica > Ordenadores y tabletas > Portátiles</td>
            @elseif($excel->CATEGORIA == 'notebook core i5')
                <td>Electrónica > Ordenadores y tabletas > Portátiles</td>
            @elseif($excel->CATEGORIA == 'notebook core i7')
                <td>Electrónica > Ordenadores y tabletas > Portátiles</td>
            @elseif($excel->CATEGORIA == 'notebook gaming')
                <td>Electrónica > Ordenadores y tabletas > Portátiles</td>
            @elseif($excel->CATEGORIA == 'notebook, acc propietario')
                <td>Electrónica > Ordenadores y tabletas > Portátiles</td>
            @elseif($excel->CATEGORIA == 'notebook, accesorios de')
                <td>Electrónica > Accesorios</td>
            @elseif($excel->CATEGORIA == 'notebook, maletin/mochila')
                <td>Electrónica > Accesorios</td>
            @elseif($excel->CATEGORIA == 'protec - mascaras kn95')
                <td>Electronica > Seguridad y automatizacion del hogar</td>
            @elseif($excel->CATEGORIA == 'protec - mascaras simples')
                <td>Electronica > Seguridad y automatizacion del hogar/td>
            @elseif($excel->CATEGORIA == 'red wifi accesorios')
                <td>Electronica > Ordenadores y tabletas > Redes y servidores</td>
            @elseif($excel->CATEGORIA == 'red wifi adaptadores usb')
                <td>Electronica > Ordenadores y tabletas > Redes y servidores</td>
            @elseif($excel->CATEGORIA == 'red wifi antenas exterior')
                <td>Electronica > Ordenadores y tabletas > Redes y servidores</td>
            @elseif($excel->CATEGORIA == 'red wifi ap empresa inter')
                <td>Electronica > Ordenadores y tabletas > Redes y servidores</td>
            @elseif($excel->CATEGORIA == 'red wifi ap interiores')
                <td>Electronica > Ordenadores y tabletas > Redes y servidores</td>
            @elseif($excel->CATEGORIA == 'red wifi router-adsl')
                <td>Electronica > Ordenadores y tabletas > Redes y servidores</td>
            @elseif($excel->CATEGORIA == 'red, accesorios de')
                <td>Electronica > Ordenadores y tabletas > Redes y servidores</td>
            @elseif($excel->CATEGORIA == 'red, camaras ip')
                <td>Electronica > Ordenadores y tabletas > Redes y servidores</td>
            @elseif($excel->CATEGORIA == 'red, router y componentes')
                <td>Electronica > Ordenadores y tabletas > Redes y servidores</td>
            @elseif($excel->CATEGORIA == 'red, switch basico')
                <td>Electronica > Ordenadores y tabletas > Redes y servidores</td>
            @elseif($excel->CATEGORIA == 'red, tarjetas pci de')
                <td>Electronica > Ordenadores y tabletas > Redes y servidores</td>
            @elseif($excel->CATEGORIA == 'rep tb - otros hw')
                <td>Electronica > Ordenadores y tabletas > Redes y servidores</td>
            @elseif($excel->CATEGORIA == 'servicios otros')
                <td>Electronica > Ordenadores y tabletas > Redes y servidores</td>
            @elseif($excel->CATEGORIA == 'software, antivirus')
                <td>Electronica > Software</td>
            @elseif($excel->CATEGORIA == 'software, otros')
                <td>Electronica > Software</td>
            @elseif($excel->CATEGORIA == 'suminist p/impr, botellas')
                <td>Electronica > Impresoras y escaneres</td>
            @elseif($excel->CATEGORIA == 'suminist p/impres, cintas')
                <td>Electronica > Impresoras y escaneres</td>
            @elseif($excel->CATEGORIA == 'suminist p/impres, tintas')
                <td>Electronica > Impresoras y escaneres</td>
            @elseif($excel->CATEGORIA == 't celulares basicos')
                <td>Electrónica > Móviles y relojes inteligentes > Teléfonos móviles</td>
            @elseif($excel->CATEGORIA == 't celulares, smartwatches')
                <td>Electronica > Moviles y relojes inteligentes > Relojes inteligentes</td>
            @elseif($excel->CATEGORIA == 't smartphones android')
                <td>Electrónica > Móviles y relojes inteligentes > Teléfonos móviles</td>
            @elseif($excel->CATEGORIA == 'tablet android')
                <td>Electrónica > Ordenadores y tabletas > Tabletas y lectores de libros electrónicos</td>
            @elseif($excel->CATEGORIA == 'teclado inalambrico')
                <td>Electrónica > Accesorios > Periféricos para ordenadores</td>
            @elseif($excel->CATEGORIA == 'teclado para gamers')
                <td>Electronica > Consolas de videojuegos y videojuegos > Accesorios para videojuegos</td>
            @elseif($excel->CATEGORIA == 'teclado usb')
                <td>Electrónica > Accesorios > Periféricos para ordenadores</td>
            @elseif($excel->CATEGORIA == 'teclado+mouse combo kit')
                <td>Electrónica > Accesorios > Periféricos para ordenadores</td>
            @elseif($excel->CATEGORIA == 'televisores led/smart tv')
                <td>Electrónica > Televisores y monitores > Televisores</td>
            @elseif($excel->CATEGORIA == 'ups interactivo')
                <td>Electrónica > Accesorios > Perifericos para ordenadores</td>
            @elseif($excel->CATEGORIA == 'ups, accesorios')
                <td>Electrónica > Accesorios > Perifericos para ordenadores</td>
            @elseif($excel->CATEGORIA == 'ups, otros')
                <td>Electrónica > Accesorios > Perifericos para ordenadores</td>
            @elseif($excel->CATEGORIA == 'video, pci exp nvidia gam')
                <td>Electronica > Consolas de videojuegos y videojuegos > Accesorios para videojuegos</td>
            @elseif($excel->CATEGORIA == 'video, pci exp radeon gam')
                <td>Electronica > Consolas de videojuegos y videojuegos > Accesorios para videojuegos</td>
            @elseif($excel->CATEGORIA == 'video, pci express nvidia')
                <td>Electronica > Consolas de videojuegos y videojuegos > Accesorios para videojuegos</td>
            @else
            <td>{{ $excel->CATEGORIA }}</td>
            @endif
        <td></td>
        </tr>
        @endforeach
    </tbody>
</table>