Vue.component('color', {
    props: ['entity','checked'],
    data: function () {
        return {
            value:'',
            color: {
                id: '',
                nombre: '',
                hexa: ''
            }
        }
    },
    methods: {
        changeColor: function () {
            this.$emit('changecolor', this.color);
        }
    },
    created: function () {
        this.color.id = this.entity.id;
        this.color.nombre = this.entity.nombre;
        this.color.hexa = this.entity.hexa;

    },
    computed: {
        cstyle: function () {
            return "min-height: 50px; min-width: 50px; background-color:" + this.color.hexa + ";";
        }
    },
    template: ' <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 text-center">' +
    '<div>' +
    '<div :style="cstyle" class="img-responsive" @click="changeColor"  />' +
    '</div>' +
    '<input type="radio" name="color" :value="color.id" @click="changeColor" :checked="checked" />' +
    '</div>'
})