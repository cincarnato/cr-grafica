Vue.component('preview', {
    props: ['dibujo', 'color', 'nombre'],
    methods: {},
    created: function () {
    },
    computed: {
        cstyle: function () {
            return 'color:' + this.color + ';';
        }
    },
    template: '<div class="row">' +
    '<div class="col-xs-12">' +
    '<div class="bwhite">' +
    '<div class="col-lg-3 col-xs-4">' +
    '<img :src="dibujo.src" class="img-responsive" style="widht:80px;height:80px;" />' +
    '</div>' +
    '<div class="col-lg-9 col-xs-8 text-center">' +
    '<label class="handleeFont labelPreview pt20" :style="cstyle">{{nombre}}</label>' +
    '</div>' +
    '</div>' +
    '</div>' +
    '</div>'
})