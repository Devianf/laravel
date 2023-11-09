<!-------------------------------------------Modal Actualizar EXCEL--------------------------------------->
<div class="modal fade" id="CreateProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role= "document">
        <div class="modal-content">
            <div class="modal-header">
                <h5  style="margin: 0 auto; display: block"  class="modal-title" id="exampleModalLabel" ><strong>REGISTRAR PRODUCTO</strong></h5>
            </div>
            <div class="modal-body">
                <form action="{{url('/registrarP')}}" method="POST" id="frmCreateHORARIO">
                    @csrf             
                    <div class="row g-1 mb-2">
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="CATEGORIA" id="CATEGORIAE" >
                                <label for="floatingInputGrid"><strong>CATEGORIA DEL PRODUCTO</strong></label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="CODPRODUCTO" id="CODPRODCUTOE" >
                                <label for="floatingInputGrid"><strong>CODIGO DEL PRODUCTO</strong></label>
                            </div>
                        </div> 
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="NOMPRODUCTO" id="NOMPRODUCTOE" >
                                <label for="floatingInputGrid"><strong>NOMBRE DEL PRODUCTO</strong></label>
                            </div>
                        </div>
                    </div>
    
                    <div class="row g-1 mb-2">
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="PROVEEDORES" id="PROVEEDORESE">
                                <label for="floatingInputGrid"><strong>PROVEEDOR</strong></label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="MARCA" id="MARCAE" >
                                <label for="floatingInputGrid"><strong>MARCA</strong></label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="STOCK" id="STOCKE" >
                                <label for="floatingInputGrid"><strong>STOCK DISPONIBLE</strong></label>
                            </div>
                        </div>
                    </div>  
                    
                    <div class="row g-1 mb-2">
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="DOLARES" id="DOLARESE" >
                                <label for="floatingInputGrid"><strong>PRECIO EN DOLARES</strong></label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="SOLES" id="SOLESE" >
                                <label for="floatingInputGrid"><strong>PRECIO EN SOLES</strong></label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="VENTA" id="VENTAE" >
                                <label for="floatingInputGrid"><strong>PRECIO DE VENTA</strong></label>
                            </div>
                        </div>
                    </div>

                    <div class="row g-1 mb-2">
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="UTILIDAD" id="GANANCIAE"  >
                                <label for="floatingInputGrid"><strong>UTILIDAD O GANANCIA</strong></label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="PROMOCION" id="PROMOCIONE" >
                                <label for="floatingInputGrid"><strong>PRECIO DE PROMOCION</strong></label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="URLP" id="URLPE"  >
                                <label for="floatingInputGrid"><strong>URL DEL PRODUCTO</strong></label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="URLI" id="URLIE" >
                                <label for="floatingInputGrid"><strong>URL DE LA IMAGEN</strong></label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-outline-danger" href="{{ route('excel.BD') }}">
                            <span><strong>Cerrar</strong></span>
                        </a>
                        <button type="submit" class="btn btn-nuevo" style="background-color:rgb(240, 188, 119)">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>