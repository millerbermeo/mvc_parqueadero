<?php
require_once "header.php";
?>
    <h1>Formulario de registro</h1>
        <div id="formulario">
            <form id="" action="?c=guardar" method="post" enctype="multipart/form-data">

                <article>
                    <div class="form-outline">
                        <label class="form-label" for="formControlDefault">Nombre</label>
                        <input type="text" id="formControlDefault" name="nombre_user" class="form-control" value=""/>
                    </div>

                    <div class="form-outline">
                        <label class="form-label" for="formControlDefault">Documento</label>
                        <input type="text" id="formControlDefault" name="documento" class="form-control" value=""/>
                    </div>

                    <div class="form-outline">
                        <label class="form-label" for="formControlDefault">Email</label>
                        <input type="text" id="formControlDefault" name="email" class="form-control" value=""/>
                    </div>

                    <div class="form-outline">
                        <label class="form-label" for="formControlDefault">Password</label>
                        <input type="text" id="formControlDefault" name="password" class="form-control" value=""/>
                    </div>
                </article>

               <article>
                   <div class="form-outline">
                       <label class="form-label" for="formControlDefault">Placa</label>
                       <input type="text" id="formControlDefault" name="placa" class="form-control" value=""/>
                   </div>

                   <div class="form-outline">
                       <label class="form-label" for="formControlDefault">Marca</label>
                       <input type="text" id="formControlDefault" name="marca" class="form-control" value=""/>
                   </div>

                   <div class="form-outline">
                       <label class="form-label" for="formControlDefault">Modelo</label>
                       <input type="text" id="formControlDefault" name="modelo" class="form-control" value=""/>
                   </div>

                   <div class="form-outline">
                       <label class="form-label" for="formControlDefault">Color</label>
                       <input type="text" id="formControlDefault" name="color" class="form-control" value=""/>
                   </div>


               </article>



                <div class="form-outline mt-2">
                    <input type="submit" id="" class="btn btn-primary" value="Guardar"/>
                </div>




        </form>
    </div>

<?php
require_once "footer.php";
?>