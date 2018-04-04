Vue.component('pedido', {
  props: ['config'],
  data: function () {
    return {
      pedido: {
        id: '',
        cliente:'',
        idMercadoLibre: '',
        nombre: '',
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
      var that = this;
      $.ajax({
        url: '/pedido/guardar/' + this.pedido.id,
        method: 'post',
        data: {id: this.pedido.id, nombre: this.pedido.nombre, color: this.pedido.color.id, dibujo: this.pedido.dibujo.id, opcion: this.pedido.opcion.id}
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
      return false;
    },
    saveOk: function(){

    },
    saveFail: function(){

    },
    changecolor: function (data) {
      this.pedido.color = data;
    },
    changedibujo: function (data) {
      this.pedido.dibujo = data;
    }
  },
  created: function () {
    this.pedido.id = this.config.id;
  },
  template: ' <div class="row">' +
  '<form class="form" role="form" v-on:submit.prevent="encargar">' +
  '<div class="col-lg-12"> ' +
  '<div class="form-group">' +
  '<label class="handleeFont fyellow">1° Elegi un dibujo:</label>' +
  '<div class="clearfix"></div>' +
  '<dibujo v-for="dibujo, index in config.dibujos" :key="dibujo.id" :entity="dibujo" v-on:changedibujo="changedibujo" :checked="dibujo.id == pedido.dibujo.id"></dibujo>' +
  '</div>' +
  '</div>' +
  '<div class="clearfix"></div>' +
  '<div class="col-lg-12 ">' +
  '<div class="form-group"> ' +
  '<label class="handleeFont fyellow">2° Elegi un color:</label>' +
  '<div class="clearfix"></div>' +
  '<color v-for="color, index in config.colores" :key="color.id" :entity="color" v-on:changecolor="changecolor" :checked="color.id == pedido.color.id"></color>' +
  '</div>' +
  '</div>' +
  '<div class="clearfix"></div>' +
  '<div class="col-lg-6 col-xs-12">' +
  '<div class="form-group"> <label class="handleeFont fyellow">3° Escribi tu nombre:</label>' +
  '<input class="form-control" name="nombre" v-model="pedido.nombre" />' +
  '</div>' +
  '</div>' +
  '<div class="clearfix"></div>' +
  '<div class="col-lg-6 col-xs-12">' +
  '<div class="form-group"> <label class="handleeFont fyellow"> 4° Elegi una opción:</label>' +
  '<opcion :name="\'opcion\'" :clase="\'form-control\'" :opciones="config.opciones" ></opcion>' +
  '</div>' +
  '</div>' +
  '<div class="clearfix"></div>' +
  '<div class="col-lg-6 col-xs-12">' +
  '<label class="handleeFont fyellow">Vista Previa:</label>' +
  '<preview :dibujo="pedido.dibujo" :color="pedido.color.hexa" :nombre="pedido.nombre"></preview>' +
  '</div>' +
  '<div class="clearfix"></div>' +
  '<div class="col-lg-6 col-xs-12">' +
  '<div class="form-group" style="padding-top:10px;">' +
  '<button class="btn byellow handleeFont" >Encargar</button>' +
  '</div>' +
  '</div>' +
  '</form>' +
  '</div>'
})