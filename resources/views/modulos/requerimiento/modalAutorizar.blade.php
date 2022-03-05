<!-- Modal AUTORIZAR -->
<div class="modal fade " id="md-autorizarRepuesto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card "  >
                <div class="header" style="background-color: #06419f">
                    <h3 class="title text-center" style="font-size: 20px; color: #ffffff ; padding-bottom :8px;"><strong>AUTORIZAR</strong></h3>
                </div>
            </div>
            <div class="modal-header">
                <table id="clients" class="table table-striped" border bordercolor="#CDCDD8">
                    <thead style="background:#aed6f18a" class="thead">
                        <tr>
                            <th scope="col" class="text-center" style="color:#16172C"><strong>CLIENTE</strong></th>
                            <th scope="col" class="text-center" style="height: 1px; color:#16172C"><strong>DOCUMENTO</strong></th>
                            <th scope="col" class="text-center" style="color:#16172C"><strong>NOMBRES</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tr>
                    <th id="clienteTipo" width="33%" style="font-size: 12px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                        &nbsp;<label><strong></strong></label>

                    </th>
                    <th id="clienteDocumento" width="33%" style="font-size: 12px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                    &nbsp;<label><strong id="nombreCliente"></strong></label>
                    </th>

                    <th id="clienteNombre" width="33%" style="font-size: 12px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                        &nbsp;<label><strong></strong></label>
                    </th>
                </tr>
                    </tbody>
                </table>
                <table id="clients" class="table table-striped" border bordercolor="#CDCDD8">
                    <thead style="background:#aed6f18a" class="thead">
                        <tr>
                            <th scope="col" class="text-center" style="color:#16172C"><strong>EQUIPO</strong></th>
                            <th scope="col" class="text-center" style="color:#16172C"><strong>MARCA</strong></th>
                            <th scope="col" class="text-center" style="color:#16172C"><strong>REFERENCIA</strong></th>
                            <th scope="col" class="text-center" style="color:#16172C"><strong>SERIAL</strong></th>

                        </tr>
                    </thead>
                    <tbody>
                        </tr>
                            <th id="equipoRepuesto" width="25%" style="font-size: 12px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                            &nbsp;<label><strong></strong></label>

                            </th>
                            <th id="equipoMarca" width="25%" style="font-size: 12px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                &nbsp;<label><strong></strong></label>

                            </th>
                            <th id="equipoReferencia" width="25%" style="font-size: 12px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                &nbsp;<label><strong></strong></label>
                            </th>
                            <th id="equipoSerial" width="25%"style="font-size: 12px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                            &nbsp;<label><strong></strong></label>
                            </th>
                        </tr>
                    </tbody>
                </table>
                <div class="card">
                    <div class="row">


                        <div class="col-md-1">
                            <div class="form-group">
                                <label><strong>CANTIDAD</strong></label>
                                <input type="text" disabled class="form-control" name="cantidadRepuesto" id="cantidadRepuesto"  required autocomplete="off" style="text-transform: uppercase">
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label ><strong>REPUESTO</strong></label>
                                <input type="text" disabled maxlength="10" class="form-control"  name="nombreRepuesto" id="nombreRepuesto"  required autocomplete="off">
                            </div>

                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label ><strong>PRECIO UNITARIO</strong></label>
                                <input type="number" class="form-control" placeholder="$ con IVA " maxlength="10" name="precioUnitario" id="precioUnitario"  autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10" style="text-align: right">
                            <div class="form-group">
                                <label for="">$ PRECIO TOTAL</label>
                            </div>
                        </div>

                        <div class="col-md-2" style="text-align: right">
                            <div class="form-group">
                                <input type="number" disabled style="ali" class="form-control" placeholder="$ TOTAL " maxlength="10" name="precioTotal" id="precioTotal"  autocomplete="off">
                            </div>
                        </div>
                    </div>
                </div>
                <button style="float: right" class="btn btn-success btn-fill" onclick="autorizarRepuesto()" >AUTORIZAR</button>

                <button style="float: right ; margin-right: 15px" class="btn btn-danger btn-fill " onclick="CloseModal()">Cerrar</button>

                </div>
            </div>


        </div>
    </div>
</div>
