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
    '<div class="col-xs-5">' +
    '<img :src="dibujo.src" class="img-responsive" style="widht:80px;height:80px;" />' +
    '</div>' +
    '<div class="col-xs-7">' +
    '<label :style="cstyle">{{nombre}}</label>' +
    '</div>' +
    '</div>' +
    '</div>' +
    '</div>'
})