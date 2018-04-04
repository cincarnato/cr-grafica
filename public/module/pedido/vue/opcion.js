Vue.component('opcion', {
    props: ['name','clase','opciones'],
    data: function () {
        return {
          opcion:{
            id: '',
            opcion: '',
            precio: ''
          }
        }
    },
    methods: {
      changeColor: function () {
        this.$emit('changecolor', this.color);
      }
    },
    created: function () {
    },
    computed: {
    },
    template: ' <select :name="name" :class="clase">' +
    '<option></option>' +
    '<option v-if="opciones" v-for="op, index in opciones" :key="op.id" :value="op.id" v-on:change="">{{op.opcion}} - ${{op.precio}}</option>' +
    '</select>'
})