<!-------------------------------------------Modal Actualizar EXCEL--------------------------------------->
<div class="modal fade" id="UpdateProducto{{$row->ID}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role= "document">
        <div class="modal-content">
            <div class="modal-header">
                <h5  style="margin: 0 auto; display: block"  class="modal-title" id="exampleModalLabel" ><strong>EDITAR PRODUCTO</strong></h5>
            </div>
            <div class="modal-body">
                <form action="{{url('/actualizarP',$row->ID)}}" method="POST" id="frmCreateHORARIO">
                    @csrf 
                    <input type="hidden" name="ID" value="{{$row->ID}}">             
                    <div class="row g-1 mb-2">
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="CATEGORIA" id="CATEGORIAE" value="{{$row->CATEGORIA}}">
                                <label for="floatingInputGrid"><strong>CATEGORIA DEL PRODUCTO</strong></label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="CODPRODUCTO" id="CODPRODCUTOE"  value="{{$row->CODPRODUCTO}}">
                                <label for="floatingInputGrid"><strong>CODIGO DEL PRODUCTO</strong></label>
                            </div>
                        </div> 
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="NOMPRODUCTO" id="NOMPRODUCTOE"  value="{{$row->NOMPRODUCTO}}">
                                <label for="floatingInputGrid"><strong>NOMBRE DEL PRODUCTO</strong></label>
                            </div>
                        </div>
                    </div>
    
                    <div class="row g-1 mb-2">
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="PROVEEDORES" id="PROVEEDORESE"  value="{{$row->PROVEEDORES}}" >
                                <label for="floatingInputGrid"><strong>PROVEEDOR</strong></label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="MARCA" id="MARCAE"  value="{{$row->MARCA}}">
                                <label for="floatingInputGrid"><strong>MARCA</strong></label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="STOCK" id="STOCKE"  value="{{$row->STOCK}}">
                                <label for="floatingInputGrid"><strong>STOCK DISPONIBLE</strong></label>
                            </div>
                        </div>
                    </div>  
                    
                    <div class="row g-1 mb-2">
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="DOLARES" id="DOLARESE"  value="{{ number_format($row->DOLARES, 2) }}">
                                <label for="floatingInputGrid"><strong>PRECIO EN DOLARES</strong></label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="SOLES" id="SOLESE"  value="{{ number_format($row->SOLES, 2) }}">
                                <label for="floatingInputGrid"><strong>PRECIO EN SOLES</strong></label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="VENTA" id="VENTAE"  value="{{ number_format($row->VENTA, 2) }}">
                                <label for="floatingInputGrid"><strong>PRECIO DE VENTA</strong></label>
                            </div>
                        </div>
                    </div>

                    <div class="row g-1 mb-2">
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="UTILIDAD" id="GANANCIAE"  value="{{ number_format($row->UTILIDAD, 2) }}">
                                <label for="floatingInputGrid"><strong>UTILIDAD O GANANCIA</strong></label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="PROMOCION" id="PROMOCIONE"  value="{{ number_format($row->PROMOCION, 2) }}">
                                <label for="floatingInputGrid"><strong>PRECIO DE PROMOCION</strong></label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="URLP" id="URLPE"  value="{{$row->URLP}}">
                                <label for="floatingInputGrid"><strong>URL DEL PRODUCTO</strong></label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="URLI" id="URLIE"  value="{{$row->URLI}}">
                                <label for="floatingInputGrid"><strong>URL DE LA IMAGEN</strong></label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-outline-danger" href="{{ route('excel.BD') }}">
                            <span><strong>Cerrar</strong></span>
                        </a>
                        <button type="submit" class="btn" style="background-color:mediumspringgreen">Actualizar</button>    
                    </div>
                   
                

                </form>
            </div>
        </div>
    </div>
</div>