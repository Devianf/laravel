<!DOCTYPE html>
<html lang="es">


<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel='shortcut icon' href='/images/constante/deltron-icon.ico' />



 <!-- Bootstrap Core CSS -->
<link href="https://www.deltron.com.pe/include/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="https://www.deltron.com.pe/include/css/modern-business.css" rel="stylesheet">
<!-- Custom Fonts -->
<!--<link href="/include/font-awesome/css/font-awesome.min.css" rel="stylesheet">-->
<script src="https://use.fontawesome.com/9e31ea1225.js"></script>
<!-- JQUERY -->
<script src="https://www.deltron.com.pe/include/jquery/jquery-2.2.0.min.js" type="text/javascript"></script>
<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://www.deltron.com.pe/include/slick/slick.css">
<link rel="stylesheet" type="text/css" href="https://www.deltron.com.pe/include/slick/slick-theme.css">
<link rel="stylesheet" href="deltron.css">
<link rel="icon" type="image/x-icon" href="{{ asset('assets/hba_mini_ico.jpg') }}">



<style>
    .containerhba{
        display: flex;
        justify-content: flex-start;
        align-items: center;
        height: 50px;
        padding-left: 50px;
    }

    .logo{
        width: 260px;
        max-width: 100%;
    }
</style>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<style>
    body, p, h1, h2, h3, h4, h5, h6 {
        font-family: 'Roboto', sans-serif;
    }
</style>
</head>
<div class="containerhba">
    <img src="{{ asset('imagenes/logo2.png') }}" class="logo">
    
</div><br><br>
<body>
    
    <style>
        .container2 {
            margin-top: 20px; 
        }

        .whatsapp-button {
            /* Estilos del botón original */
            position: fixed;
            width: 100px;
            height: 100px;
            bottom: 20px;
            right: 40px;
            background-image: url('https://hbaperu.odoo.com/web/image/8349-da49b66f/VENTAS2.png');
            background-size: cover;
            border-radius: 50px;
            text-align: center;
            font-size: 30px;
            z-index: 100;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            text-decoration: none; /* Para evitar subrayado en algunos navegadores */
        }
        
        .whatsapp-button2 {
            /* Estilos del segundo botón */
            position: fixed;
            width: 100px;
            height: 100px;
            bottom: 115px; /* Ajusta la posición vertical (cambia el valor según tu preferencia) */
            right: 40px; /* Ajusta la posición horizontal */
            background-image: url('https://hbaperu.odoo.com/web/image/8348-81163a9f/VENTAS1.png');
            background-size: cover; /* Ajusta el tamaño de la imagen para que cubra todo el botón */
            border-radius: 50px;
            text-align: center;
            font-size: 30px;
            z-index: 100;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            text-decoration: none; /* Para evitar subrayado en algunos navegadores */
        }
        .whatsapp-button3 {
            /* Estilos del tercer botón */
            position: fixed;
            width: 140px;
            height: 50px;
            bottom: 210px;
            right: 40px;
            background-image: url('https://hbaperu.odoo.com/web/image/8350-a3b43c30/ASESORES.png');
            background-size: cover;
            border-radius: 0; /* Elimina la propiedad border-radius para que no sea circular */
            text-align: center;
            font-size: 20px;
            z-index: 100;
            display: flex;
            justify-content: center;
            align-items: center;
            text-decoration: none; /* Para evitar subrayado en algunos navegadores */
        }
        

        /* Estilo para el ícono de WhatsApp */
        .whatsapp-icon {
            font-size: 24px;
        }
    </style>
    
    <div class="container2">
        <nav class="nav2" style="display: flex; align-items: center;">
            <div style="flex: 1;">
                @if ($Promocion !== "0.0")
                    <h2 class="font-weight-bold" style="color: #2E4b87; text-decoration: line-through;">S/. {{ number_format($PrecioVenta, 2) }}</h2>
                @else
                    <h2 style="color: #2E4b87;">S/. {{ number_format($PrecioVenta, 2) }}</h2>
                @endif
            </div>
    
            @if ($Promocion !== "0.0")
                <div style="margin-left: 20px;"> <!-- Agregar un margen izquierdo -->
                    <h2 class="font-weight-bold" style="color: #118111;"> Oferta S/. {{ $Promocion }}</h2>
                </div>
            @endif

    
            <div style="margin-left: 29px;"> <!-- Agregar un margen izquierdo -->
                <h3 style="color: #00b7eb;"> Und. {{ $Inventario }}</h3>
            </div>
        </nav>
    </div>
    
    <a href="https://wa.me/51967386843?text=Hola%20estoy%20interesado%20en%20el%20producto%20{{ $NombreProducto }}({{ $CodigoProducto }})%20en%20S/.{{ $Promocion > 0.0 ? number_format($Promocion, 2) : number_format($PrecioVenta, 2) }}%20" class="whatsapp-button" target="_blank">      
    </a>

    <a href="https://wa.me/51992672872?text=Hola%20estoy%20interesado%20en%20el%20producto%20{{ $NombreProducto }}({{ $CodigoProducto }})%20en%20S/.{{ $Promocion > 0.0 ? number_format($Promocion, 2) : number_format($PrecioVenta, 2) }}%20" class="whatsapp-button2" target="_blank">            
    </a>

    <a href="" class="whatsapp-button3"></a>
    
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/stacktable.js/1.0.3/stacktable.min.css" rel="stylesheet">
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

