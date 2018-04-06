Vue.component('preview', {
  props: ['dibujo', 'color', 'colorFondo', 'nombre'],
  methods: {},
  created: function () {
  },
  computed: {
    cstyle: function () {
      return 'color:' + this.color + ';';
    },
    cfstyle: function () {
      return 'height: 80px; background-color:' + this.colorFondo + ';';
    }
  },
  template: '<div class="row">' +
  '<div class="col-xs-12">' +
  '<div class="bwhite">' +
  '<div class="col-lg-3 col-xs-3 text-center">' +
  '<img :src="dibujo.src" class="img-responsive" style="widht:80px;height:80px;" />' +
  '</div>' +
  '<div class="col-lg-9 col-xs-9 text-center" :style="cfstyle">' +
  '<label class="handleeFont labelPreview pt20" :style="cstyle">{{nombre}}</label>' +
  '</div>' +
  '</div>' +
  '</div>' +
  '</div>'
})