Vue.component('dibujo', {
    props: ['entity','checked'],
    data: function () {
        return {
            dibujo: {
                id: '',
                nombre: '',
                src: ''
            }
        }
    },
    methods: {
        changeDibujo: function () {
            this.$emit('changedibujo', this.dibujo);
        }
    },
    created: function () {
        this.dibujo.id = this.entity.id;
        this.dibujo.nombre = this.entity.nombre;
        this.dibujo.src = this.entity.src;

    },
    template: ' <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 text-center">' +
    '<div>' +
    '<img :src="dibujo.src" class="img-responsive" @click="changeDibujo" />' +
    '</div>' +
    '<input type="radio" name="dibujo" :value="dibujo.id" @click="changeDibujo" :checked="checked" />' +
    '</div>'
})