<div class="container container-ficha-producto">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>


<?php
$html5=str_replace('<button type="button" class="btn btn-success btn-preview hidden" id="previewScreen" style="position: fixed;top:50%;right:35px; ">Previsualizar</button>','',$html2);
$html6=str_replace('<i class="fa fa-whatsapp whatsapp-icon"></i>','',$html5);

echo $html6;
?>


    <script src="https://www.deltron.com.pe/include/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://d31qbv1cthcecs.cloudfront.net/atrk.js"></script>
    <script type="text/javascript">_atrk_opts = { atrk_acct: "nlCCg1awAe00U4", domain: "deltron.com.pe" }; atrk();</script>
    <noscript><img src="https://d5nxst8fruw4z.cloudfront.net/atrk.gif?account=nlCCg1awAe00U4" style="display:none" height="1" width="1" alt="" /></noscript>

    <!-- SLICK JSS -->
    <script src="/include/slick/slick.min.js" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/css/lightslider.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.11/css/lightgallery.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/js/lightslider.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.11/js/lightgallery.min.js"></script>


    
    <script type="text/javascript">
        jQuery(document).on('ready', function() {
            //CHANGE URL MODAL PROMO
            jQuery('#modalPromo').on('shown.bs.modal', function(event) { //correct here use 'shown.bs.modal' event which comes in bootstrap3
                var button = jQuery(event.relatedTarget) // Button that triggered the modal
                var itemPromo = button.data('promo') // Extract info from data-* attributes
                jQuery(this).find('iframe').attr('src', 'StockPromo.php?itemPromo=' + itemPromo);
            });
            //END CHANGE URL MODAL PROMO
            /*jQuery(".slick-img-products").slick({
             dots: true,
             infinite: true,
             autoplay: true,
             slidesToShow: 1,
             slidesToScroll: 1
             });*/
            //ADDED GALLERY PRODUCTS
            jQuery('#imageGallery').lightSlider({
                gallery: true,
                item: 1,
                loop: true,
                thumbItem: 9,
                slideMargin: 0,
                currentPagerPosition: 'left',
                onSliderLoad: function(el) {
                    el.lightGallery({
                        selector: '#imageGallery .lslide',
                        thumbnail: true
                    });
                }
            });

            // ADD CLASS SPECS 
            //
            jQuery(".cuerpo").addClass('table');
            jQuery(".marco").addClass('table');
            jQuery(".marco").addClass('bordered');
            //GENERATE PDF
            $('#previewScreen').click(function() {
                /*html2canvas(document.querySelector("#contentProductItem")).then(function (canvas) {
                 document.body.appendChild(canvas);
                 });*/
                jQuery('#myModalPreview').modal();
                //html2canvas(document.querySelector("#contentProductItem"), {letterRendering: 1, allowTaint: true}).then(function (canvas) {
                //document.body.appendChild(canvas);
                //jQuery("#ccontent-image-pre").append(canvas);

                /*scrBase64 = canvas.toDataURL('image/png');
                 scrBase64 = scrBase64.split(',')[1];
                 alert(scrBase64);*/
                //});
            });
            $('#myModalPreview').on('show.bs.modal', function() {
                $("#content-image-pre canvas").css("width", "100%");
                $("#content-image-pre canvas").css("height", "100%");
                //$("#content-modal-image-pre canvas").css("height", "1708px");
            });

            //Detectar click en grabar y generar plantilla
            $('#generateTemplate').on('click', function() {
                var name_empresa = $('#InputName').val();
                var price = $('#InputPrice').val();
                $('.nameEmpresa').html(name_empresa);
                $('.nameEmpresa').parent().removeClass('hidden');

                $('#price-default').css('display', 'none');
                $('#price-custom').css('display', 'block');
                $('#price-custom').removeClass('hidden');
                $('#price-custom .catalog-discount-tag b font.aquiando777').html(price);

                //OCULTANDO STOCK
                jQuery("#contentStockProduct").css('display', 'none');
                //Cerrando MODAL
                jQuery('#myModalPreview').modal('toggle');
                //Generando Canvas
                html2canvas(document.querySelector("#contentProductItem"), {
                    letterRendering: 1,
                    allowTaint: true
                }).then(function(canvas) {
                    //AGREGANDO CANVAS AL MODAL
                    jQuery("#content-image-pre").html(canvas);
                    //ABRIENDO MODAL
                    jQuery('#myModalPreview').modal();
                });
            });

            $('#downloadTemplate').on('click', function() {
                /* html2canvas(document.querySelector("#content-modal-image-pre"), {
                 onrendered: function (canvas1) {
                 saveAs(canvas1.toDataURL(), 'canvas.png');
                 }
                 });*/
            });
            //$('#tableFeatureProducts').stacktable();
            //$('#tableWarehouse').stacktable();
        });

        function saveAs(uri, filename) {
            var link = document.createElement('a');
            if (typeof link.download === 'string') {
                link.href = uri;
                link.download = filename;

                //Firefox requires the link to be in the body
                document.body.appendChild(link);

                //simulate click
                link.click();

                //remove the link when done
                document.body.removeChild(link);
            } else {
                window.open(uri);
            }
        }

    </script>
</body>

</html>

