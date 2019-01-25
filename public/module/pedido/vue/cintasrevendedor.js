Vue.component('cintasrevendedor', {
    props: ['config'],
    data: function () {
        return {
            disableEncargar: false,
            pedido: {
                id: '',
                listo: false,
                nombre: '',
                codigo: '',
                dibujo: {
                    id: '',
                    nombre: '',
                    src: ''
                },
                color: {
                    id: '',
                    nombre: '',
                    hexa: ''
                },
                colorFondo: {
                    id: '',
                    nombre: '',
                    hexa: ''
                },
                opcion: {
                    id: '',
                    opcion: '',
                    precio: ''
                }
            }
        }
    },
    methods: {
        encargar: function () {
            if (this.pedido.nombre && this.pedido.color.id && this.pedido.colorFondo.id && this.pedido.dibujo.id && this.pedido.opcion.id) {
                var that = this;
                this.disableEncargar = true;
                $.ajax({
                    url: '/revendedor/pedido-cinta/save/' + this.pedido.id,
                    method: 'post',
                    data: {
                        id: this.pedido.id,
                        nombre: this.pedido.nombre,
                        color: this.pedido.color.id,
                        colorFondo: this.pedido.colorFondo.id,
                        dibujo: this.pedido.dibujo.id,
                        opcion: this.pedido.opcion.id
                    }
                }).done(
                    function (data) {
                        console.log(data);
                        that.saveOk(data);

                    }
                ).fail(
                    function (data) {
                        that.saveFail(data);

                    }
                );
            } else {
                this.faltanDatos();
            }
            return false;
        },
        saveOk: function () {
            this.pedido.listo = true;
            $('#resultado').html("<div class='alert alert-success'>Encargo guardado satisfactoriamente.</div>");
            $('#mresultado').modal('show');
            this.disableEncargar = false;
            window.location.href = "/revendedor/formulario-cinta/grid";
        },
        saveFail: function () {
            $('#resultado').html("<div class='alert alert-danger'>Error al guardar.</div>");
            $('#mresultado').modal('show');
            this.disableEncargar = false;
        },
        faltanDatos: function () {
            $('#resultado').html("<div class='alert alert-danger'>Faltan datos. Debe seleccionar dibujo, color, nombre y opcion.</div>");
            $('#mresultado').modal('show')
        },
        mismoColor: function () {
            $('#resultado').html("<div class='alert alert-danger'>No se puede seleccionar el mismo color de letra y fondo</div>");
            $('#mresultado').modal('show');
        },
        changecolor: function (data) {
            if (this.pedido.colorFondo.id != data.id) {
                this.pedido.color = data;
            } else {
                this.mismoColor();
            }
        },
        changecolorfondo: function (data) {
            if (this.pedido.color.id != data.id) {
                this.pedido.colorFondo = data;
            } else {
                this.mismoColor();
            }
        },
        changedibujo: function (data) {
            this.pedido.dibujo = data;
        },
        changeopcion: function (data) {
            this.pedido.opcion.id = data;
        }
    },
    created: function () {
        this.pedido = this.config.pedido;
    },
    template: `
    <div class="row">
    <form v-if="!pedido.listo" class="form" role="form" v-on:submit.prevent="encargar">
    
    <div class="col-lg-12"> 
        <div class="form-group">
        <label class="handleeFont fyellow">1° Elegí un dibujo:</label>
        <div class="clearfix"></div>
        <dibujo v-for="dibujo, index in config.dibujos" :key="dibujo.id" :entity="dibujo" v-on:changedibujo="changedibujo" :checked="dibujo.id == pedido.dibujo.id"></dibujo>
        </div>
    </div>
    
     <div v-if="pedido.dibujo.id == 150" class="col-lg-12"> 
        <div class="form-group">
        <label class="handleeFont fyellow">Subir un dibujo personalizado:</label>
        <div class="clearfix"></div>

         <label class="btn btn-default glyphicon glyphicon-open">
            <input type="file" name="dibujoPersonalizado" accept="jpg,png,jpeg,gif" class="form-control">
         </label>


        </div>
    </div>
    
    
    
    <div class="clearfix"></div>
    
    <div class="col-lg-12 ">
        <div class="form-group"> 
        <label class="handleeFont fyellow">2° Elegí un color de letra:</label>
        <div class="clearfix"></div>
        <color v-for="color, index in config.colores" :name="'color'" :key="color.id" :entity="color" v-on:changecolor="changecolor" :checked="color.id == pedido.color.id"></color>
        </div>
    </div>
    
    <div class="clearfix"></div>
    
    <div class="col-lg-12 ">
        <div class="form-group"> 
            <label class="handleeFont fyellow">3° Elegí un color de fondo:</label>
            <div class="clearfix"></div>
            <color v-for="color, index in config.colores" :name="'colorFondo'" :key="color.id" :entity="color" v-on:changecolor="changecolorfondo" :checked="color.id == pedido.colorFondo.id"></color>
        </div>
    </div>
    
    <div class="clearfix"></div>
    
    <div class="col-lg-6 col-xs-12">
        <div class="form-group"> <label class="handleeFont fyellow">4° Escribí el nombre para tus cintas:</label>
        <input class="form-control" name="nombre" v-model="pedido.nombre" />
        </div>
    </div>
    
    <div class="clearfix"></div>
    
    <div class="col-lg-6 col-xs-12">
        <div class="form-group"> <label class="handleeFont fyellow"> 5° Elegí una opción:</label>
        <opcion :name="'opcion'" :clase="'form-control'" :opciones="config.opciones" v-on:changeopcion="changeopcion" :actual="pedido.opcion.id" ></opcion>
        </div>
    </div>
    
    <div class="clearfix"></div>
    
    <div class="col-lg-6 col-xs-12">
    <label class="handleeFont fyellow">Vista Previa:</label>
    <preview :dibujo="pedido.dibujo" :color="pedido.color.hexa" :colorFondo="pedido.colorFondo.hexa" :nombre="pedido.nombre"></preview>
    </div>
    
    <div class="clearfix"></div>
    
    <div class="col-lg-6 col-xs-12">
        <div class="form-group" style="padding-top:10px;">
        <button class="btn byellow handleeFont" :disabled="disableEncargar" >Encargar</button>
        </div>
    </div>
    
    </form>
    <div v-else>
    <div class="clearfix"></div>
    <div class="col-lg-6 col-xs-12">
    <label class="handleeFont fyellow">Pedido Encargado:</label>
    <preview :dibujo="pedido.dibujo" :color="pedido.color.hexa" :colorFondo="pedido.colorFondo.hexa" :nombre="pedido.nombre"></preview>
    </div>
    </div>
    </div>
    `
})