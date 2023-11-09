<!-------------------------------------------Modal Eliminar MEDICO------------------------------------------->
<div class="modal fade" id="DeleteProducto{{$row->ID}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role= "document">
        <div class="modal-content">
            <div class="modal-header">
                <h5  style="margin: 0 auto; display: block"  class="modal-title" id="exampleModalLabel" ><strong>ELIMINAR PRODUCTO</strong></h5>
            </div>
            <div class="modal-body">
                <form action="{{url('/eliminarP',$row->ID)}}" method="POST" id="frmDestroyMEDICO">
                    @csrf
                    <input type="hidden" name="ID" value="{{$row->ID}}" >
                    <p> Estás a punto de eliminar el <strong> PRODUCTO: </strong>({{$row->NOMPRODUCTO }}) de la <strong>CATEGORIA: </strong>({{$row->CATEGORIA}}) relacionado con el <strong>CODIGO:</strong> ({{$row->CODPRODUCTO}})</strong>. Esta acción es irreversible y eliminará todos los datos asociados a este Producto.</p>
                    <p>¿Estás seguro de que deseas continuar con la eliminación?</p>  
                    <div class="modal-footer">
                        <button type="button" class="btn" style="background-color:silver" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn" style="background-color:rgb(255, 96, 96)" >Confirmar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    